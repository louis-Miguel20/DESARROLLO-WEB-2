<?php

header('Content-Type: application/json');

// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=taller1_desarroii', "root", "");

$id = $_GET['ID_autor'];

$id_numeri = intval($id);

// Seleccionar datos
$sql = "SELECT * FROM autores WHERE id_autor = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id_numeri );
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Devolver respuesta
if ($usuario) {
  echo json_encode($usuario);
} else {
  echo json_encode(array("error" => "Autor no encontrado"));
}


?>

<?php
/// PUNTO 3

/*
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
    foreach ($res as $fila) {
        $respuesta[] = $fila;
    }

    header('content-type:application/json;charset=utf-8');
    echo json_encode($respuesta);
    $mbd = null;
} catch(PDOException $e) {
    print('error mi dev'. $e->getMessage());
    die();
}*/