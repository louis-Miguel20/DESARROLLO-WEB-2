<?php

// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=dw_2', "root", "");

// Recibir parámetro
$id = $_GET['id'];

// Eliminar datos
$sql = "DELETE FROM usuario WHERE id_usuario = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->execute ()) {
  echo json_encode(array("success" => "usuario eliminado correctamente"));
} else {
  echo json_encode(array("error" => "Error al eliminar usuario"));
}


