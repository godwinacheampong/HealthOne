<?php
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("DELETE FROM patient WHERE patient_id = :id");
    $query->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
    $query->execute();
//    echo($query->queryString);
    echo("Patient verwijderd.");
    header('Location: patienten.php');