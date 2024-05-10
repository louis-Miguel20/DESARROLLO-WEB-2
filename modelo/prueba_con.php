<?php

include 'Conexion.php'; // Incluimos la clase de conexión

$conexion = new Conexion(); // Creamos una instancia de la clase Conexion

if ($conexion->conexionExitosa()) {
    echo "La conexión a la base de datos fue exitosa.";
} else {
    echo "Error al conectar a la base de datos: " . $conexion->getConexion()->connect_error;
}


