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


try {
        $db = new PDO("mysql:host=localhost;dbname=healthone","root","");
        $query = $db->prepare("SELECT * FROM medicijn WHERE id = " . $_GET['id']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as &$data) {
        $query = $db->prepare("UPDATE `medicijn` SET `naam`='$naam',`fabrikant`='$fabrikant',`vergoeding`='$vergoeding',`bijwerkingen`='$bijwerking',`effect`='$effect',`prijs`='$prijs' WHERE id=".$data['id']);
        $query->execute();
        echo "<br>";
        echo($query->queryString);
        echo "<br>";
        echo "succes";
        header("Location: ../../../overzicht.php");
    }
}
catch(PDOException $e){
    die("wank".$e->getMessage());

}

}
?>

