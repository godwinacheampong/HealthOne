<?php
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("DELETE FROM patient WHERE patient_id = :id");
    $query->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    $query2 = $db->prepare("DELETE FROM recept WHERE patient_id = :id");
    $query2->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
    $query2->execute();
//    echo($query->queryString);
    echo("Patient verwijderd.");
    header('Location: patienten.php');