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
<div class="container">
    <div class="jumbotron text-center">
    <div class="row">
        <div class="col-sm-3">
            <img class="d-none d-sm-block img-fluid" src="../../img/healthtwo_text_transparent.png" alt="Logo">
            <img class="d-block d-sm-none img-fluid" src="../../img/placeholder.png" alt="Logo">
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $name = filter_var($_POST['naam'], FILTER_SANITIZE_STRING);
    $adres = filter_var($_POST['adres'], FILTER_SANITIZE_STRING);
    $telefoonnummer = filter_var($_POST['telefoonnummer'], FILTER_SANITIZE_NUMBER_INT);
    $specialisatie = filter_var($_POST['specialisatie'], FILTER_SANITIZE_STRING);
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("insert into arts (naam, adres, telefoon, specialisatie) values (:naam, :adres,:telefoon, :specialisatie);");
    $query->bindParam(':naam', $name, PDO::PARAM_STR);
    $query->bindParam(':adres', $adres, PDO::PARAM_STR);
    $query->bindParam(':telefoon', $telefoonnummer, PDO::PARAM_STR);
    $query->bindParam(':specialisatie', $specialisatie, PDO::PARAM_STR);
    $query->execute();
//    echo($query->queryString);
    header('Location: artsen_beheer.php');
}
?>
       <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="verzekeraar_index.php">
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
                        echo '<li class="nav-item"><a class="nav-link" href="uitloggen.php">Uitloggen</a></li>';
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
        <input class="form-control" name="naam" type="text" placeholder="Naam" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email adres</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
    </div>
    <div class="form-group">
        <label for="telefoonnummer">Telefoonnummer</label>
        <input class="form-control" id="telefoonnummer" type="number" name="telefoonnummer" placeholder="Tel. Nummer" required>
    </div>
    <div class="form-group">
        <label for="Adres">Adres</label>
        <input class="form-control" id="Adres" type="text" name="adres" placeholder="Adres" required>
    </div>
    <div class="form-group">
        <label for="Specialisatie">Specialisatie</label>
        <input class="form-control" id="specialisatie" type="text" name="specialisatie" placeholder="Specialisatie" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
</form>

<footer class="py-4 bg-light text-dark-50 text-center">
    <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
</footer>
</div>

</body>
</html>