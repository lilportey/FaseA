<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat del càlcul</title>
</head>
<body>
    <h2>Resultat del càlcul del VPS</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cpus = intval($_POST["cpus"]);
        $ram = intval($_POST["ram"]);
        $disc = intval($_POST["disc"]);
        $so = ($_POST["so"] == "1") ? "Debian 10" : "Windows 2019";
        $ip = ($_POST["ip"] == "2") ? "Sí" : "No";

        // Càlcul del preu mensual
        $preu_mensual = ($cpus * 1) + ($ram * 0.1) + (($disc / 10) * 0.1) + floatval($_POST["so"]) + floatval($_POST["ip"]);
        $iva = $preu_mensual * 0.21;
        $preu_total_mes = $preu_mensual + $iva;

        // Càlcul anual amb descompte del 20%
        $preu_anual = $preu_mensual * 12 * 0.8;
        $iva_anual = $preu_anual * 0.21;
        $preu_total_any = $preu_anual + $iva_anual;

        // Mostrar resultats
        echo "<p>Preu mensual sense IVA: <b>" . number_format($preu_mensual, 2) . " €</b></p>";
        echo "<p>IVA (21%): <b>" . number_format($iva, 2) . " €</b></p>";
        echo "<p>Preu mensual amb IVA: <b>" . number_format($preu_total_mes, 2) . " €</b></p>";
        echo "<hr>";
        echo "<p>Preu anual amb 20% descompte: <b>" . number_format($preu_anual, 2) . " €</b></p>";
        echo "<p>IVA anual (21%): <b>" . number_format($iva_anual, 2) . " €</b></p>";
        echo "<p>Preu anual total amb IVA: <b>" . number_format($preu_total_any, 2) . " €</b></p>";
    } else {
        echo "<p>Error: No s'han rebut dades del formulari.</p>";
    }
    ?>

    <br><a href="index.html">Torna al formulari</a>
</body>
</html>
