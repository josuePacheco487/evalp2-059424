<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h2>
<p>Esta es la página interna.</p>

<a href="ejercicio2.php">Ir a Ejercicio 2</a><br>
<a href="ejercicio3.php">Ir a Ejercicio 3</a><br><br>

<a href="logout.php">Cerrar sesión</a>
