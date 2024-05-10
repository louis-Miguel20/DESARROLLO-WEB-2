<?php

header('Content-Type: application/json');

// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=dw_2', "root", "");

// Recibir datos
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];
$usuarios = $_POST['usuarios'];

// Insertar datos
$sql = "INSERT INTO usuario (nombre, correo,rol,usuarios) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $nombre);
$stmt->bindValue(2,  $correo);
$stmt->bindValue(3,  $rol);
$stmt->bindValue(4,  $usuarios);



// Devolver respuesta
if ($stmt->execute()) {

    $lastId = $conn->lastInsertId();

    $usuario = array(
        "id" => $lastId,
        "nombre" => $nombre,
        "correo" => $correo,
        "rol" => $rol,
        "usuarios" => $usuarios

    );

    echo json_encode($usuario);
} else {
    echo json_encode(array("error" => "Error al crear usuario"));
}
