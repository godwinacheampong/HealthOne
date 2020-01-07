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
                        <a class="nav-link text-danger" href="../../index.php">Home</a>
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
        <div class="row text-center">
            <div class="col-lg-2">
                <input  class="form-control form-control-underlined border-danger" id="myInput" type="text" placeholder="Vul gegevens in">
            </div>
            <a href="arts_aanmaken.php">
            <button class="btn btn-success" type="button">Toevoegen</button>
            </a>
            <div class="col-lg-10">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" class="text-danger">#</th>
                    <th scope="col" class="text-danger">Naam</th>
                    <th scope="col" class="text-danger">Specialisatie</th>
                    
                    <!-- <th scope="col" class="text-danger">Geboortedatum</th> -->
                    <th scope="col" class="text-danger">Edit</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php

                try {
                    $db = new PDO("mysql:host=localhost;dbname=healthone","root","");
                    $query = $db->prepare("SELECT * FROM arts");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as &$data){
                        echo "<tr>";
                        echo "<td>".$data['id']."</td>";
                        echo "<td>".$data["naam"] ."</td>";
                        echo "<td>".$data["specialisatie"] . "</td>";
                        // echo "<td>" . $data['geboortedatum'] . "</td>";
                        echo "<td><a href='arts_info.php?id=".$data['id']."'>"."<button type=\"button\" class=\"btn btn-info\">Info</button></a></td>";
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


        </div>
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <footer class="py-4 bg-light text-dark-50 text-center fixed-bottom">
            <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
        </footer>
    </body>
</html>