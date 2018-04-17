<?php
/**
 * @Author: anchen
 * @Date:   2018-04-13 14:11:10
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-04-17 10:17:35
 */

class DB{
    private $_sql;
    private $_dbname;
    private $_username;
    private $_pwd;
    private $_type;
    private $_host;
    private $_char;
    private $_port;
    private $_table; // 数据表

    private $_condition;// 条件

    protected $_pdo;//保存PDO类的对象的属性
    protected $_pdostatement;//保存PDOStatement类的对象的属性
    protected $_field = '*';

    public function __construct($config = []){
        if( empty($config) ){
            $this->_type        = conf('db.type');
            $this->_username    = conf('db.username');
            $this->_pwd         = conf('db.pwd');
            $this->_dbname      = conf('db.dbname');
            $this->_host        = conf('db.host');
            $this->_char        = conf('db.char');
            $this->_port        = conf('db.port');
        }else{
            $this->_type        = $config['type'];
            $this->_username    = $config['username'];
            $this->_pwd         = $config['pwd'];
            $this->_dbname      = $config['dbname'];
            $this->_host        = $config['host'];
            $this->_char        = $config['char'];
            $this->_port        = $config['port'];
        }

        $connetStr = "{$this->_type}:host={$this->_host};port={$this->_port};charset={$this->_char};dbname={$this->_dbname}";

        $this->_pdo = new PDO($connetStr, $this->_username, $this->_pwd);

        $this->_pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function field($str){
        $this->_field = $str;
        return $this;
    }

    public function table($str){
        $this->_table = $str;
        return $this;
    }

    private function _condition($condition){
        $str = '';
        foreach ($condition as $key => $val) {
            if($str != '' && $val[0] != 'or'){
                $str .= ' and ';
            }
            switch ($val) {
                case is_string($val):
                    $str .= " $key = '$val' ";
                    break;
                case is_numeric($val):
                    $str .= " $key = $val ";
                    break;
                case is_array($val):
                    // [ 'id' => ['<', 123456] ]
                    if( is_array($val) ){
                        // [ 'id' => ['<', 123456] ]
                        if( is_array($val[0]) ){
                            // [ 'id' => ['<', 123456] ]
                            // [ 'id' => [ ['>', 123456], ['<', 123459] ]
                            foreach ($val as $k => $v) {
                                $str .= " $key {$v[0]} '$v[1]' ";
                                // echo $k . ' ' . (count($val) - 1) . "\n";
                                if( $k != count($val) - 1 ){
                                    if( isset($v[2]) ){
                                        $str .= $v[2];
                                    }else{
                                        $str .= ' and ';
                                    }
                                }
                            }
                        }else{
                            $str .= " $key {$val[0]} '$val[1]' ";
                        }
                    }else{
                        $str .= " $key {$val[0]} '$val[1]' ";
                    }
                    break;
                default:
                    $str .= " $key = '$val' ";
                    break;
            }
        }
        $this->_condition = $str;
        return $this;
    }

    public function getSql(){
        return $this->_sql;
    }

    public function errMsg($err){
        echo '错误信息为：' . $err->getMessage() . '<br/>';
        echo '出错的文件：' . $err->getFile() . '<br/>';
        echo '在文件中出错的位置：' . $err->getLine();
        exit;
    }

    public function select($condition = [], $type = ""){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = 'where ' . $this->_condition;
        }
        $sql = "select {$this->_field} from {$this->_table} {$this->_condition}";
        $this->_sql = $sql;

        try{
            $this->_pdostatement = $this->_pdo->query($sql);
        }catch(PDOException $err){
            $this->errMsg($err);//输出错误信息
        }
        $PDOType = !empty($type) ? $type : PDO::FETCH_ASSOC;
        return $this->_pdostatement->fetchAll($PDOType);
    }

    public function find($condition = [], $type = ""){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = 'where ' . $this->_condition;
        }
        $sql = "select {$this->_field} from {$this->_table} {$this->_condition}";
        $this->_sql = $sql;

        try{
            $this->_pdostatement = $this->_pdo->query($sql);
        }catch(PDOException $err){
            $this->errMsg($err);//输出错误信息
        }
        $PDOType = !empty($type) ? $type : PDO::FETCH_ASSOC;
        return $this->_pdostatement->fetch($PDOType);
    }

    private function _setData($data){
        $str = '';
        foreach ($data as $key => $val) {
            if( $str != '' ){
                $str .= ' , ';
            }
            if( is_string($val) ){
                $str .= " $key = '$val' ";
            }else if( is_numeric($val) ){
                $str .= " $key = $val ";
            }
        }
        return $str;
    }

    public function update($data, $condition = ''){
        if( !empty($condition) ){
            $this->_condition($condition);
            $this->_condition = ' where ' . $this->_condition;
        }
        $data = $this->_setData($data);
        $sql = "update {$this->_table} set {$data} {$this->_condition}";

        try{
            $this->_pdo->exec($sql);
        }catch(PDOException $err){
            $this->errMsg($err);
        }

        return true;
    }

    public function insert($data){
        $dataStr = $this->_setData($data);
        $keyStr = "(";
        $index = 1;
        foreach ($data as $key => $val) {
            if( $index != 1 ){
                $keyStr .= ',';
            }
            $keyStr .= $key;
            $index++;
        }
        $keyStr .= ")";

        $dataStr = '(';
        $index = 1;
        foreach ($data as $key => $val) {
            if( $index != 1 ){
                $dataStr .= ',';
            }
            if( is_string($val) ){
                $dataStr .= "'{$val}'";
            }else if(is_numeric($val)){
                $dataStr .= $val;
            }
            $index++;
        }
        $dataStr .= ")";

        $sql = "insert into {$this->_table}{$keyStr} values{$dataStr}";
        $this->_sql = $sql;

        try{
            $this->_pdo->exec($sql);
        }catch(PDOException $err){
            $this->errMsg($err);
        }

        return true;
    }
}