<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProductView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showProducts($productos, $categorias) {
        // asigno variables al tpl smarty
       // $this->smarty->assign('count', count($productos)); 
       $this->smarty->assign('count', count($productos));
       $this->smarty->assign('productos', $productos);
       $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('productList.tpl');
    }

    function showProductDetail($detalleProducto) {
        // asigno variables al tpl smarty
       $this->smarty->assign('count', count($detalleProducto));
       $this->smarty->assign('detalleProducto', $detalleProducto); 

        // mostrar el tpl
        $this->smarty->display('productDetail.tpl');
    }

    function showEdit($productoAModificar, $categorias) {
        
        // asigno variables al tpl smarty
        $this->smarty->assign('productoAModificar', $productoAModificar);
        $this->smarty->assign('categorias', $categorias);
    //    $this->smarty->assign('name_product', $name_product);
      //  $this->smarty->assign('size', $size);
        //$this->smarty->assign('color', $color);
        //$this->smarty->assign('price', $price);
        //$this->smarty->assign('id_categorie_fk', $id_categorie_fk);

        // mostrar el tpl
        $this->smarty->display('product_to_modify.tpl');
        $this->smarty->display('form_edit_product.tpl');
    }

    function printEdit($editarproductos, $productos, $categorias) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($productos));
        $this->smarty->assign('editarproductos', $editarproductos);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('categorias', $categorias);

        // mostrar el tpl
        $this->smarty->display('productList.tpl');
    }

    function showError($message){
        // asigno variables al tpl smarty
        $this->smarty->assign('message', $message);
        
        // mostrar el tpl
        $this->smarty->display('error.tpl');
    }

   
}
