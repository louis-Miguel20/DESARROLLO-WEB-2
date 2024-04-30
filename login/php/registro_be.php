<?php
include 'conexion_be.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];

$query = " INSERT INTO  usuario(nombre,correo,usuario)
            VALUES('$nombre','$correo','$usuario')";

#verificar correos y usuario
$ver_correo = mysqli_query($con,"SELECT * FROM usuario WHERE correo ='$correo'");

if (mysqli_num_rows($ver_correo) > 0) {
    echo '
    <script>
      alert("Este correo ya esta registrado, intenta con otro");
      window.location= "../index.php";
    </script>';
    exit();
    # code...
}

$ver_usuario = mysqli_query($con,"SELECT * FROM usuario WHERE usuario ='$usuario'");

if (mysqli_num_rows($ver_usuario)> 0) {

    echo'
    <script>
    alert("Este usuario ya esta registrado, intenta con otro");
    window.location= "../index.php";
  </script>
    ';
    exit();
    # code...
}

$ejec= mysqli_query($con,$query);

if ($ejec) {
    echo'
    <script>
    alert("usuario registrado con exito");
    window.location= "../index.php";
    </script>
    ';
    # code...
}