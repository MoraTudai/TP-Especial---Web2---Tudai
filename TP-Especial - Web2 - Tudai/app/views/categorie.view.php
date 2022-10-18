<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class CategorieView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showCategories($categorias) {
        // asigno variables al tpl smarty
       
       $this->smarty->assign('count', count($categorias));
       $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('categorieTable.tpl');
    }

    function showEditCategorie($id_categorie) {
        
        // asigno variables al tpl smarty
       // $this->smarty->assign('count', count($productos)); 
       $this->smarty->assign('id_categorie', $id_categorie);

        // mostrar el tpl
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