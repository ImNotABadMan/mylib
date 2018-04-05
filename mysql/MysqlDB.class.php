<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 10:27:12
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-15 11:48:50
 */
//连库三步走4
Class MysqlDB{

    private $link;
    private $host;
    private $user;
    private $psw;
    private $db;

    public function __construct($host, $user, $psw, $db, $new_link = true, $charset="utf8"){
        $this->mysql_connect($host, $user, $psw, $new_link);
        $this->mysql_charset_and_db($db, $charset);
        $this->host = $host;
        $this->user = $user;
        $this->psw = $psw;
        $this->db = $db;
    }

    private function mysql_connect($host, $user, $psw){
        @$this->link = mysql_connect($host, $user, $psw);
        if(!$this->link){
            echo "连接数据库出错<br />";
        }
        // return $link;
    }

    private function mysql_charset_and_db($db, $charset){
        @$re = mysql_select_db($db, $this->link);
        if(!$re){
            echo "选择数据库出错<br />";
            return;
        }

        @$re = mysql_set_charset($charset, $this->link);
        if(!$re){
            echo "设置字符子出错<br />";
            return;
        }

        return $re;
    }


    public function query($sql){
        @$re = mysql_query($sql, $this->link);
        if(!$re){
            echo "执行出错<br />";
            return;
        }

        return $re;
    }

    public function fetch_to_assocArray($result){
        $arr = array();
        if(is_resource($result)){
            while($value = mysql_fetch_assoc($result)){
                $arr[] = $value;
            }
        }

        return $arr;
    }

    public function fetch_to_indexArray($result){
        $arr = array();
        if(is_resource($result)){
            while($value = mysql_fetch_row($result)){
                $arr[] = $value;
            }
        }

        return $arr;
    }

    public function get_fields($result){
        $arr = array();
        if(is_resource($result)){
            $count = mysql_num_fields($result);

            for($i = 0; $i < $count; $i++){
                $arr[] = mysql_field_name($result, $i);
            }
        }

        return $arr;
    }

     public function mysqlclose(){
        if($this->link){
            $re = mysql_close($this->link);
        }
        if(!$re){
            echo "关闭数据库出错<br />";
            return false;
        }

        return $re;
    }

}
