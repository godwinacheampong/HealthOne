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
                <th class="text-danger">Recept #</th>
                <th class="text-danger">Patient naam</th>
                <th class="text-danger">Medicijn</th>
                <th class="text-danger">Dosis</th>
                <th class="text-danger">Datum van uitgave</th>
                <!-- <th class="text-danger">Arts</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                    $db = new PDO("mysql:host=localhost;dbname=healthone","root","");
                    $recept_id = $_GET['id'];
                    $dosis = 0;
                    $query = $db->prepare("SELECT * FROM recept WHERE recept_id = $recept_id");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as &$data){
                        $dosis = $data['dosis'];
                        $id = $data['patient_id'];
                        $medicijn_id = $data['medicijn_id'];
                        $query2 = $db->prepare("SELECT * FROM patient WHERE patient_id = $id");
                        $query2->execute();
                        $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                        echo "<tr>";
                        echo "<td>".$data['recept_id']."</td>";
                        foreach ($result2 as &$data2) {
                            echo "<td>".$data2['naam'] ."</td>";
                            $query3 = $db->prepare("SELECT * FROM medicijn WHERE id = $medicijn_id");
                            $query3->execute();
                            $result3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result3 as &$data3) {
                                echo "<td>".$data3['naam'] ."</td>";
                            }
                        }
                        echo "<td>".$dosis."</td>";
                        echo "<td>".$data['datum']."</td>";
                        // echo "<td><a href='recept_info.php?id=".$data['recept_id']."'>"."<button type=\"button\" class=\"btn btn-info\">Info</button></a></td>";
                        echo "</tr>";
                    }
                }
                catch(PDOException $e){
                    die("OEPS iets is fout!".$e->getMessage());
                }
            ?>
        </tbody>

    </table>
</div>
<div class="row text-center">
    <div class="col-lg-9"></div>
    <div class="col-lg-3">
        <?php
        // echo "<td><a href='edit.php?id=".$_GET['id']."'>"."<button type=\"button\" class=\"btn btn-warning\">Edit</button></a>";
        // echo "<td><a href='drop.php?id=".$_GET['id']."'>"."<button type=\"button\" class=\"btn btn-danger\">Delete</button></a>";
        ?>
    </div>

</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-danger">Commentaar<br></th>
    </tr>
    </thead>
    <tbody>
    <td><textarea class="form-control" readonly><?php echo $data['commentaar']; ?></textarea></td>
    </tbody>

</table>

<footer class="py-4 bg-light text-dark-50 text-center">
    <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
</footer>

</body>
</html>