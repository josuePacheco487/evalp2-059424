<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$hash')";
    if ($conexion->query($sql) === TRUE) {
        echo "Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
<form method="POST">
  <h2>Registro</h2>
  Nombre: <input type="text" name="nombre" required><br><br>
  Contraseña: <input type="password" name="password" required><br><br>
  <button type="submit">Registrar</button>
</form>
<p><a href="login.php">Ir al login</a></p>
