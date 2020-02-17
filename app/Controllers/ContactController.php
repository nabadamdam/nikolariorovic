<?php
namespace app\Controllers;
use app\Models\Links;
use app\Models\Contact;
class ContactController extends Controller{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function contactPage() {
        try{
            $linksI = new Links($this->db);
            $links = $linksI->getAlllinks();
            $this->data['links'] = $links;
            $this->loadView("contact",$this->data);
            \http_response_code(200);
        }  
        catch(Exception $ex){
            \http_response_code(404);
            $this->errorIns($ex->getMessage());
        } 
    }
    public function contactInsert($request){
        try{
            if(isset($request['contact'])){
                $contact = new Contact($this->db);
                $name = $request['name'];
                $email = $request['email'];
                $message = $request['message'];
                $errors = [];
                $reIme= "/^([A-Z][a-z]{2,11})+$/";
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // echo "Nije ok email!";
                    $errors[] = "Nije email ok!";
                }
                if(!preg_match($reIme,$name)){
                    $errors[] = "Nije ime ok!";
                }
                if(count($errors) > 0){
                    header("Location: index.php?page=Contact");
                }else{
                    $contactIns = $contact->contactIns($name, $email, $message);
                    \http_response_code(200);
                    header("Location: index.php?page=Contact&text=t");  
                }
            }
        }  
        catch(Exception $ex){
            \http_response_code(500);
            $this->errorIns($ex->getMessage());
            header("Location: index.php?page=Contact&text=f");  
        } 
    }
}
