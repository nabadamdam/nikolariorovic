<?php
namespace app\Models;

class Users {
    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }
    public function getAllsub(){
        return $this->db->executeQuery("SELECT * FROM subscribe");
    }
    public function getAllusers(){
        return $this->db->executeQuery("SELECT * FROM korisnici");
    }
    public function getAllRole(){
        return $this->db->executeQuery("SELECT * FROM uloga");
    }
    public function getAllusersAndRole(){
        return $this->db->executeQuery("SELECT k.idKorisnika,k.Ime,k.Prezime,k.Email,k.Username,k.Pass,k.idUloga,u.NazivUloga FROM korisnici k INNER JOIN uloga u ON k.idUloga=u.idUloga");
    }
    public function getOneUser($id){
        return $this->db->executeOneRow("SELECT k.idKorisnika,k.Ime,k.Prezime,k.Email,k.Username,k.Pass,k.idUloga,u.NazivUloga FROM korisnici k INNER JOIN uloga u ON k.idUloga=u.idUloga WHERE idKorisnika = ?",[$id]);
    }
    public function getUserWithEmail($email){
        return $this->db->executeOneRow("SELECT * FROM subscribe WHERE Email = ? ", [$email]);
    }
    public function getUser($email, $password){
        return $this->db->executeOneRow("SELECT idKorisnika, Ime, Prezime, Email, Username, idUloga FROM korisnici WHERE Email = ? AND Pass = MD5(?)", [$email, $password]);
    }
    public function regUser($name, $surname, $email, $username, $password){
        return $this->db->insert("INSERT INTO korisnici (Ime,Prezime,Email,Username,Pass,idUloga) VALUES(?, ?, ?, ?,MD5(?),2)",[$name,$surname,$email,$username,$password]);
    }
    public function contactIns($name, $email, $message){
        return $this->db->insert("INSERT INTO korisnici (Ime,Prezime,Email,Username,Pass,idUloga) VALUES(?, ?, ?, ?,MD5(?),2)",[$name,$surname,$email,$username,$password]);
    }
    public function insSub($email){
        return $this->db->insert("INSERT INTO subscribe (idSub,Email) VALUES(NULL, ?)",[$email]);
    }
    public function deleteSub($id){
        return $this->db->delete("DELETE FROM subscribe WHERE idSub = ?",[$id]);
    }
    public function deleteUser($id){
        return $this->db->delete("DELETE FROM korisnici WHERE idKorisnika = ?",[$id]);
    }
    public function updateUser($name,$surename,$email,$username,$idUloga,$id){
        return $this->db->update("UPDATE korisnici SET Ime = ?,Prezime = ?,Email = ?,Username = ?,idUloga = ? WHERE idKorisnika = ?",[$name,$surename,$email,$username,$idUloga,$id]);
    }
    public function insertOperation($name,$email,$table,$operation){
        return $this->db->insert("INSERT INTO aktivnosti (idAktivnosti,ImeKorisnika,EmailKorisnika,Tabela,OperacijaNadTabelom) VALUES(NULL, ?, ?, ?, ?)",[$name,$email,$table,$operation]);
    }
}