<?php
namespace app\Models;

class DB {
    private $server;
    private $database;
    private $username;
    private $password;
    public $konekcija;

    public function __construct($server, $database, $username, $password){
        // echo "DB klasa napravljena!";
        $this->server = $server;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password; 
        $this->connect();
        $this->accessToThePage();
    }

    private function connect(){
        $this->konekcija = new \PDO("mysql:host={$this->server};dbname={$this->database};charset=utf8", $this->username, $this->password);
        $this->konekcija->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $this->konekcija->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery(string $query){
        return $this->konekcija->query($query)->fetchAll();
    }
    public function insert(string $query, Array $params){
        $prepare = $this->konekcija->prepare($query);
        $isInserted = $prepare->execute($params);
        return $isInserted;
    }
    public function update(string $query, Array $params){
        $prepare = $this->konekcija->prepare($query);
        $isUpdated = $prepare->execute($params);
        return $isUpdated;
     }
    public function delete(string $query, Array $params){
        $prepare = $this->konekcija->prepare($query);
        $isDeleted = $prepare->execute($params);
        return $isDeleted;
     }
    public function executeOneRow(string $query, Array $params){
        $prepare = $this->konekcija->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }
    public function errorIns($error){
        $open = fopen(ERRORS, "a");
        if($open){
            fwrite($open, $error."\n");
            fclose($open);
        }
    }
    public function accessToThePage(){
        $open = fopen(LOG_FILE, "a");
        if($open){
            if(isset($_GET['page'])){
                fwrite($open,$_SERVER['PHP_SELF']."\t".$_SERVER['REMOTE_ADDR']."\t".date("Y/m/d")."\t".$_GET['page']."\n");
            }
        }
        fclose($open);
    }
  
}