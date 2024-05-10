<?php
include '../modelo/conexion.php'; // Incluimos el archivo de la clase de conexión

session_start();

// Manejo del inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']) && isset($_POST['correo'])) {
    $usuario_login = $_POST['usuario'];
    $correo_login = $_POST['correo'];

    if (!empty($usuario_login) && !empty($correo_login)) {
        // Creamos una instancia de la clase Conexion
        $conexion = new Conexion();
        $con = $conexion->getConexion();

        // Realizamos la consulta
        $query = "SELECT * FROM usuario WHERE usuario='$usuario_login' AND correo='$correo_login'";
        $resultado = mysqli_query($con, $query);

        // Verificamos si se encontró un usuario con esos datos
        if (mysqli_num_rows($resultado) == 1) {
            $_SESSION['usuario'] = $usuario_login;
            header('Location: ./../vista/admin/index_admin.html');
            exit();
        } else {
            echo '<script>alert("Usuario o correo incorrectos"); window.location= "./../../DESARROLLO-WEB-2/vista/login/index.html";</script>';
        }
         } else {
          echo "Datos de inicio de sesión no proporcionados";
         }
}

// Verificar si el formulario de registro se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['usuario'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];

    if (!empty($nombre) && !empty($correo) && !empty($usuario)) {
        // Creamos una instancia de la clase Conexion
        $conexion = new Conexion();
        $con = $conexion->getConexion();

        // Verificar si el correo ya está registrado
        $ver_correo = mysqli_query($con, "SELECT * FROM usuario WHERE correo ='$correo'");
        if (mysqli_num_rows($ver_correo) > 0) {
            echo '<script>alert("Este correo ya está registrado, intenta con otro"); window.location= "./../../DESARROLLO-WEB-2/index.php";</script>';
            exit();
        }

        // Verificar si el usuario ya está registrado
        $ver_usuario = mysqli_query($con, "SELECT * FROM usuario WHERE usuario ='$usuario'");
        if (mysqli_num_rows($ver_usuario) > 0) {
            echo '<script>alert("Este usuario ya está registrado, intenta con otro"); window.location= "./../../DESARROLLO-WEB-2/index.php";</script>';
            exit();
        }

        // Insertar el nuevo usuario en la base de datos
        $query = "INSERT INTO usuario(nombre, correo, usuario) VALUES('$nombre', '$correo', '$usuario')";
        $ejec = mysqli_query($con, $query);

        // Verificar si se pudo insertar el usuario
        if ($ejec) {
            echo '<script>alert("Usuario registrado con éxito"); window.location= "./../../DESARROLLO-WEB-2/index.php";</script>';
            exit();
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($con);
        }
    } else {
        echo "Datos de registro incompletos";
    }
}
