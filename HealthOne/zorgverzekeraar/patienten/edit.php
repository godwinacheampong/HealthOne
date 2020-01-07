<?php
session_start();
$functie = "verzekeringsmedewerker";
if($_SESSION['functie'] != $functie) {
    header('Location: ../401.php');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HealthOne</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
    <?php
try {
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * from patient WHERE patient_id = :id");
    $query->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as &$data) {

    }
}
catch(PDOException $e){
    die("wank".$e->getMessage());

}

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['emailadres'], FILTER_SANITIZE_EMAIL);
    $adres = filter_var($_POST['adres'], FILTER_SANITIZE_STRING);
    $telefoonnummer = filter_var($_POST['telefoonnummer'], FILTER_SANITIZE_NUMBER_INT);
    $geboortedatum = filter_var($_POST['geboortedatum'], FILTER_SANITIZE_STRING);
    $verzekeringnummer = filter_var($_POST['verzekeringnummer'], FILTER_SANITIZE_STRING);


//    echo "Name: " . $name;
//    echo "Email: " . $email;
//    echo "Adres: " . $adres;
//    echo "Phone Number: " . $telefoonnummer;
//    echo "Verz. Nummer: " . $verzekeringnummer;
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare('UPDATE patient SET naam=:name,email=:email,adres=:adres,telefoon = :telefoon, geboortedatum=:geboortedatum,verzekeringnummer= :verznummer WHERE patient_id = :id');
    $query->bindParam(":name", $name, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":adres", $adres, PDO::PARAM_STR);
    $query->bindParam(":telefoon", $telefoonnummer, PDO::PARAM_STR);
    $query->bindParam(":geboortedatum", $geboortedatum, PDO::PARAM_STR);
    $query->bindParam(":verznummer", $verzekeringnummer, PDO::PARAM_INT);
    $query->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    echo($query->queryString);
    header('Location: patienten.php');
}
?>
    <div class="container">
        <div class="jumbotron text-center" >
            <div class=" row">
            <div class="col-sm-3">
                <img class="d-none d-sm-block img-fluid" src="../../img/healthtwo_text_transparent.png" alt="Logo">
                <img class="d-block d-sm-none img-fluid" src="../../img/placeholder.png" alt="Logo">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img class="navbrand" src="../../img/healthtwo_logo_transparent.png" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-danger" href="index.php">Home</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['functie']) && !$_SESSION['functie'] != null) {
                        // print_r($_SESSION);
                        echo '
                        <li class="nav-item">
                        <a class="nav-link" href="login.php">Inloggen</a>
                        </li>';
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['functie']) && $_SESSION['functie'] != null) {
                        echo '<li class="nav-item"><a class="nav-link" href="../../uitloggen.php">Uitloggen</a></li>';
                    }
                    // print_r($_SESSION);
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../contact.php">Contact</a>
                    </li>
                    <?php
                    if(isset($_SESSION['functie'])) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="#">Ingelogd als: ' . $_SESSION['functie'] .'</a></li>';                        
                }
                ?>
                </ul>
            </div>
        </nav>
    <form method="POST">
    <div class="form-group">
        <label for="Naam">Naam</label>
        <input type="text" class="form-control" name="naam" id="naam" value="<?php echo $data['naam']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email adres</label>
        <input type="text" class="form-control" name="emailadres" id="emailadres" value="<?php echo $data['email']?>">

    </div>
    <div class="form-group">
        <label for="Adres">Adres</label>
        <input type="text" class="form-control" name="adres" id="" value="<?php echo $data['adres']?>">

    </div>
    <div class="form-group">
        <label for="Telefoonnummer">Telefoonnummer</label>
        <input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer" value="<?php echo $data['telefoon']?>">

    </div>
    <div class="form-group">
        <label for="geboortedatum">Geboortedatum</label>
        <input type="date" class="form-control" name="geboortedatum" id="geboortedatum" value="<?php echo $data['geboortedatum'] ?>">
    </div>
    <div class="form-group">
        <label for="Verzekeringsnummmer">Verzekeringsnummmer</label>
        <input type="text" name="verzekeringnummer" id="verzekeringnummer" class="form-control" value="<?php echo $data['verzekeringnummer'] ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
    </form>


    </div>
    <footer class="py-4 bg-light text-dark-50 text-center">
        <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
    </footer>
</body>

</html>