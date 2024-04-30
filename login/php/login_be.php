<?php

session_start(); // Inicia la sesión

include 'conexion_be.php';

if(isset($_POST['usuario']) && isset($_POST['correo'])) {
    $usuario_login = $_POST['usuario'];
    $correo_login = $_POST['correo'];

    // Busca el usuario en la base de datos
    $query = "SELECT * FROM usuario WHERE usuario='$usuario_login' AND correo='$correo_login'";
    $resultado = mysqli_query($con, $query);

    if(mysqli_num_rows($resultado) == 1) { // Si se encuentra un usuario con esos datos
        // Inicia sesión y redirige al usuario a la página de inicio
        $_SESSION['usuario'] = $usuario_login;
        header('Location: ../admin/index_admin.html');
        exit();
    } else {
        // Si no se encuentra, muestra un mensaje de error
        echo '<script>alert("Usuario o correo incorrectos"); window.location= "../index.php";</script>';
    }
} else {
    echo "Datos de inicio de sesión no proporcionados";
}
