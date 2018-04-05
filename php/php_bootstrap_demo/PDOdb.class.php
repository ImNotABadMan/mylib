<?php
/**
 * @Author: anchen
 * @Date:   2017-11-20 19:49:33
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-21 09:50:08
 */

$GLOBALS["config"] = array(
    'mysql' => array(
        'host' => 'localhost',
        'port' => 'port',
        'dbname' => 'itcast',
        'charset' => 'utf8',
        'user' => 'root',
        'pwd' => '123456789'
        )
    );

class PDOdb{
    private $dsn;
    private $host;
    private $port;
    private $dbname;
    private $charset;
    private $user;
    private $pwd;

    private $pdo;

    public function __construct($host='', $port='', $dbname='', $charset='', $user='', $pwd=''){
        $this->host = empty($host) ? $this->C("mysql.host") : $host;
        $this->port = empty($port) ? $this->C("mysql.port") : $port;
        $this->dbname = empty($dbname) ? $this->C("mysql.dbname") : $dbanme;
        $this->charset = empty($charset) ? $this->C("mysql.charset") : $charset;
        $this->user = empty($user) ? $this->C("mysql.user") : $user;
        $this->pwd = empty($pwd) ? $this->C("mysql.pwd") : $pwd;
        $this->dsn = "mysql:host={$this->host};port={$this->port};charset={$this->charset};dbname={$this->dbname}";

        $this->pdo = new PDO($this->dsn, $this->user, $this->pwd);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function C($str){
        $config = $GLOBALS["config"];
        $arr = explode(".", $str);
        foreach($arr as $value){
            $config = $config[$value];
        }
        return $config;
    }

    public function getRow($fields, $tbname, $condition){
        try{
            $sql = "select {$fields} from {$tbname} where {$condition} limit 1";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $ex){
            echo "错误信息：" . $ex->getMessage() . "<br />";
            echo "错误文件：" . $ex->getFile() . "<br />";
            echo "错误行号：" . $ex->getLine() . "<br />";
        }
    }

    public function getRows($fields, $tbname, $condition, $offsetRow, $rows, $type){
        try{
            $sql = "select {$fields} from {$tbname} where {$condition} order by id limit {$offsetRow},{$rows}";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll($type);
        }catch(PDOException $ex){
            echo "错误信息：" . $ex->getMessage() . "<br />";
            echo "错误文件：" . $ex->getFile() . "<br />";
            echo "错误行号：" . $ex->getLine() . "<br />";
        }
    }

    public function getColumns($tbname){
        try{
            $sql = "select * from {$tbname} limit 1";
            $stmt = $this->pdo->query($sql);
            $count = $stmt->columnCount();
            $arr = array();
            for($i = 0; $i < $count; $i++){
                $arr[] = $stmt->getColumnMeta($i);
            }
            // var_dump($arr[0]);
            // exit;
            return $arr;
        }catch(PDOException $ex){
            echo "错误信息：" . $ex->getMessage() . "<br />";
            echo "错误文件：" . $ex->getFile() . "<br />";
            echo "错误行号：" . $ex->getLine() . "<br />";
        }
    }

    public function del($tbname, $id){
        try{
            $sql = "delete from {$tbname} where id = :id";
            $stmt = $this->pdo->prepare($sql);
            $arr = array(":id" => $id);
            return $stmt->execute($arr);
        }catch(PDOException $ex){
            echo "错误信息：" . $ex->getMessage() . "<br />";
            echo "错误文件：" . $ex->getFile() . "<br />";
            echo "错误行号：" . $ex->getLine() . "<br />";
        }
    }
    //id  | name | sex | age | learn  | salary | extramoney | nativeplace
    public function update($fields, $tbname, $id){
        try{
            $sql = "update {$tbname} set name=:name,sex=:sex,age=:age,learn=:learn,salary=:salary,extramoney=:extramoney,nativeplace=:nativeplace where id = {$id}";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($fields);
        }catch(PDOException $ex){
            echo "错误信息：" . $ex->getMessage() . "<br />";
            echo "错误文件：" . $ex->getFile() . "<br />";
            echo "错误行号：" . $ex->getLine() . "<br />";
        }
    }

    public function insert($fields, $tbname){
        try{
            $sql = "insert into {$tbname} values(null,:name,:sex,:age,:learn,:salary,:extramoney,:nativeplace)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($fields);
        }catch(PDOException $ex){
            echo "错误信息：" . $ex->getMessage() . "<br />";
            echo "错误文件：" . $ex->getFile() . "<br />";
            echo "错误行号：" . $ex->getLine() . "<br />";
        }
    }
}