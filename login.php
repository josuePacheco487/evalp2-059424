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
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
<form method="POST">
  <h2>Login</h2>
  Nombre: <input type="text" name="nombre" required><br><br>
  Contraseña: <input type="password" name="password" required><br><br>
  <button type="submit">Entrar</button>
</form>
<p><a href="registro.php">Registrar nuevo usuario</a></p>
