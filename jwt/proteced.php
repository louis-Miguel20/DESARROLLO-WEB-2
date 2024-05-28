<?php
require 'auth.php';

$headers = apache_request_headers();
$token = $headers['Authorization'] ?? '';

try {
    Auth::Check($token);
    $data = Auth::GetData($token);
    echo json_encode(['message' => 'Acceso autorizado', 'data' => $data]);
} catch (Exception $e) {
    echo json_encode(['message' => 'Acceso denegado', 'error' => $e->getMessage()]);
}
?>
