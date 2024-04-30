<?php
header('Content-Type: application/json');

$datos = json_decode(file_get_contents('php://input'),true);


// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=taller1_desarroii', "root", "");
// Recibir datos
$id = $_GET['id_autor'];

// Actualizar datos
$sql = "UPDATE autores SET nombre = ?, nacionalidad = ? WHERE id_autor = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $datos["nombre"]);
$stmt->bindValue(2, $datos["nacionalidad"]);
$stmt->bindValue(3, $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->execute()) {
  echo json_encode(array("success" => "Autor actualizado correctamente"));
} else {
  echo json_encode(array("error" => "Error al actualizar Autor"));
}

