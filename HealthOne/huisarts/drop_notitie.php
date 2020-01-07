<?php
$db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
$query2 = $db->prepare('SELECT * FROM patient_notities WHERE id = :id');
$query2->bindParam(":id", $_GET['id'], PDO::PARAM_INT); // Fixt SQL-injectie
$query2->execute();
$result = $query2->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as &$data) {

}
echo $data['patient_id'];

$query = $db->prepare("DELETE FROM patient_notities WHERE id = :id");
$query->bindParam(":id", $_GET['id'], PDO::PARAM_INT); // Fixt SQL-injectie
$query->execute();
//    echo($query->queryString);

header("Location: patient_info.php?id=" . $data['patient_id']);



