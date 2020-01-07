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
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php
if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = sha1(filter_var($_POST['password'], FILTER_SANITIZE_STRING)); 
    $functie = filter_var($_POST['functie'], FILTER_VALIDATE_INT);

    switch($functie) {
        case 0:
            $functie = 'arts';
            break;
        case 1:
            $functie = 'apotheker';
            break;
        case 2:
            $functie = 'verzekeringsmedewerker';
            break;
        default:
            exit(-1);
    }
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");

    $query = $db->prepare('INSERT INTO user (username, password, functie) VALUES (:username, :password, :functie)');
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->bindParam(":password", $password, PDO::PARAM_STR);
    $query->bindParam(":functie", $functie, PDO::PARAM_STR);
    $query->execute();
    // echo($query->queryString);
    header('Location: ../index.php');
}
?>
    <div class="container">
        <div class="jumbotron text-center">
            <div class=" row">
                <div class="col-sm-3">
                    <img class="d-none d-sm-block img-fluid" src="../img/healthtwo_text_transparent.png" alt="Logo">
                    <img class="d-block d-sm-none img-fluid" src="../img/placeholder.png" alt="Logo">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="verzekeraar_index.php">
                <img class="navbrand" src="../img/healthtwo_logo_transparent.png" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-danger" href="../index.php">Home</a>
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
                        echo '<li class="nav-item"><a class="nav-link" href="../uitloggen.php">Uitloggen</a></li>';
                    }
                    // print_r($_SESSION);
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
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
                <label for="Naam">Gebruikersnaam</label>
                <input type="text" class="form-control" name="username" id="naam" value="" minlength=8 autocomplete="off">
                <small>Minimaal 8 karakters.</small>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" class="form-control" name="password" id="wachtwoord" value="" minlength=8 autocomplete="off">
                <small>Minimaal 8 karakters.</small>
            </div>
            <div class="form-group">
                <label for="Functie">Functie</label>
                <select name="functie" id="functie" class="form-control">
                    <option value="0">Arts</option>
                    <option value="1">Apotheker</option>
                    <option value="2">Verzekeringsmedewerker</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
        </form>
    </div>
    <footer class="py-4 bg-light text-dark-50 text-center">
        <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
    </footer>
</body>

</html>