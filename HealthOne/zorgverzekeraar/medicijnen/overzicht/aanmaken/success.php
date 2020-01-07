<?php
if (isset($_POST['submit'])) {
    $naam = filter_var($_POST['Naam'], FILTER_SANITIZE_STRING);
    $fabrikant = filter_var($_POST['Fabrikant'], FILTER_SANITIZE_STRING);
    $vergoeding = filter_var($_POST['Vergoeding'], FILTER_SANITIZE_STRING);
    $bijwerking = filter_var($_POST['Bijwerking'], FILTER_SANITIZE_STRING);
    $effect = filter_var($_POST['Effect'], FILTER_SANITIZE_STRING);
    $prijs = filter_var($_POST['Prijs'], FILTER_SANITIZE_STRING);

    if ($vergoeding == "Vergoed"){
        $vergoeding = "1";
    }
    else{
        $vergoeding = "0";
    }

    echo $vergoeding;

    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare('INSERT INTO medicijn (naam, fabrikant, vergoeding, bijwerking, effect, prijs) values (:naam, :fabrikant, :vergoeding, :bijwerking, :effect, :prijs);');
    $query->bindParam(':naam', $naam, PDO::PARAM_STR);
    $query->bindParam(':fabrikant', $fabrikant, PDO::PARAM_STR);
    $query->bindParam(':vergoeding', $vergoeding, PDO::PARAM_INT);
    $query->bindParam(':bijwerking', $bijwerking, PDO::PARAM_STR);
    $query->bindParam(':effect', $effect, PDO::PARAM_STR);
    $query->bindParam(':prijs', $naam, PDO::PARAM_INT);
    $query->execute();
    echo($query->queryString);
    header("Location: ../../overzicht.php");
}
?>