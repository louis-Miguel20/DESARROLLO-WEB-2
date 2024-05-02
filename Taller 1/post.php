<?php

header('Content-Type: application/json');

// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=taller1_desarroii', "root", "");

// Recibir datos
$nombre = $_POST['nombre'];
$nacionalidad = $_POST['nacionalidad'];
$Fecha = $_POST['fecha-nacimiento'];
$bio = $_POST['biografia'];

// Insertar datos
$sql = "INSERT INTO autores (nombre, nacionalidad,Fecha_Nacimiento,Biografia) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1 , $nombre);
$stmt->bindValue(2 ,  $nacionalidad);
$stmt->bindValue(3 ,  $Fecha);
$stmt->bindValue(4 ,  $bio);



// Devolver respuesta
if ($stmt->execute()) {

  $lastId = $conn->lastInsertId();

  $autor = array(
    "id" => $lastId,
    "nombre" => $nombre,
    "nacinalidad" => $nacionalidad,
    "fecha de nacimiento" => $Fecha,
    "bio" => $bio
    
  );

  echo json_encode($autor);
} else {
  echo json_encode(array("error" => "Error al crear autor"));
}



