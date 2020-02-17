<?php
namespace app\Controllers;
use app\Models\Products;
use app\Models\Links;
class ProductsController extends Controller{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function menuPage() {
        try{
            if(isset($_SESSION['user'])){
                if($_SESSION['user']->idUloga == 1 || $_SESSION['user']->idUloga == 2){
                    $linksI = new Links($this->db);
                    $productsI = new Products($this->db);
                    $products = $productsI->getAllproducts();
                    $links = $linksI->getAlllinks();
                    $this->data['links'] =  $links;
                    $this->data['products'] =  $products;
                    $this->loadView("menu",$this->data);
                    \http_response_code(200);
                }else{
                    header("Location: index.php?page=Home");
                }
            }else{
                header("Location: index.php?page=Home"); 
            }
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        }
    }
    public function productPrSearch(){
        try{
            if(isset($_POST['value'])){
                header("Content-Type: application/json");
                $value = $_POST['value'];
                $productsI = new Products($this->db);
                $products = $productsI->searchProducts($value);
                echo json_encode($products);
                \http_response_code(200);
            } 
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        }
    }
    public function sortProduct(){
        try{
            if(isset($_POST['value'])){
                header("Content-Type: application/json");
                $value = $_POST['value'];
                $productsI = new Products($this->db);
                if($value == "default"){
                    $products = $productsI->getAllproducts();
                    echo json_encode($products);
                    \http_response_code(200);
                }else{
                    $products = $productsI->sortProduct($value);
                    echo json_encode($products);
                    \http_response_code(200);
                }
            }
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        } 
    }
    public function viewOnePic($id) {
        try{
            $productsI = new Products($this->db);
            $linksI = new Links($this->db);
            $products = $productsI->getOneproduct($id);
            $links = $linksI->getAlllinks();
            $this->data['oneProducts'] = $products;
            $this->data['links'] =  $links;
            $this->loadView("menu",$this->data);
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        } 
    }
}
