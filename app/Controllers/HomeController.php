<?php
namespace app\Controllers;
use app\Models\Links;
class HomeController extends Controller{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function homePage() {
        try{
            $linksI = new Links($this->db);
            $links = $linksI->getAlllinks();
            $this->data['links'] = $links;
            $this->loadView("home",$this->data);
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        } 
    }


}
