<?php

require_once './app/models/categorie.model.php';
require_once './app/models/product.model.php';
require_once './app/views/categorie.view.php';
require_once './app/helpers/auth.helper.php';


class CategorieController {
    private $model;
    private $productModel;
    private $view;
    private $authHelper;
    
    public function __construct() {
        $this->model = new CategorieModel();
        $this->productModel = new ProductModel();
        $this->view = new CategorieView();
        $this->authHelper = new AuthHelper();
        
        // barrera de seguridad - así sería cuando todo el sitio es privado?????????????????
        //$authHelper = new AuthHelper();
        //$authHelper->checkLoggedIn();
    }
    
    public function showCategories() {
        $categorias = $this->model->getAllCategories();
        $this->view->showCategories($categorias);
    }

    public function showProductsByCategorie($id) {
        $productoPorCategoria = $this->model->getProductsByCategorie($id);
        $productos = $this->productModel->getAllProducts();
        $this->view->showProductsByCategorie($productoPorCategoria, $productos);
    }

    //----------------------------------------------------------
    // -------- Funciones con barrera de identificación --------
    //----------------------------------------------------------

    function insertCategorie() {

        $this->authHelper->checkLoggedIn();
        
        // validar entrada de datos
        $nombre = $_POST['nombre'];
        
        //verifico campos obligatorios
        if(empty ($nombre)) {
            $this->view->showError ("Faltan datos obligatorios");
            die();
        }

        $this->model->insertCategorie($nombre);

        header("Location: " . BASE_URL); 
    }

    //edición de productos en 2 pasos
    //1° paso
    function showEditCategorie($id) {

        $this->authHelper->checkLoggedIn();
        
        $categoriaAModificar = $this->model->categorieToModify($id);
        $this->view->showEditCategorie($categoriaAModificar);
        
    }
    //2° paso
    function editCategorie($id) {
       
        // validar entrada de datos
        $nombre = $_POST['nombre'];
       
        $editarcategorias = $this->model->editCategorie($nombre, $id);
        $categorias = $this->model->getAllCategories();

        $this->view->printEditCategorie($editarcategorias, $categorias);
    }


    function deleteCategorie($id_categorie) {

        $this->authHelper->checkLoggedIn();

        $this->model->deleteCategorie($id_categorie);
        header("Location: " . BASE_URL);    }

}
