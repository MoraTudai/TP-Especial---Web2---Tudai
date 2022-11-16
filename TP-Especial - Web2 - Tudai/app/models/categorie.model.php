<?php

class CategorieModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_store;charset=utf8', 'root', '');
    }

   /*Devuelve la lista de tareas completa*/
    function getAllCategories() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();

        // 3. obtengo los resultados
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categorias;
    }

    function getProductsByCategorie($id){
        $query = $this->db->prepare('SELECT * FROM products WHERE id_categorie=?');
        $query->execute([$id]);//SELECT products.*, categories.nombre as categoria FROM products JOIN categories ON products.id_categorie_fk = categories.id_categorie WHERE id_product=?;

        // 3. obtengo los resultados
        $productoPorCategoria = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $productoPorCategoria;
    }
    
    /*Inserta un producto en la base de datos*/
    function insertCategorie($nombre) {
        $query = $this->db->prepare ("INSERT INTO categories (nombre) VALUES (?)");
        $query->execute([$nombre]);//INSERT INTO `categories`(`nombre`) VALUES ('nueva categoria')
               
        return $this->db->lastInsertId();
    }

    /*Devuelve el producto identificado por su ID*/
    function categorieToModify($id) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare('SELECT * FROM categories WHERE id_categorie=?');
                                    //SELECT * FROM `categories` WHERE 1
        $query->execute([$id]);//SELECT products.*, categories.nombre as categoria FROM products JOIN categories ON products.id_categorie_fk = categories.id_categorie WHERE id_product=?;

        // 3. obtengo los resultados
        $categoriaAModificar = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categoriaAModificar;

    }

    public function editCategorie($nombre, $id) {
        $editarcategorias = $this->db->prepare("UPDATE categories SET nombre=? WHERE id_categorie = ?");
        $editarcategorias->execute([$nombre, $id]);
        //var_dump($query->errorInfo()); // y eliminar la redireccion
        return $editarcategorias;
    }

/*Elimina una categoria dado su id*/
    
    function deleteCategorie($id_categorie) {//consulta desde SQL -> DELETE FROM `products` WHERE `products`.`id_product` = 22;
        $query = $this->db->prepare('DELETE FROM categories WHERE id_categorie = ?');
        $query->execute([$id_categorie]);
    }
   
}
