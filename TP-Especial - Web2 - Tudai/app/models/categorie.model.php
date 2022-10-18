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

    /*Inserta un producto en la base de datos*/
    function insertCategorie($nombre) {
        $query = $this->db->prepare ("INSERT INTO categories (nombre) VALUES (?)");
        $query->execute([$nombre]);//INSERT INTO `categories`(`nombre`) VALUES ('A la tiza2')
               
        return $this->db->lastInsertId();
    }

    public function editCategorie($id_categorie, $nombre) {
        $editarcategorias = $this->db->prepare("UPDATE categories SET nombre=? WHERE id_categorie = ?");
        //("UPDATE `products` SET `name_product`='?',`size`='?',`color`='?',`price`='?',`id_categorie_fk`='?' WHERE 'id_product`='?'");
        $editarcategorias->execute([$id_categorie, $nombre]); //nombre-de-la-columna = valor[, nombre-de-la-columna=valor]
        //var_dump($query->errorInfo()); // y eliminar la redireccion
        return $editarcategorias;
    }

/*Elimina una categoria dado su id*/
    
    function deleteCategorie($id_categorie) {//consulta desde SQL -> DELETE FROM `products` WHERE `products`.`id_product` = 22;
        $query = $this->db->prepare('DELETE FROM categories WHERE id_categorie = ?');
        $query->execute([$id_categorie]);
    }
   
}
