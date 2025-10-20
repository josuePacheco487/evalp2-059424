<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<h2>Ejercicio 3</h2>
<p>Contenido de la página Ejercicio 3.</p>
<a href="interna.php">Volver a interna</a>
