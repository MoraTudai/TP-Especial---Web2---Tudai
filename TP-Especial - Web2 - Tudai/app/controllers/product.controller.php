<?php

require_once './app/models/product.model.php';
require_once './app/models/categorie.model.php';
require_once './app/views/product.view.php';
require_once './app/views/categorie.view.php';
require_once './app/helpers/auth.helper.php';


class ProductController {
    private $model;
    private $categorieModel;
    private $view;
    private $categorieView;
    private $authHelper;

    public function __construct() {
        $this->model = new ProductModel();
        $this->categorieModel = new CategorieModel();
        $this->view = new ProductView();
        $this->categorieView = new CategorieView();
        $this->authHelper = new AuthHelper();

        // barrera de seguridad - así sería cuando todo el sitio es privado?????????????????
        //$authHelper = new AuthHelper();
        //$authHelper->checkLoggedIn();
    }

    public function showProducts() {
        $productos = $this->model->getAllProducts();
        $categorias = $this->categorieModel->getAllCategories();
        $this->view->showProducts($productos, $categorias);
    }
    
    public function showProduct($id) {
        $detalleProducto = $this->model->getProductDetail($id);
        $this->view->showProductDetail($detalleProducto);
    }

    //----------------------------------------------------------
    // -------- Funciones con barrera de identificación --------
    //----------------------------------------------------------

    function insertProduct() {
    
        $this->authHelper->checkLoggedIn();
        // validar entrada de datos 
        $name_product = $_POST['name_product'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $id_categorie_fk = $_POST['id_categorie_fk'];  
        $description = $_POST['description']; 

        //verifico campos obligatorios
        if(empty ($name_product)||empty ($price)||empty ($id_categorie_fk)) {
            $this->view->showError ("Faltan datos obligatorios");
            die();
        }

        $this->model->insertProduct($name_product, $size, $color, $price, $id_categorie_fk, $description);
        
        header("Location: " . BASE_URL); 
    }
   
    //edición de productos en 2 pasos
    //1° paso
    function showEdit($id) {
        $this->authHelper->checkLoggedIn();
        $productoAModificar = $this->model->productToModify($id);
        $categorias = $this->categorieModel->getAllCategories();
        $this->view->showEdit($productoAModificar, $categorias);
    
    }
    //2° paso
    function editProduct($id) {
        //validar entrada de datos
        
        $name_product = $_POST['name_product'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $id_categorie_fk = $_POST['id_categorie_fk'];
        $description = $_POST['description'];

        if(empty($name_product) || empty($size)|| empty($color)|| empty($price)|| empty($id_categorie_fk)){
            $this->view->showError('Faltan datos obligatorios');
            die();
        }
          
        $editarproductos = $this->model->editProduct($name_product, $size, $color, $price, $id_categorie_fk, $description, $id);
        $productos = $this->model->getAllProducts();
        $categorias = $this->categorieModel->getAllCategories();

        $this->view->printEdit($editarproductos, $productos, $categorias);
        
    }

    function deleteProduct($id_product) {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteProduct($id_product);
        header("Location: " . BASE_URL);
    }

}
