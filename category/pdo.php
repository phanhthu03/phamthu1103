<?php
    $conn = new PDO('mysql:host=localhost;dbname=test','root', '');
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    function prepareSQL($sql){
        global $conn;
        return $conn->prepare($sql);
    }
    
    function getData(){
        $sql = "SELECT * FROM category";
        $select = prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    function getOneData($data){
        $sql = "SELECT * FROM category WHERE id = :id";
        $select = prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    function createNewData($data){
        $sql = "INSERT INTO category (name) VALUES (:name)";
        $create = prepareSQL($sql);
        $create->execute($data);
    }

    function updateData($data){
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
    function deleteData($data){
        $sql = "DELETE FROM category WHERE id = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
?>