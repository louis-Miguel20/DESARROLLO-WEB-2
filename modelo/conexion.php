<?php

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('./../');

$dotenv->load();

class Conexion {
    private $host;
    private $usuario;
    private $password;
    private $db;
    private $conexion;

    public function __construct() {

        $this->host = $_ENV['HOST'];
        $this->usuario = $_ENV['USER'];
        $this->password = $_ENV['PASSWORD'];
        $this->db = $_ENV['DATABASE'];

        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->db);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
    public function conexionExitosa() {
        // Verificar si hay un error de conexión
        if ($this->conexion->connect_errno) {
            return false; // Si hay un error, la conexión no fue exitosa
        } else {
            return true; // Si no hay error, la conexión fue exitosa
        }
    }

}



