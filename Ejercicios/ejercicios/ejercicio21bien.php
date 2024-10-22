<!DOCTYPE>
<html>
<body>

<form method = "POST" action="">
    <label for="radio">radio</label><br>
    <input type="number" name="radio" step="any" required><br>
    <label for="altura">altura</label><br>
    <input type="number" name="altura" step="any" required><br>
    <input type="submit" value="Calcular"><br>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $radio = $_POST['radio'];
    $altura = $_POST['altura'];
    class ejercicio21bien
    {
        public function VolumenCono($radio, $altura)
        {
            $pi = 3.1416;
            $volumen = (1/3) * $pi * pow($radio, 2) * $altura;
            return $volumen;
        }
    }
    $cono = new \EJERCICIOS\ejercicios\ejercicio21bien();
    $volumen = $cono->VolumenCono($radio, $altura);

    echo "<h2>El volum del con és: " . round($volumen, 2) . " cm³</h2>";
}
?>
</body>
</html>