<?php

// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=taller1_desarroii', "root", "");

// Recibir parámetro
$id = $_GET['id'];

// Eliminar datos
$sql = "DELETE FROM autores WHERE id_autor = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->execute ()) {
  echo json_encode(array("success" => "autor eliminado correctamente"));
} else {
  echo json_encode(array("error" => "Error al eliminar autor"));
}



?>
