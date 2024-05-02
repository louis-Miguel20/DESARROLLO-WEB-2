<?php

try{
    $mbd = new PDO('mysql:host=localhost;dbname=dw_2', "root", "");

    $id;

    #$sql = "SELECT * FROM autores";
    #$sql = "SELECT * FROM editoriales";
    #$sql = "SELECT * FROM generos";
    $sql = "SELECT * FROM usuario";


    $res = $mbd->query($sql);

    

    $respuesta = [];

    while ($fila = $res->fetch(PDO::FETCH_ASSOC)) {
        $respuesta[] = $fila;
    }

    header('content-type:application/json;charset=utf-8');
    echo json_encode($respuesta);
    $mbd = null;
} catch(PDOException $e) {
    print('error mi dev'. $e->getMessage());
    die();
}