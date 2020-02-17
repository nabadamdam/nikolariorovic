<?php
namespace app\Models;

class Products {
    private $db;
    public function __construct(DB $db){
        $this->db = $db;
    }
    public function getAllproducts(){
        return $this->db->executeQuery("SELECT * FROM proizvodi");
    }
    public function getOneproduct($id){
        return $this->db->executeOneRow("SELECT * FROM proizvodi WHERE idProizvoda = ?",[$id]);
    }
    public function updateProducts($name,$picAlt,$desc,$price,$id){
        return $this->db->update("UPDATE proizvodi SET Naziv = ?,SlikaAlt = ?,Opis = ?,Cena = ? WHERE idProizvoda = ?",[$name,$picAlt,$desc,$price,$id]);
    }
    public function deleteProducts($id){
        return $this->db->delete("DELETE FROM proizvodi WHERE idProizvoda = ?",[$id]);
    }
    public function insertProducts($name,$picSrc,$picAlt,$desc,$price){
        return $this->db->insert("INSERT INTO proizvodi (idProizvoda,Naziv,SlikaSrc,SlikaAlt,Opis,Cena) VALUES(NULL, ?, ?, ?, ?, ?)",[$name,$picSrc,$picAlt,$desc,$price]);
    }
    public function searchProducts($value){
        return $this->db->executeQuery("SELECT * FROM proizvodi WHERE Naziv LIKE '%$value%'");
    }
    public function sortProduct($value){
        return $this->db->executeQuery("SELECT * FROM proizvodi ORDER BY Cena $value");
    }
}