<?php

class ProductModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_store;charset=utf8', 'root', '');
    }

    /*Devuelve la lista de tareas completa*/
    public function getAllProducts() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();

        // 3. obtengo los resultados
        $productos = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $productos;
    }

    /*Inserta un producto en la base de datos*/
    function insertProduct($name_product, $size, $color, $price, $id_categorie_fk){
        $query = $this->db->prepare("INSERT INTO products (name_product, size, color, price, id_categorie_fk) VALUES ( ?, ?, ?, ?, ?)");
        $query->execute([$name_product, $size, $color, $price, $id_categorie_fk]);      

        return $this->db->lastInsertId();
    }

    public function editProduct($id, $name_product, $size, $color, $price, $id_categorie_fk) {
        $editarproductos = $this->db->prepare("UPDATE products SET name_product=?,size=?,color=?,price=?,id_categorie_fk=? WHERE id_product=?");
        //('UPDATE products SET name_product=?, size=?, color=?, price=?, id_categorie_fk=? WHERE id_product = ?');
        $editarproductos->execute([$id, $name_product, $size, $color, $price, $id_categorie_fk]); //nombre-de-la-columna = valor[, nombre-de-la-columna=valor]
        //var_dump($query->errorInfo()); // y eliminar la redireccion
        return $editarproductos;
    }

    /*Elimina un producto dado su id*/
    function deleteProduct($id_product) {//consulta desde SQL -> DELETE FROM `products` WHERE `products`.`id_product` = 22;
        $query = $this->db->prepare('DELETE FROM products WHERE id_product = ?');
        $query->execute([$id_product]);
    }

   
}
