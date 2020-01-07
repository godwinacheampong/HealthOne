<?php
try {
    $id = $_GET['id'];
    $db = new PDO("mysql:host=localhost;dbname=healthone","root","");
    $query = $db->prepare('SELECT * FROM medicijn WHERE id = :id');
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as &$data) {
        $query = $db->prepare('DELETE FROM `medicijn` WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        echo "succes";
    }
}
catch(PDOException $e){
    die("wank".$e->getMessage());

}
header("Location: ../../overzicht.php");
?>