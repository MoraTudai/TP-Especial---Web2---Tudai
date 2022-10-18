<?php

require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
require_once './app/helpers/auth.helper.php';


class ProductController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->authHelper = new AuthHelper();

        // barrera de seguridad - así sería cuando todo el sitio es privado?????????????????
        //$authHelper = new AuthHelper();
        //$authHelper->checkLoggedIn();
    }


    public function showProducts() {
        $productos = $this->model->getAllProducts();
        $this->view->showProducts($productos);
    }

    //public function showDetailProduct() {
        //$detalledeproducto = $this->model->getDetails();
        //$this->view->showDetails($detalledeproducto);
    //}
    
    function insertProduct() {
    
        $this->authHelper->checkLoggedIn();
       
        // validar entrada de datos 
        $name_product = $_POST['name_product'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $id_categorie_fk = $_POST['id_categorie_fk'];  

        //verifico campos obligatorios
        if(empty ($name_product)||empty ($price)||empty ($id_categorie_fk)) {
            $this->view->showError ("Faltan datos obligatorios");
            die();
        }

        $this->model->insertProduct($name_product, $size, $color, $price, $id_categorie_fk);
        
        header("Location: " . BASE_URL); 
    }
   
    //edición de productos en 2 pasos
    //1° paso
    function showEdit($id_product) {
        $this->authHelper->checkLoggedIn();
        $this->view->showEdit($id_product);
        
    }
    //2° paso
    function editProduct($id) {
        //validar entrada de datos
        
        $name_product = $_POST['name_product'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $id_categorie_fk = $_POST['id_categorie_fk'];  

        $editarproductos = $this->model->editProduct($id, $name_product, $size, $color, $price, $id_categorie_fk);
        $productos = $this->model->getAllProducts();
        
        $this->view->printEdit($editarproductos, $productos);
        
    }

    function deleteProduct($id_product) {

        $this->authHelper->checkLoggedIn();
        $this->model->deleteProduct($id_product);
        header("Location: " . BASE_URL . "listProduct");
    }

}
