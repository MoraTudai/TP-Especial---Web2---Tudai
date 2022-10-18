<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProductView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showProducts($productos) {
        // asigno variables al tpl smarty
       // $this->smarty->assign('count', count($productos)); 
       $this->smarty->assign('count', count($productos));
       $this->smarty->assign('productos', $productos);

        // mostrar el tpl
        $this->smarty->display('productList.tpl');
    }

    function showEdit($id_product) {
        
        // asigno variables al tpl smarty
        // $this->smarty->assign('count', count($productos)); 
        $this->smarty->assign('id_product', $id_product);

        // mostrar el tpl
        $this->smarty->display('form_edit_product.tpl');
    }

    function printEdit($editarproductos, $productos) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($productos));
        $this->smarty->assign('editarproductos', $editarproductos);
        $this->smarty->assign('productos', $productos);

        // mostrar el tpl
        $this->smarty->display('productList.tpl');
    }

    function showError($message){
        echo "<h1>ERROR!</h1>";
        echo "<h2>$message</h2>";
    }

   
}