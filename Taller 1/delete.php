<?php

// Recibir parámetro
$id = $_GET['id'];

// Eliminar datos
$sql = "DELETE FROM autores WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->affected_rows > 0) {
  echo json_encode(array("success" => "autor eliminado correctamente"));
} else {
  echo json_encode(array("error" => "Error al eliminar autor"));
}

$stmt->close();
$conn->close();

?>
