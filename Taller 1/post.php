<?php

// Recibir datos
$nombre = $_POST['Nombre'];
$correo = $_POST['ID_autor'];

// Insertar datos
$sql = "INSERT INTO usuarios (Nombre, ID_autor) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nombre, $correo);
$stmt->execute();

// Devolver respuesta
if ($stmt->affected_rows > 0) {
  echo "Usuario creado correctamente";
} else {
  echo "Error al crear usuario";
}

$stmt->close();
$conn->close();

?>
