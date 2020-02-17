<?php
namespace app\Models;

class Links {
    private $db;
    public function __construct(DB $db){
        $this->db = $db;
    }
    public function getAlllinks(){
        return $this->db->executeQuery("SELECT * FROM navigacija");
    }
}