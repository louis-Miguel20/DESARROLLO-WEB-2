<?php
// Recibir datos
$nombre = $_POST['nombre'];
$nacionalidad = $_POST['nacionalidad'];

// Insertar datos
$sql = "INSERT INTO usuarios (nombre, nacionalidad) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nombre, $nacionalidad);
$stmt->execute();

// Devolver respuesta
if ($stmt->affected_rows > 0) {
  $autor = array(
    "id" => $stmt->insert_id,
    "nombre" => $nombre,
    "nacionalidad" => $correo
  );
  echo json_encode($autor);
} else {
  echo json_encode(array("error" => "Error al crear autor"));
}

$stmt->close();
$conn->close();

?>
