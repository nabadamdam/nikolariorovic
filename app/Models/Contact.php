<?php

namespace app\Models;

class Contact {
    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }
    public function contactIns($name, $email, $message){
        return $this->db->insert("INSERT INTO kontakt (Ime,Email,Pitanje) VALUES(?, ?, ?)",[$name, $email, $message]);
    }
    public function getAllContact(){
        return $this->db->executeQuery("SELECT * FROM kontakt");
    }
    public function deleteContact($id){
        return $this->db->delete("DELETE FROM kontakt WHERE idPitanja = ?",[$id]);
    }
}