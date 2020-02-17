<?php session_start();
ob_start();
require_once "app/Config/autoload.php";
require_once "app/Config/config.php";
use app\Models\DB;
$db = new DB(DB_SERVER, DB_DATABASE, DB_USERNAME, DB_PASSWORD);

use app\Controllers\HomeController as Home;
use app\Controllers\ServicesController as Service;
use app\Controllers\ProductsController as Product;
use app\Controllers\ContactController as Contact;
use app\Controllers\AutorController as Autor;
use app\Controllers\AdminController as Admin;
use app\Controllers\UserController as User;
use app\Controllers\Controller as Main;
$HomeController = new Home($db);
$ContactController = new Contact($db);
$ServiceController = new Service($db);
$ProductsController = new Product($db);
$AutorController = new Autor($db);
$AdminController = new Admin($db);
$UserController = new User($db);
$MainController = new Main($db);


if(!isset($_GET['page'])){
	$HomeController->homePage();
}
else {
	switch($_GET['page']){ 
	case 'Home':
        $HomeController->homePage();
		break;
	case 'Menu':
        $ProductsController->menuPage();
		break;
	case 'adminUsr':
		$AdminController->adminPageUser();
		break;
	case 'adminProd':
		$AdminController->adminPageProduct();
		break;
	case 'adminSub':
		$AdminController->adminPageSubscribe();
		break;
	case 'Services':
        $ServiceController->servicePage();
		break;
	case 'Contact':
        $ContactController->contactPage();
		break;
	case 'SearchProduct':
		$ProductsController->productPrSearch();
		break;
	case "login":
		$UserController->login($_POST);
		break;
	case "Logout":
		$UserController->logout();
		break;
	case "SortProduct":
		$ProductsController->sortProduct();
		break;
	case "Registration":
		$UserController->registration($_POST);
		break;
	case "ContactAdmin":
		$AdminController->adminPageContact();
		break;
	case "Author":
		$AutorController->autorPage();
		break;
	case "Admin":
		$AdminController->adminPage();
		break;	
	case "Delete":
		$AdminController->deleteProd();
		break;
	case "Insert":
		$AdminController->insertProd($_POST);
		break;
	case "Update":
		$AdminController->adminPageUpdate($_GET['idProd']);
		break;
	case "UpdateUser":
		$AdminController->adminPageUpdateUser($_GET['idUsr']);
		break;
	case "ExecuteUpdate":
		$AdminController->updateProd($_POST);
		break;
	case "ExecuteUpdateUser":
		$AdminController->updateUser($_POST);
		break;
	case "ContactUs":
		$ContactController->contactInsert($_POST);
		break;
	case "DeleteContact":
		$AdminController->deleteContact();
		break;
	case "onePicture":
		$ProductsController->viewOnePic($_GET['idPic']);
		break;
	case "Subscribe":
		$UserController->subscribe($_POST);
		break;
	case "DeleteSub":
		$AdminController->deleteSub();
		break;
	case "DeleteUser":
		$AdminController->deleteUser();
		break;
	case "404":
		$MainController->page404();
		break;
	case "403":
		$MainController->page403();
		break;
	case "301":
		$MainController->page301();
		break;
	default: 
		$HomeController->homePage();
		break;
	}
}
