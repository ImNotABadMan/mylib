<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 19:04:44
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-14 08:23:09
 */
namespace core;

class Model{
    private $type;
    private $host;
    private $port;
    private $dbname;
    private $charset;
    private $user;
    private $pwd;
    private $pdo;
    private $stmt;

    public function __construct($type="", $host="", $port="", $dbname="", $charset="", $user="", $pwd=""){
        $this->type = !empty($type) ? $type : C("mysql.type");
        $this->host = !empty($host) ? $host : C("mysql.host");
        $this->port = !empty($port) ? $port : C("mysql.port");
        $this->dbname = !empty($dbname) ? $dbname : C("mysql.dbname");
        $this->charset = !empty($charset) ? $charset : C("mysql.charset");
        $this->user = !empty($user) ? $user : C("mysql.user");
        $this->pwd = !empty($pwd) ? $pwd : C("mysql.pwd");
        $dsn = $this->type . ":host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
        $this->pdo = new \PDO($dsn, $this->user, $this->pwd);

        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // var_dump($this->pdo);
    }

    private static function getErr($err){

        if(!is_dir(ROOT . "logs")){
            mkdir(ROOT . "logs");
        }
        $str = str_repeat("--", 10) .date("Y-m-d H:i:s", time()) . str_repeat("--", 10) . "\n";
        $str .= "错误信息：" . $err->getMessage() . "\n";
        $str .= "错误文件：" . $err->getFile() . "\n";
        $str .= "错误行号：" . $err->getLine() . "\n";
        file_put_contents(ROOT . "logs" . "/" . $GLOBALS['plat'] . "/" . $GLOBALS['controller'] . ".log", $str . "\n", FILE_APPEND);
        header("location: ./error.html");
        exit;
    }

    public function getRow($fields, $tbname, $condition){
        $sql = "select {$fields} from {$tbname} where {$condition} limit 1";

        try{
            $this->stmt = $this->pdo->query($sql);
        }catch(\PDOException $ex){
            self::getErr($ex);
        }

        return $this->stmt->fetch(\PDO::FETCH_BOTH);
    }

    public function getRows($fields, $tbname, $condition){
        $sql = "select {$fileds} from {$tbname} where {$condition}";

        try{
            $this->stmt = $this->pdo->query($sql);
        }catch(\PDOException $ex){
            self::getErr($ex);
        }

        return $this->stmt->fetchAll();
    }
    public function execSql($sql){
        try{
            $this->stmt = $this->pdo->exec($sql);
        }catch(\PDOException $ex){
            self::getErr($ex);
        }

        return true;
    }
}