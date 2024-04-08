<?php
// Recibir datos
$id = $_GET['Id_autor'];
$nombre = $_POST['nombre'];
$nacionalidd = $_POST['nacionalidad'];

// Actualizar datos
$sql = "UPDATE usuarios SET nombre = ?, nacionalidad = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nombre, $correo, $id);
$stmt->execute();

// Devolver respuesta
if ($stmt->affected_rows > 0) {
  echo json_encode(array("success" => "Autor actualizado correctamente"));
} else {
  echo json_encode(array("error" => "Error al actualizar Autor"));
}

$stmt->close();
$conn->close();

?>
