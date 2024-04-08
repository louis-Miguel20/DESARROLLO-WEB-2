<?php

// Recibir parámetro
$id = $_GET['id'];

// Eliminar datos
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->affected_rows > 0) {
  echo "Usuario eliminado correctamente";
} else {
  echo "Error al eliminar usuario";
}

$stmt->close();
$conn->close();

?>
