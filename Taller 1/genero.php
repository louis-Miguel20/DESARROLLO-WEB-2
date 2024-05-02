<?php



///PUNTO 3
try{
    $mbd = new PDO('mysql:host=localhost;dbname=taller1_desarroii', "root", "");

    $id=$_GET['id'];

    $sql = "SELECT 
    libros.Titulo AS Titulo_Libro,
    libros.Fecha_publicacion AS Fecha_Publicacion_Libro,
    libros.Numero_paginas AS Numero_Paginas_Libro,
    generos.Nombre AS Nombre_Genero,
    generos.Descripcion AS Descripcion_Genero,
    generos.Fecha_creacion AS Fecha_Creacion_Genero
FROM 
    libros
JOIN 
    generos ON libros.Genero_ID = generos.ID_genero
WHERE 
    generos.ID_genero =$id";


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