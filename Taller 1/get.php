<?php 
header("content-Type: application/json");

$conn = new PDO('mysql:host=localhost;dbname=taller1_desarroii',"root","");

$id = $_GET['id_autor'];

$id_numeri = intval($id);

$sql = "SELECT * FROM autores WHERE id_autot = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id_numeri) ;
$stmt->execute();

$usuario =$stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    echo json_encode($usuario);
} else {
    echo json_encode(array("error" => "autor no encontrado"));
}