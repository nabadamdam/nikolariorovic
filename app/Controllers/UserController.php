<?php
namespace app\Controllers;
use app\Models\Users;

class UserController extends Controller {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }
    public function subscribe($request){
        try{
            if(isset($request['buttonSub'])){
                $users = new Users($this->db);
                $email = $request['email'];
                $errors = [];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors[] = "Nije email ok!";
                }
                if(count($errors) > 0){
                    header("Location: index.php?page=Home");
                }else{
                    $userReg = $users->getUserWithEmail($email);
                    if($userReg == ""){
                        $userSubInsert = $users->insSub($email); 
                        \http_response_code(200);
                        header("Location: index.php?page=Home&textSub=t");
                    }else{
                        \http_response_code(200);
                        header("Location: index.php?page=Home&textSub=f");
                    }
                }
            }
        }  
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
            header("Location: index.php?page=Home&text=f");
        }    
    }
    public function registration($request){
        try{
            if(isset($request['regB'])){
                $users = new Users($this->db);
                $name = $request['Name'];
                $surname = $request['Surname'];
                $email = $request['Email'];
                $username = $request['Username'];
                $password = $request['Password'];
                $errors = [];
                $reIme= "/^([A-Z][a-z]{2,11})+$/";
                $rePrezime = "/^([A-Z][a-z]{2,15})+$/";
                $reUser = "/^[A-z]{4,16}[\d]+$/";
                $reSifra = "/^[a-z]{4,16}[\d]+$/";
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // echo "Nije ok email!";
                    $errors[] = "Nije email ok!";
                }
                if(!preg_match($reIme,$name)){
                    $errors[] = "Nije ime ok!";
                }
                if(!preg_match($rePrezime,$surname)){
                    $errors[] = "Nije prezime ok!";
                }
                if(!preg_match($reUser,$username)){
                    $errors[] = "Nije user ok!";
                }
                if(!preg_match($reSifra,$password)){
                    $errors[] = "Nije password ok!";
                }
                if(count($errors) > 0){
                    header("Location: index.php?page=Contact");
                }else{
                    $userReg = $users->regUser($name, $surname, $email, $username, $password);
                    \http_response_code(200);
                }
                header("Location: index.php");
            }
        }  
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }   

    }
    public function login($request){
        try{
            if(isset($request['login'])){
                $users = new Users($this->db);
                $email = $request['email'];
                $password = $request['password'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: index.php");
                }
                else {
                    $user = $users->getUser($email, $password);
                    \http_response_code(200);
                    if($user){
                        $_SESSION['user'] = $user;
                        header("Location: index.php?page=Menu"); 
                    } else {
                        header("Location: index.php?text=log"); 
                    }
                }
            }
        }
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
        }  
    }

    public function logout(){
        try{
            $_SESSION['user'] = null;
            $this->redirect('Home');
        }
        catch(Exception $ex){
            $this->errorIns($ex->getMessage());
        }  
       
    }
}