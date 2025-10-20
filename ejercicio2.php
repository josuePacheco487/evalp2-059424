<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

$resultadoCilindro = "";
$resultadoRectangulo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CILINDRO
    if (isset($_POST["calcular_cilindro"])) {
        $radio = $_POST["radio"];
        $altura = $_POST["altura"];

        if ($radio == "" || $altura == "") {
            $resultadoCilindro = "❌ Debes llenar todos los campos del cilindro.";
        } elseif (!is_numeric($radio) || !is_numeric($altura)) {
            $resultadoCilindro = "❌ Los valores deben ser numéricos.";
        } elseif ($radio <= 0 || $altura <= 0) {
            $resultadoCilindro = "❌ Los valores deben ser positivos.";
        } else {
            $area = 2 * M_PI * $radio * ($radio + $altura);
            $volumen = M_PI * pow($radio, 2) * $altura;
            $resultadoCilindro = "✅ Área: " . round($area, 2) . " | Volumen: " . round($volumen, 2);
        }
    }

    // RECTÁNGULO
    if (isset($_POST["calcular_rectangulo"])) {
        $base = $_POST["base"];
        $alturaR = $_POST["alturaR"];

        if ($base == "" || $alturaR == "") {
            $resultadoRectangulo = "❌ Debes llenar todos los campos del rectángulo.";
        } elseif (!is_numeric($base) || !is_numeric($alturaR)) {
            $resultadoRectangulo = "❌ Los valores deben ser numéricos.";
        } elseif ($base <= 0 || $alturaR <= 0) {
            $resultadoRectangulo = "❌ Los valores deben ser positivos.";
        } else {
            $areaR = $base * $alturaR;
            $perimetro = 2 * ($base + $alturaR);
            $resultadoRectangulo = "✅ Área: " . round($areaR, 2) . " | Perímetro: " . round($perimetro, 2);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ejercicio 2 - Figuras</title>
<style>
body {
    
    font-family: Arial, sans-serif;
    background: #f3f4f6;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px;
}
h2 {
    color: #333;
    margin-bottom: 10px;
}
form {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    width: 300px;
    margin-bottom: 20px;
}
label {
    font-weight: bold;
}
input[type="number"] {
    width: 100%;
    padding: 8px;
    margin: 6px 0 12px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button {
    background: #007bff;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background: #0056b3;
}
.resultado {
    background: #e7f3ff;
    border-left: 5px solid #007bff;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
}
a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}
a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h2>

<h3>Calcular Área y Volumen de un Cilindro</h3>
<form method="POST">
    <label>Radio:</label>
    <input type="number" step="any" name="radio">
    <label>Altura:</label>
    <input type="number" step="any" name="altura">
    <button type="submit" name="calcular_cilindro">Calcular Cilindro</button>
    <?php if ($resultadoCilindro) echo "<div class='resultado'>$resultadoCilindro</div>"; ?>
</form>

<h3>Calcular Área y Perímetro de un Rectángulo</h3>
<form method="POST">
    <label>Base:</label>
    <input type="number" step="any" name="base">
    <label>Altura:</label>
    <input type="number" step="any" name="alturaR">
    <button type="submit" name="calcular_rectangulo">Calcular Rectángulo</button>
    <?php if ($resultadoRectangulo) echo "<div class='resultado'>$resultadoRectangulo</div>"; ?>
</form>

<a href="interna.php">Volver a interna</a>
</body>
</html>
