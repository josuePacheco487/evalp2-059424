<?php
$conexion = new mysqli("localhost", "root", "", "jpEvp2");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
