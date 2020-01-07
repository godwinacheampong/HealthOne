<?php
session_start();
$functie = "arts";
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
   try {
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("SELECT * from medicijn");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
}
catch(PDOException $e) {
    die("wank".$e->getMessage());
}

if (isset($_POST['submit'])) {
    $patient_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    $dosis = filter_var($_POST['dosis'], FILTER_SANITIZE_STRING);
    $herhalingsrecept = filter_var($_POST['herhalingsrecept'], FILTER_SANITIZE_NUMBER_INT);
    $medicijn_id = filter_var($_POST['res'], FILTER_SANITIZE_STRING);
    $commentaar = filter_var($_POST['commentaar'], FILTER_SANITIZE_STRING);
    $datum = date('d-m-Y H:i');
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
    $query = $db->prepare("insert into recept (patient_id, dosis, herhalingsrecept, medicijn_id, commentaar, datum) values ('$patient_id', '$dosis', '$herhalingsrecept', '$medicijn_id', '$commentaar', '$datum');");
    $query->execute();
   echo($query->queryString);
   header("Location: patient_info.php?id=" . $_GET['id']);
    // header('refresh:0;');
}
?>
    <div class="container">
        <div class="jumbotron text-center">
            <div class="row">
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
            <a class="navbar-brand" href="index.php">
                <img class="navbrand" src="../img/healthtwo_logo_transparent.png" alt="Logo">
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
                <label for="Naam">Medicijn</label>
                <select class="form-control" name="res" id="medicijnSelect" type="text" placeholder="Leeg">
                    <?php
                    foreach ($result as &$data) {
                        echo "<option name='medicijn_id' value=".$data['id']. ">". $data['naam']."</option>";
                    } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dosis">Dosis</label>
                <input class="form-control" name="dosis" type="text" placeholder="Dosis">
            </div>
            <div class="form-group">
                <label for="herhalingsrecept">Is herhalingsrecept?</label>
                <select name="herhalingsrecept" id="herhalingsrecept" class="form-control">
                  <option value='1'>Ja</option>
                  <option value='0'>Nee</option>
                </select>
            </div>
            <div class="form-group">
                <label for="commentaar">Commentaar</label>
                <input class="form-control" name="commentaar" type="text" placeholder="Commentaar">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>

    </div>
    </form>
    <footer class="py-4 bg-light text-dark-50 text-center">
        <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
    </footer>
    </div>
</body>

</html>