<?php
header('Content-Type: application/json');

$datos = json_decode(file_get_contents('php://input'),true);


// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=db_2', "root", "");
// Recibir datos
$id = $_GET['id_acta'];

// Actualizar datos
$sql = "UPDATE acta SET fecha = ?, tema = ? WHERE id_acta = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $datos["fecha"]);
$stmt->bindValue(2, $datos["tema"]);
$stmt->bindValue(3, $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->execute()) {
  echo json_encode(array("success" => "Acta actualizada correctamente"));
} else {
  echo json_encode(array("error" => "Error al actualizar Acta"));
}

