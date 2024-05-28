<?php
require 'auth.php';

// Supongamos que tenemos un usuario con estas credenciales
$user = array(
    "id" => 1,
    "username" => "usuario",
    "password" => "password123"
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    if ($inputUsername === $user['username'] && $inputPassword === $user['password']) {
        $token = Auth::SignIn(['id' => $user['id'], 'username' => $user['username']]);
        echo json_encode(['token' => $token]);
    } else {
        echo json_encode(['message' => 'Credenciales inválidas']);
    }
} else {
    echo json_encode(['message' => 'Método no permitido']);
}

