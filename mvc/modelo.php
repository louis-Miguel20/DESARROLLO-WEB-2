<?php
class Modelo {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $baseDatos) {
        $this->conexion = new PDO("mysql:host=$host;dbname=$baseDatos", $usuario, $contrasena);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function obtenerUsuarios() {
        $query = $this->conexion->prepare("SELECT * FROM usuarios");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agrega más métodos para insertar, actualizar o eliminar datos según sea necesario
}

