<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: database.ctl.php 2095 2013-12-10 10:20:21Z youyi $
 */

class Ctl_Tools_Database extends Ctl
{
    
    public function index()
    {
        if($this->checksubmit()){

        }else{
            $tables = K::M('tools/database')->tables();
            $totalsize = 0;
            foreach ($tables as $key => $table) {
                $totalsize += $table['Data_length'] + $table['Index_length'];
                $tables[$key] = $table;
            }
            $pager['totalsize'] = $totalsize;
            $this->pagedata['table_list'] = $tables;
            $this->pagedata['pager'] = $pager;
            $this->tmpl = 'admin:tools/database/index.html';
        }
    }

    public function backup()
    {
        $limit_size = 2048;
        if(!$file = $this->GP('file')){
            $file = date('Ymd_').substr(base64_encode(md5(microtime(),true).uniqid()), 1, 8);
        }
        if ($tables = $this->GP('tables')){
            @file_put_contents(__CFG::DIR."data/backup/tables.txt", serialize($tables));
        } elseif ($table_id = $this->GP('table_id')){
            $content = file_get_contents(__CFG::DIR."data/backup/tables.txt");
            $tables = unserialize($content);
        } else {
            $this->err->add("您没有选择备份的表！", 201)->show();
        }       
    }

    public function optimize()
    {
        if($this->checksubmit()){

        }else{
            $optimize_tables = array();
        	if($items = K::M('tools/database')->tables()){
                foreach($items as $table){
                    if($table['Data_free'] && $table[$tabletype] == 'MyISAM') {
                        $tables[] = $table;
                        $totalsize += $table['Data_length'] + $table['Index_length'];
                    }
                }
            }
            $this->pagedata['tables'] = $tables;
            $this->tmpl = 'admin:tools/database/optimize.html';
        }
    }

}