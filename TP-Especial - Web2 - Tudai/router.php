<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/categorie.controller.php';
require_once './app/controllers/productsbycategorie.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'login'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'listProduct':
        $productController = new ProductController();
        $productController->showProducts();
        break;
    //case 'productDetail':
    //    $productController = new ProductController();
    //    $productController->showDetailProduct();
    //    break;
    case 'listCategorie':
        $categorieController = new CategorieController();
        $categorieController->showCategories();
        break;
    case 'productsByCategorie':
        $productsByCategorieController = new ProductsByCategorieController();
        $productsByCategorieController->showProductsByCategorie();
        break;
    case 'insertProduct':
        $productController = new ProductController();
        $productController->insertProduct();
        break;
    case 'insertCategorie':
        $categorieController = new CategorieController();
        $categorieController->insertCategorie();
        break;

    //edición de producto - 2 pasos -
    case 'showEdit':
        $productController = new ProductController();
        $id = $params[1];//$id_product = $_POST['id_product'];
        $productController->showEdit($id);
        break;
    case 'editProduct': 
        $productController = new ProductController();
        $id = $_POST['id'];//$id = $params[0];$id_product = $_POST['id_product'];
        $productController->editProduct($id);
        break;
    //fin edición de producto - 

    //edición de categoria - 2 pasos -
    case 'showEditCategorie':
        $categorieController = new CategorieController();
        $id = $params[1];//$id_product = $_POST['id_product'];
        $categorieController->showEditCategorie($id);
        break;
    case 'editCategorie': 
        $categorieController = new CategorieController();
        $id = $_POST['id'];
        $categorieController->editCategorie($id);
        break;
    //fin edición de categoria - 

    case 'deleteProduct':
        $productController = new ProductController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $productController->deleteProduct($id);
        break;
    case 'deleteCategorie':
        $categorieController = new CategorieController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $categorieController->deleteCategorie($id);
        break;    
    default:
        echo('404 Page not found');
        break;
}
