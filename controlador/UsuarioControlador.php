<?php
require_once '../modelo/Conexion.php';
require_once '../modelo/UsuarioModelo.php';

class UsuarioControlador {
    private $modelo;
    
    public function __construct() {
        $conexion = new Conexion();
        $this->modelo = new UsuarioModelo($conexion->getConexion());
    }

    public function iniciarSesion($usuario, $contrasena) {
        if (!empty($usuario) && !empty($contrasena)) {
            $resultado = $this->modelo->verificarUsuario($usuario, $contrasena);

            if ($resultado) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: ../vista/Reunion.html');
                exit();
            } else {
                return "Usuario o contraseña incorrectos";
            }
        } else {
            return "Datos de inicio de sesión no proporcionados";
        }
    }

    public function registrarUsuario($nombre, $correo, $usuario, $contrasena, $rol) {
        if (!empty($nombre) && !empty($correo) && !empty($usuario) && !empty($contrasena) && !empty($rol)) {
            $resultado = $this->modelo->registrarUsuario($nombre, $correo, $usuario, $contrasena, $rol);

            if ($resultado['status'] === "success") {
                echo "<script>alert('{$resultado['message']}'); window.location= '../vista/login/index.html';</script>";
                exit();
            } else {
                echo "<script>alert('{$resultado['message']}'); window.location= '../vista/login/index.html';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Datos de registro incompletos'); window.location= '../vista/login/index.html';</script>";
            exit();
        }
    }
}

$controlador = new UsuarioControlador();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario']) && isset($_POST['contrasena']) && !isset($_POST['nombre']) && !isset($_POST['correo']) && !isset($_POST['rol'])) {
        $mensaje = $controlador->iniciarSesion($_POST['usuario'], $_POST['contrasena']);
        if ($mensaje) {
            echo "<script>alert('$mensaje'); window.location= '../vista/login/index.html';</script>";
        }
    } elseif (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['rol'])) {
        $controlador->registrarUsuario($_POST['nombre'], $_POST['correo'], $_POST['usuario'], $_POST['contrasena'], $_POST['rol']);
    }
}
