<?php
namespace app\Controllers;
use app\Models\Links;
use app\Models\Products;
use app\Models\Contact;
use app\Models\Users;
class AdminController extends Controller{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function adminPage() {
        try{
            if(isset($_SESSION['user'])){
                if($_SESSION['user']->idUloga == 1){
                    $linksI = new Links($this->db);
                    $productsI = new Products($this->db);
                    $questionI = new Contact($this->db);
                    $usersSubI = new Users($this->db);
                    $links = $linksI->getAlllinks();
                    $products = $productsI->getAllproducts();
                    $questions = $questionI->getAllContact();
                    $usersSub = $usersSubI->getAllsub();
                    $users = $usersSubI->getAllusersAndRole();
                    $roles = $usersSubI->getAllRole();
                    $this->data['links'] = $links;
                    $this->data['products'] = $products;
                    $this->data['questions'] = $questions;
                    $this->data['usersSub'] = $usersSub;
                    $this->data['users'] = $users;
                    $this->data['roles'] =  $roles;
                    $this->loadView("admin",$this->data);
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
    public function adminPageUser(){
        try{
            $usersSubI = new Users($this->db);
            $users = $usersSubI->getAllusersAndRole();
            header("Content-Type: application/json");
            echo json_encode($users);
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        }
    }
    public function adminPageProduct(){
        try{
            $productsI = new Products($this->db);
            $products = $productsI->getAllproducts();
            header("Content-Type: application/json");
            echo json_encode($products);
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        }
    }
    public function adminPageContact(){
        try{
            $questionI = new Contact($this->db);
            $question = $questionI->getAllContact();
            header("Content-Type: application/json");
            echo json_encode($question);
            \http_response_code(200);
        } 
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        }
    }
    public function adminPageSubscribe(){
        try{
            $usersSubI = new Users($this->db);
            $UserSub = $usersSubI->getAllsub();
            header("Content-Type: application/json");
            echo json_encode($UserSub);
            \http_response_code(200);
        }
        catch(Exception $ex){
            \http_response_code(404);
            $this->db->errorIns($ex->getMessage());
        }
    }
    public function adminPageUpdate($id) {
        try{
            if(isset($_SESSION['user'])){
                if($_SESSION['user']->idUloga == 1){
                    $linksI = new Links($this->db);
                    $productsI = new Products($this->db);
                    $links = $linksI->getAlllinks();
                    $products = $productsI->getOneproduct($id);
                    $this->data['links'] = $links;
                    $this->data['products'] = $products;
                    $this->loadView("admin",$this->data);
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
    public function adminPageUpdateUser($id) {
        try{
            if(isset($_SESSION['user'])){
                if($_SESSION['user']->idUloga == 1){
                    $linksI = new Links($this->db);
                    $usersSubI = new Users($this->db);
                    $links = $linksI->getAlllinks();
                    $user = $usersSubI->getOneUser($id);
                    $roles = $usersSubI->getAllRole();
                    $this->data['links'] = $links;
                    $this->data['user'] = $user;
                    $this->data['roles'] = $roles;
                    $this->loadView("admin",$this->data);
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
    public function deleteProd(){
        try{
            if(isset($_POST['idProd'])){
                header("Content-Type: application/json");
                $id = $_POST['idProd'];
                $productsI = new Products($this->db);
                $usersSubI = new Users($this->db);
                $prodDelete = $productsI->deleteProducts($id);
                if($prodDelete){
                    $table = "proizvodi";
                    $operacija = "delete";
                    $ime = $_SESSION['user']->Ime;
                    $email = $_SESSION['user']->Email;
                    $usersSubI->insertOperation($ime,$email,$table,$operacija);
                    \http_response_code(200);
                    $data = [
                        "massage" => "Uspesan delete"
                    ];
                    echo json_encode($data);
                }else{
                    $dataError = [
                        "massage" => "Neuspesan delete"
                    ];
                    \http_response_code(500);
                    echo json_encode($dataError);
                }
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->db->errorIns($ex->getMessage());
        }
    } 
    public function deleteSub(){
        try{
            if(isset($_POST['idSub'])){
                header("Content-Type: application/json");
                $id = $_POST['idSub'];
                $usersSubI = new Users($this->db);
                $userSub = $usersSubI->deleteSub($id);
                if($userSub){
                    $table = "subscribe";
                    $operacija = "delete";
                    $ime = $_SESSION['user']->Ime;
                    $email = $_SESSION['user']->Email;
                    $usersSubI->insertOperation($ime,$email,$table,$operacija);
                    \http_response_code(200);
                    $data = [
                        "massage" => "Uspesan delete"
                    ];
                    echo json_encode($data);
                }else{
                    $dataError = [
                        "massage" => "Neuspesan delete"
                    ];
                    \http_response_code(500);
                    echo json_encode($dataError);
                }
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }
    } 
    public function deleteUser(){
        try{
            if(isset($_POST['idUsr'])){
                header("Content-Type: application/json");
                $id = $_POST['idUsr'];
                $usersSubI = new Users($this->db);
                $userSub = $usersSubI->deleteUser($id);
                if($userSub){
                    $table = "korisnici";
                    $operacija = "delete";
                    $ime = $_SESSION['user']->Ime;
                    $email = $_SESSION['user']->Email;
                    $usersSubI->insertOperation($ime,$email,$table,$operacija);
                    \http_response_code(200);
                    $data = [
                        "massage" => "Uspesan delete"
                    ];
                    echo json_encode($data);
                }else{
                    $dataError = [
                        "massage" => "Neuspesan delete"
                    ];
                    \http_response_code(500);
                    echo json_encode($dataError);
                }
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }
    } 
    public function deleteContact(){
        try{
            if(isset($_POST['idContact'])){
                header("Content-Type: application/json");
                $id = $_POST['idContact'];
                $questionI = new Contact($this->db);
                $usersSubI = new Users($this->db);
                $question = $questionI->deleteContact($id);
                if($question){
                    $table = "kontakt";
                    $operacija = "delete";
                    $ime = $_SESSION['user']->Ime;
                    $email = $_SESSION['user']->Email;
                    $usersSubI->insertOperation($ime,$email,$table,$operacija);
                    \http_response_code(200);
                    $data = [
                        "massage" => "Uspesan delete"
                    ];
                    echo json_encode($data);
                }else{
                    $dataError = [
                        "massage" => "Neuspesan delete"
                    ];
                    \http_response_code(500);
                    echo json_encode($dataError);
                }
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }
    } 
    public function insertProd($request){
        if(isset($request['insert'])){
            $productsI = new Products($this->db);
            $usersSubI = new Users($this->db);
            $name= $request['name'];
            $picAlt= $request['picAlt'];
            $desc= $request['desc'];
            $price= $request['price'];

            $image_name = $_FILES['picsrc']['name'];
            $image_tmp = $_FILES['picsrc']['tmp_name'];
            $image_type = $_FILES['picsrc']['type'];
            $image_size = $_FILES['picsrc']['size'];
            $formats_image = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
            $errors = [];
            if(empty($name) || empty($picAlt) || empty($desc) || empty($price)){
                header("Location: index.php?page=Admin&textEmpty=f");
            }
            if(!in_array($image_type,$formats_image)){
                $errors[] = "Type is not ok";
                header("Location: index.php?page=Admin&textFormat=f");
            }
            if($image_size > 3000000){
                $errors[] = "Size is not ok";
                header("Location: index.php?page=Admin&textSize=f");
            }
            if(count($errors) > 0){
                $_SESSION['regError'] = $errors;

            }else{
                $nameImages = time().$image_name;
                $pathOriginal = 'app/assets/images/'.$nameImages;
                if(move_uploaded_file($image_tmp, $pathOriginal)){
                    try{
                        $table = "proizvodi";
                        $operacija = "insert";
                        $ime = $_SESSION['user']->Ime;
                        $email = $_SESSION['user']->Email;
                        $usersSubI->insertOperation($ime,$email,$table,$operacija);
                        $insert = $productsI->insertProducts($name,$pathOriginal,$picAlt,$desc,$price);
                        if($insert){
                            \http_response_code(200);
                        }else{
                            \http_response_code(500);
                        }
                    }
                    catch(Exception $ex){
                        \http_response_code(500);
                        $this->errorIns($ex->getMessage());
                    }
                    header("Location: index.php?page=Admin");    
                }
            }
        
           
        }
      
    } 
    public function updateProd($request){
        try{
            if(isset($request['update'])){
                $productsI = new Products($this->db);
                $usersSubI = new Users($this->db);
                $id = $request['idProd'];
                $name = $request['name'];
                $picAlt = $request['picAlt'];
                $desc = $request['desc'];
                $priceS = $request['price'];
                $price = (float)$priceS;
                $table = "proizvodi";
                $operacija = "update";
                $ime = $_SESSION['user']->Ime;
                $email = $_SESSION['user']->Email;
                $usersSubI->insertOperation($ime,$email,$table,$operacija);
                $insert = $productsI->updateProducts($name,$picAlt,$desc,$price,$id);
                \http_response_code(200);
                header("Location: index.php?page=Admin");
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }
      
    } 
    public function updateUser($request){
        try{
            if(isset($request['updateUser'])){
                $usersSubI = new Users($this->db);
                $id = $request['idUsr'];
                $name= $request['nameUsr'];
                $surename= $request['surnameUsr'];
                $email= $request['emailUsr'];
                $username= $request['usernameUsr'];
                $idUloga= $request['idUser'];
                $table = "korisnici";
                $operacija = "update";
                $ime = $_SESSION['user']->Ime;
                $emailSession = $_SESSION['user']->Email;
                $usersSubI->insertOperation($ime,$emailSession,$table,$operacija);
                $updateUsr = $usersSubI->updateUser($name,$surename,$email,$username,$idUloga,$id);
                \http_response_code(200);
                header("Location: index.php?page=Admin");
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }
      
    } 
}