<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($password, $fila["password"])) {
            $_SESSION["usuario"] = $nombre;
            header("Location: interna.php");
            exit;
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>
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
input {
  width: 90%;
  padding: 10px;
  margin: 8px 0;
  border: none;
  border-radius: 8px;
}
button {
  background-color: #0099cc;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 8px;
  cursor: pointer;
}
button:hover {
  background-color: #0077aa;
}
a { color: #ffcc00; text-decoration: none; }
a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="container">
  <h2>Iniciar Sesión</h2>
  <form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Entrar</button>
  </form>
  <p><a href="registro.php">Registrar nuevo usuario</a></p>
</div>
</body>
</html>
