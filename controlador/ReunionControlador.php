<?php
require_once '../modelo/ReunionModelo.php';

class ReunionControlador {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new ReunionModelo($conexion);
    }

    public function agregarReunion($fecha, $hora_inicio, $hora_finalizacion, $lugar, $estado) {
        return $this->modelo->agregarReunion($fecha, $hora_inicio, $hora_finalizacion, $lugar, $estado);
    }
}

