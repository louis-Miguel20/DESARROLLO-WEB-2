<?php

header('Content-Type: application/json');

// Recibir parámetros
$conn = new PDO('mysql:host=localhost;dbname=dw_2', "root", "");

// Recibir datos
$fecha = $_POST['fecha'];
$tema = $_POST['tema'];
$lugar = $_POST['lugar'];
$contenido = $_POST['contenido'];

// Insertar datos
$sql = "INSERT INTO acta (fecha, tema,lugar,contenido) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindValue(1, $fecha);
$stmt->bindValue(2,  $tema);
$stmt->bindValue(3,  $lugar);
$stmt->bindValue(4,  $contenido);



// Devolver respuesta
if ($stmt->execute()) {

    $lastId = $conn->lastInsertId();

    $acta = array(
        "id" => $lastId,
        "fecha" => $fecha,
        "tema" => $tema,
        "lugar" => $lugar,
        "contenido" => $contenido

    );

    echo json_encode($acta);
} else {
    echo json_encode(array("error" => "Error al crear acta"));
}
