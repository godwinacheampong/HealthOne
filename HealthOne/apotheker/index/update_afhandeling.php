<?php
$db = new PDO("mysql:host=localhost;dbname=healthone","root","");

$query = $db->prepare("UPDATE `recept` SET `afgehandeld`='1' WHERE recept_id= :id"); // Kan wel SQL-inectie optreden.
$query->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
$query->execute();
header("Location: ../index.php");

