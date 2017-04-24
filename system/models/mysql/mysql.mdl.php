<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: mysql.mdl.php 3237 2014-02-11 03:36:35Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

Import::M('mysql/safecheck');
class Mdl_Mysql_Mysql
{   
    
    public $_QSQL = array();
    public $_ERR = array();

    public $cfg = array();
    public $_tablepre = '';
    public $link = null;

    public function __construct($host, $user, $passwd, $dbname=null, $port=3306, $socket=null)
    {
        $this->cfg['host'] = $host;
        $this->cfg['user'] = $user;
        $this->cfg['passwd'] = $passwd;
        $this->cfg['dbname'] = $dbname;
        $this->cfg['port'] = $port;
        $this->cfg['socket'] = $socket;
    }

    public function connect()
    {
        if($this->link === null){
            if($this->cfg['socket'] !== null){
                $host = $this->cfg['socket'];
            } else {
                $host = "{$this->cfg['host']}:{$this->cfg['port']}";
            }
            if(!$this->link = mysql_connect($host, $this->cfg['user'], $this->cfg['passwd'],true)){
                if(__CFG::DEBUG){
                    trigger_error('Mysql Connect:['.mysql_errno().']'.mysql_error());
                }
                trigger_error('Mysql Connect Error');
            } else if ($this->cfg['dbname']){
                mysql_query('SET NAMES UTF8', $this->link);
                if($this->version()> '4.1'){
                    mysql_query("SET SQL_MODE=''", $this->link);
                }
                if(!$this->select_db($this->cfg['dbname'])){
                    trigger_error('Mysql Error:'. mysql_error());
                }
            }
        }
        return $this->link;
    }

    public function select_db($dbname)
    {
        if($this->link === null){
            $this->cfg['dbname'] = $dbname;
            return true;
        }
        return mysql_select_db($dbname, $this->link);
    }

    public function version()
    {
        return mysql_get_server_info($this->link);
    }

    public function close()
    {
        return mysql_close($this->link);
    }

    public function affected_rows()
    {
        return mysql_affected_rows($this->link);
    }

    public function safe_query($sql)
    {
        Mdl_Mysql_Safecheck::checkquery($sql);
        return $this->query($sql);
    }

    public function query($sql)
    {
        $this->connect();
        if(__CFG::DEBUG) {
            $starttime = microtime(true);
        }
        $rs = mysql_query($sql, $this->link);
        if(__CFG::DEBUG){
            $errno = mysql_errno();
            $exec_time = round((microtime(true) - $starttime), 6);
            $this->total_exec_time += $exec_time;
            $this->_QSQL[] = array($sql, $exec_time, $this->link, $errno);
            if($errno>0){    
                $this->_ESQL[] = array($sql, $this->mysql_debug_backtrace(), $errno, mysql_error());
            }
        }
        if(preg_match("/(SELECT|SHOW|DESCRIBE|EXPLAIN)\s+/i", $sql, $match)){
            return new Mdl_Mysql_Result($rs);
        }
        return $rs;
    }

    /**
     * 同Adodb:Execute,兼容用
     */
    public function Execute($sql)
    {
        return $this->safe_query($sql);
    }

    public function insert($table, $data, $return_insert_id=false, $replace=false)
    {
        $sql = $this->_insert_sql($data);
        $cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';
        $table = $this->table($table);
        if($rs = $this->query("$cmd $table $sql")){
            return $return_insert_id ? $this->insert_id() : $rs;
        }
        return false;
    }
    

    public function update($table, $data, $condition, $affected_rows=false, $low_priority=false)
    {
        $sql = $this->_update_sql($data);
        $cmd = "UPDATE ".($low_priority ? 'LOW_PRIORITY' : '');
        $where = '';
        if(empty($condition)) {
            $where = '1';
        }else if(is_array($condition)) {
            $where = implode(' AND ', $condition);
        }else{
            $where = $condition;
        }
        $table = $this->table($table);
        if($rs = $this->query("$cmd $table SET $sql WHERE $where")){
            if($affected_rows){
                return $this->affected_rows();
            }
        }
        return $rs;
    }

