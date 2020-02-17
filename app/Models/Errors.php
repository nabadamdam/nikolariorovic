<?php
namespace app\Models;

class Errors {
    private $db;
    public function __construct(DB $db){
        $this->db = $db;
    }
    public function errorsM($error){
        return $this->db->errorIns($error);
    }
}