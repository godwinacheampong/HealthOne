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

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-danger">Naam</th>
                <th class="text-danger">Email</th>
                <th class="text-danger">Telefoon</th>
                <th class="text-danger">Geboortedatum</th>
                <th class="text-danger">Adres</th>
                <th class="text-danger">Arts</th>
                <th class="text-danger">Verzekeringnummer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $id = $_GET['id'];
                $db = new PDO("mysql:host=localhost;dbname=healthone","root","");
                $query = $db->prepare("SELECT * FROM patient WHERE patient_id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as &$data) {
                    echo "<tr>";
                    echo "<td>" . $data['naam'] . "</td>";
                    echo "<td>" . $data['email'] . "</td>";
                    echo "<td>" . $data['telefoon'] . "</td>";
                    echo "<td>" . $data['geboortedatum'] . "</td>";
                    echo "<td>" . $data['adres'] . "</td>";
                    echo "<td></td>";
                    echo "<td>" . $data['verzekeringnummer'] . "</td>";
                    echo "</tr>";
                }
            }
            catch(PDOException $e){
                die("wank".$e->getMessage());

            }
            ?>
        </tbody>

    </table>
</div>
<div class="row text-center">
    <div class="col-lg-9"></div>
    <div class="col-lg-3">
        <?php
        echo "<td><a href='recept_uitschrijven.php?id=".$_GET['id']."'>"."<button type=\"button\" class=\"btn btn-success\">Recept</button>";
        echo "<td><a href='edit.php?id=".$_GET['id']."'>"."<button type=\"button\" class=\"btn btn-warning\">Edit</button></a>";
        echo "<td><a href='drop.php?id=".$_GET['id']."'>"."<button type=\"button\" class=\"btn btn-danger\">Delete</button></a>";
        ?>
    </div>

</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-danger">Notities<br><a href="aanmaken_notitie.php?id=<?php echo $_GET['id']; ?>"><button  type="button" class="btn btn-success">aanmaken</button></a></th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=healthone","root","");
        $query2 = $db->prepare("SELECT * FROM patient_notities WHERE patient_id = " . $_GET['id']);

        $query2->execute();

        $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2 as &$data) {
            echo "<tr>";
            echo "<td><textarea class='form-control' readonly>" . $data['notities'] . "</textarea></td>";
            echo "</tr>";

            echo "<td><a href='edit_notitie.php?id=".$data['id']."'>"."<button  type=\"submit\" name=\"submit\"  class=\"btn btn-warning\">Edit</button></a>";
            echo "<a href='drop_notitie.php?id=".$data['id']."'>"."<button  type=\"submit\" name=\"submit\" class=\"btn btn-danger\">Delete</button></a></td>";
        }
    }
    catch(PDOException $e){
        die("wank".$e->getMessage());

    }
    ?>
    </tbody>

</table>

<footer class="py-4 bg-light text-dark-50 text-center">
    <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
</footer>

</body>
</html>