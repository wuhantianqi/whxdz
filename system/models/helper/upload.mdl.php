<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: upload.mdl.php 5441 2014-06-10 00:53:01Z youyi $
 */

/**
 * 上传类只支持图片格式
 *
 * 601:上传失败
 * 602:不支持的文件扩展名
 * 603:不支持的文件类型
 * 604:上传的文件太大
 * 605:
 */

class Mdl_Helper_Upload
{
    public $message = '';
    public $code = '200';
    public $succeed = true;

    private $_allow_extension = array('gif','jpg', 'png','jpeg','bmp');
    private $_allow_type = array('image/gif', 'image/jpeg','image/pjpeg', 'image/png', 'image/x-png', 'image/bmp','application/octet-stream');

    private $_allow_max_size = 2097152;

    function upload(&$attach, $dir, &$fname="")
    {
        if(!$this->_check($attach)){
            return false;
        }
        K::M('io/dir')->create($dir, 0777, true);
        if(empty($fname)){
            $fname = date('Ymd_').strtoupper(md5(microtime().$attach['tmp_name'].PRI_KEY.rand())).".{$attach['extension']}";
        }
        $file = $dir.$fname;
        if(@move_uploaded_file($attach['tmp_name'],$file)){
            return $this->check_safe($file);
        }else if(K::M('io/file')->move($attach['tmp_name'],$file)){
            return $this->check_safe($file);
        }else{
            K::M('helper/error')->add("上传失败",605);
            return false;
        }
    }

    public function set_max_size($size)
    {
        if(!is_numeric($size) || $size>2097152 || $size< 1){
            return false;
        }
        $this->_allow_max_size = $size;
    }
    
    public function set_allow_extension($ext)
    {
        $this->_allow_extension = $ext;
    }

    public function check_safe($file)
    {
        if($data = @file_get_contents($file)){
            if(preg_match("/\<(\?php|\<\? )/is", $data)){
                K::M('helper/error')->add('不是安全的图片', 999);
                K::M('io/file')->remove($file);
                return false;
            }
            //$data = preg_replace("/(\<\?|\<\%)/i", '00', $data);
            //@file_put_contents($file, $data);
        }
        return $file;
    }

    private function _check(&$attach)
    {
        if($attach['error'] != UPLOAD_ERR_OK/* || $attach['size']<1 || !file_exists($attach['tmp_name'])*/){
            K::M('helper/error')->add("上传失败".$attach['error'],601);
            return false;
        }
        $attach['extension'] = strtolower(K::M('io/file')->extension($attach['name']));
        $attach['type'] = strtolower($attach['type']);
        if(!in_array($attach['extension'], $this->_allow_extension)){
            K::M('helper/error')->add("不支持的文件扩展名",602);
        }else if(!in_array($attach['type'],$this->_allow_type)){
            K::M('helper/error')->add("不支持的文件类型",603);
        }else if($attach['size']>$this->_allow_max_size){
            K::M('helper/error')->add("上传的文件太大",604);
        }else{
            return true;
        }
        return false;
    }
}