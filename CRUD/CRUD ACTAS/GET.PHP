<?php 
header("content-Type: application/json");

$conn = new PDO('mysql:host=localhost;dbname=dw_2',"root","");

$id = $_GET['id_acta'];

$id_numeri = intval($id);

$sql = "SELECT * FROM acta WHERE id_acta = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id_numeri) ;
$stmt->execute();

$usuario =$stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    echo json_encode($usuario);
} else {
    echo json_encode(array("error" => "acta no encontrada"));
}