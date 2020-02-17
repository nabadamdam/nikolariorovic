<?php
namespace app\Controllers;
use app\Models\Links;
class ServicesController extends Controller{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }    
    public function servicePage() {
        try{
            $linksI = new Links($this->db);
            $links = $linksI->getAlllinks();
            $this->data['links'] = $links;
            $this->loadView("service",$this->data);
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->errorIns($ex->getMessage());
        }
    }


}