    public function select($table, $fields='*', $where=null, $order=null, $limit=null)
    {
        $where = $where ? $where : '1';
        $order = $order ? $order : ' ';
        $limit = $limit ? $limit : ' ';
        $sql = "SELECT * FROM ". $this->table($table)." WHERE $where $order $limit";
        return $this->Execute($sql);
    }
    
    protected function _insert_sql($data)
    {
        ksort($data);
        return "(`".implode("`,`",array_keys($data))."`) VALUES('".implode("','",$data)."')";
    }

    protected function _update_sql($data, $glue = ',')
    {
        $sql = $comma = '';
        foreach ((array)$data as $k => $v) {
            $k = "`{$k}`";
            if(substr($v,0,strlen($k)) == $k){
                $sql .= $comma."$k=$v";
            }else{
                $sql .= $comma."$k='$v'";
            }
            $comma = $glue;
        }
        return $sql;      
    }
    
    public function insert_id()
    {
        return mysql_insert_id($this->link);
    }

    /**
     * 同Adodb:GetRow,兼容用
     */
    public function GetRow($sql)
    {
        if(!preg_match("/LIMIT/i",$sql)){
            $sql = "$sql LIMIT 1";
        }
        if($rs = $this->Execute($sql)){
            return $rs->fetch();
        }
        return false;
    }

    /**
     * 同Adodb:GetOne,兼容用
     */
    public function GetOne($sql)
    {
        if(!preg_match("/LIMIT/i",$sql)){
            $sql = "$sql LIMIT 1";
        }
        if($rs = $this->Execute($sql)){
            $row = $rs->fetch_row();
            return $row[0];
        }
        return false;
    }

    public function GetAll($sql,$pk=null)
    {
        $rows = array();
       if($rs = $this->Execute($sql)){
            while($row = $rs->fetch()){
                if($pk !== null && $row[$pk]){
                    $rows[$row[$pk]] = $row;
                }else{
                   $rows[] = $row;
                }
            }
       }
       return $rows;
    }

    public function GetFields($table, $full=false)
    {
        $data = false;
        $FULL = $full ? 'FULL' : '';
        if($rs = $this->query("SHOW {$FULL} FIELDS FROM {$table}")){
            $data = array();
            while($value = $rs->fetch()) {
                $data[$value['Field']] = $value;
            }
        }
        return $data;        
    }

    public function table($table)
    {
        return $this->_tablepre.$table;
    }

    public function SQLLOG()
    {
        return array('Time'=>$this->total_exec_time,'QSQL'=>$this->_QSQL, 'ESQL'=>$this->_ESQL);
    }

    public function mysql_debug_backtrace()
    {
        $info = array();        
        if($data = debug_backtrace()){
            foreach($data as $k=>$v){
                if($k > 0 && ($v['file'])){
                    $info[] = sprintf('[%04d]%s', $v['line'], $v['file']);
                }
            }
        }
        return $info;
    }
}

class Mdl_Mysql_Result
{

    protected $resource = null;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function fetch()
    {
        return mysql_fetch_assoc($this->resource);
    }

    public function free()
    {
        if(mysql_free_result($this->resource)){
            $this->resource = null;
            return true;
        }
        return false;
    }

    public function fetch_row()
    {
        return mysql_fetch_row($this->resource);
    }

    //MYSQL_ASSOC，MYSQL_NUM, MYSQL_BOTH
    public function fetch_array($rstype=MYSQL_ASSOC)
    {
        return mysql_fetch_array($this->resource, $rstype);
    }

    public function fetch_assoc()
    {
        return mysql_fetch_assoc($this->resource);
    }

    public function fetch_all($pk=null)
    {
        $items = array();
        while($row = $this->fetch()){
            if($pk !== null){
                $items[$row[$pk]] = $row;
            }else{
                $items[] = $row;
            }
        }
        return $items;
    }

    public function num_rows()
    {
        return mysql_num_rows($this->resource);
    }

    public function __call($method, $args)
    {
        if(!function_exists("mysql_{$method}")){
            trigger_error("Mysql_Result::{$method} No Find!!!",E_USER_ERROR);
            return false;
        }
        return call_user_func_array("mysql_{$method}", array_merge(array($this->resource), $args));
    }

    public function show_error($err)
    {
        trigger_error($err);
    }
}