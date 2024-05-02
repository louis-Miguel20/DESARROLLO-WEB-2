<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=taller', "root", "admin");

    $sql = "SELECT * FROM usuarios";


    $res = $mbd->query($sql);

    $respuesta = [];
    foreach ($res as $fila) {
        $respuesta[] = $fila;
    }

    header('content-type:application/json;charset=utf-8');
    echo json_encode($respuesta);
    $mbd = null;
} catch (PDOException $e) {
    print('error mi dev' . $e->getMessage());
    die();
}
