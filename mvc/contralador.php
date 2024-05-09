<?php
include 'Modelo.php';
include 'Vista.php';

class Controlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new Modelo("localhost","root","","dw_2");
        $this->vista = new Vista();
    }

    public function mostrarUsuarios() {
        $usuarios = $this->modelo->obtenerUsuarios();
        $this->vista->mostrarUsuarios($usuarios);
    }

    // Agrega más métodos para manejar otras acciones según sea necesario
}

$controlador = new Controlador();
$controlador->mostrarUsuarios();

