<?php
class Vista {
    public function mostrarUsuarios($usuarios) {
        echo "<h1>Lista de Usuarios</h1>";
        echo "<ul>";
        foreach ($usuarios as $usuario) {
            echo "<li>{$usuario['nombre']}</li>";
        }
        echo "</ul>";
    }

    // Agrega más métodos para mostrar otras vistas según sea necesario
}
