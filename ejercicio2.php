<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<h2>Ejercicio 2</h2>
<p>Contenido de la página Ejercicio 2.</p>
<a href="interna.php">Volver a interna</a>
