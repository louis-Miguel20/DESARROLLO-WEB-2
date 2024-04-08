<?php

// Recibir datos
$id = $_GET['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// Actualizar datos
$sql = "UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nombre, $correo, $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->affected_rows > 0) {
  echo "Usuario actualizado correctamente";
} else {
  echo "Error al actualizar usuario";
}

$stmt->close();
$conn->close();

?>
