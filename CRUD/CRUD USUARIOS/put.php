<?php
header('Content-Type: application/json');

$datos = json_decode(file_get_contents('php://input'),true);


// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=taller1_desarroii', "root", "");
// Recibir datos
$id = $_GET['id_usuario'];

// Actualizar datos
$sql = "UPDATE usuario SET nombre = ?, rol = ? WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $datos["nombre"]);
$stmt->bindValue(2, $datos["rol"]);
$stmt->bindValue(3, $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->execute()) {
  echo json_encode(array("success" => "Usuario actualizado correctamente"));
} else {
  echo json_encode(array("error" => "Error al actualizar Usuario"));
}

