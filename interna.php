<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Página Interna</title>
<style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(135deg, #00aaff, #004466);
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}
.container {
  background: rgba(255,255,255,0.1);
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 0 15px rgba(0,0,0,0.3);
  width: 320px;
  text-align: center;
}
a {
  color: #ffcc00;
  text-decoration: none;
  display: block;
  margin: 10px 0;
}
a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="container">
  <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h2>
  <p>Estás dentro de la zona interna.</p>
  <a href="ejercicio2.php">Ir a Ejercicio 2</a>
  <a href="ejercicio3.php">Ir a Ejercicio 3</a>
  <a href="logout.php">Cerrar sesión</a>
</div>
</body>
</html>
