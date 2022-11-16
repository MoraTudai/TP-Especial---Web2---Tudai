<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/categorie.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listProduct'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

$authController = new AuthController();
$productController = new ProductController();
$categorieController = new CategorieController();

// tabla de ruteo
switch ($params[0]) {
    //login
    case 'login':
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController->validateUser();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'listProduct':
        $productController->showProducts();
        break;
    case 'listCategorie':
        $categorieController->showCategories();
        break;
    case 'showByProduct':
        $id = $params[1];
        $productController->showProduct($id);
        break;   
    case 'insertProduct':
        $productController->insertProduct();
        break;
    case 'insertCategorie':
        $categorieController->insertCategorie();
        break;

    //edición de producto - 2 pasos -
    case 'showEdit':
        $id = $params[1];//$id_product = $_POST['id_product'];
        $productController->showEdit($id);
        break;
        
    case 'editProduct': 
        $id = $_POST['id'];//$id = $params[0];$id_product = $_POST['id_product'];
        $productController->editProduct($id);
        break;
    //fin edición de producto - 

    //edición de categoria - 2 pasos -
    case 'showEditCategorie':
        $id = $params[1];//$id_product = $_POST['id_product'];
        $categorieController->showEditCategorie($id);
        break;
    case 'editCategorie': 
        $id = $_POST['id'];
        $categorieController->editCategorie($id);
        break;
    //fin edición de categoria - 

    case 'deleteProduct':
        // obtengo el parametro de la acción
        $id = $params[1];
        $productController->deleteProduct($id);
        break;
    case 'deleteCategorie':
        // obtengo el parametro de la acción
        $id = $params[1];
        $categorieController->deleteCategorie($id);
        break;    
    default:
        echo('404 Page not found');
        break;
}

