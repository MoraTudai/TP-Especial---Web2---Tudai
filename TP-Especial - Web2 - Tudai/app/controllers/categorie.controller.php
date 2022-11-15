<?php

require_once './app/models/categorie.model.php';
require_once './app/views/categorie.view.php';
require_once './app/helpers/auth.helper.php';


class CategorieController {
    private $model;
    private $view;
    private $authHelper;
    
    public function __construct() {
        $this->model = new CategorieModel();
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

        header("Location: " . BASE_URL . "categorieTable.tpl"); 
    }

    //edición de productos en 2 pasos
    //1° paso
    function showEditCategorie($id_categorie) {
        $this->authHelper->checkLoggedIn();
        $this->view->showEditCategorie($id_categorie);
        
    }
    //2° paso
    function editCategorie($id) {
       
        // validar entrada de datos
        $nombre = $_POST['nombre'];
       
        $editarcategorias = $this->model->editCategorie($id, $nombre);
        $categorias = $this->model->getAllCategories();

        $this->view->printEditCategorie($editarcategorias, $categorias);
    }


    function deleteCategorie($id_categorie) {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteCategorie($id_categorie);
        header("Location: " . BASE_URL . "categorieTable.tpl");    }

}

