<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class CategorieView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showCategories($categorias/*, $productos*/) {
        
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($categorias));
        $this->smarty->assign('categorias', $categorias);
        /*$this->smarty->assign('productos', $productos);*/

        // mostrar el tpl
        $this->smarty->display('categorieTable.tpl');
    }

    function showProductsByCategorie($productoPorCategoria, $productos){
        
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($productoPorCategoria));
        $this->smarty->assign('$productoPorCategoria', $productoPorCategoria);
        $this->smarty->assign('productos', $productos);

        // mostrar el tpl
        $this->smarty->display('productsByCategorie.tpl');    
    }

    function showEditCategorie($categoriaAModificar){
        
        // asigno variables al tpl smarty
       $this->smarty->assign('categoriaAModificar', $categoriaAModificar);

        // mostrar el tpl
        $this->smarty->display('categorie_to_modify.tpl');
        $this->smarty->display('form_edit_categorie.tpl');
    }

    function printEditCategorie($editarcategorias, $categorias) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($categorias));
        $this->smarty->assign('editarcategorias', $editarcategorias);
        $this->smarty->assign('categorias', $categorias);
                
        // mostrar el tpl
        $this->smarty->display('categorieTable.tpl');
    }

    function showError($message){
        echo "<h1>ERROR!</h1>";
        echo "<h2>$message</h2>";
    }

    
}