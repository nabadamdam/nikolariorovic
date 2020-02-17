<?php 
namespace app\Controllers;
use app\Models\Errors;
class Controller {
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    protected function loadView($view, $data=[]) {
        try{
            extract($data);
            include 'app/Views/fixed/head.php';
            include 'app/Views/fixed/navigation.php';
            include 'app/Views/fixed/headerMain.php';
            include 'app/Views/pages/' . $view . '.php';
            include 'app/Views/fixed/footer.php';
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        } 
    }
    protected function errorsPage($view) {
        include 'app/Views/pages/' . $view . ".php";
    }

    protected function redirect($page) {
        header("Location: index.php?page=" . $page);
    }
    public function page404(){
        $this->errorsPage("404");
    }
    public function page403(){
        $this->errorsPage("403");
    }
    public function page301(){
        $this->errorsPage("301");
    }
}