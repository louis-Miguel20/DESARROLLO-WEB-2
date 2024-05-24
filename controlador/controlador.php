<?php
require_once '../modelo/conexion.php';
require_once 'ReunionControlador.php';

// Crear instancia de la conexión
$conexion = new Conexion();
// Crear instancia del controlador
$controlador = new ReunionControlador($conexion->getConexion());

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de agregar reunión
    $fecha = $_POST["fecha"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_finalizacion = $_POST["hora_finalizacion"];
    $lugar = $_POST["lugar"];
    $estado = $_POST["estado"];

    // Agregar la reunión usando el controlador
    if ($controlador->agregarReunion($fecha, $hora_inicio, $hora_finalizacion, $lugar, $estado)) {
        // Mensaje de éxito
        echo '<script>alert("La reunión fue agregada correctamente.");</script>';
       
        echo '<script>window.location.href = "../vista/Reunion.html";</script>';
    } else {
        // Mensaje de error
        echo '<script>alert("Hubo un error al agregar la reunión.");</script>';
        
        echo '<script>window.location.href = "../vista/Reunion.html";</script>';
    }
} else {
    // Manejar el caso en el que no se envíe una solicitud POST
    echo "Por favor, envía el formulario correctamente.";
}
