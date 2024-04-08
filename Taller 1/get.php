<?php

// Recibir parámetros
$id = $_GET['id'];

// Seleccionar datos
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Obtener resultado
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Devolver respuesta
if ($usuario) {
  echo json_encode($usuario);
} else {
  echo "Usuario no encontrado";
}

$stmt->close();
$conn->close();

?>
