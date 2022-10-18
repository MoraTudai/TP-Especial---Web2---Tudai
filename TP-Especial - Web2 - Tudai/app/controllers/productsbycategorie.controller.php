<?php

require_once './app/models/productsbycategorie.model.php';
require_once './app/views/productsbycategorie.view.php';
require_once './app/helpers/auth.helper.php';


class ProductsByCategorieController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ProductsByCategorieModel();
        $this->view = new ProductsByCategorieView();
        $this->authHelper = new AuthHelper();

    }
    
    public function showProductsByCategorie() {
        //acá se podría pasar por parámetro una categoria??? En el router debería identificar la acción del href de la pantalla ?
        $productosPorCategoria = $this->model->getProductsByCategorie();
        $this->view->showProductsByCategorie($productosPorCategoria);
    }
    
}