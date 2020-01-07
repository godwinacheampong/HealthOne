<?php
session_start();
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
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <div class="row">
                <div class="col-sm-3">
                    <img class="d-none d-sm-block img-fluid" src="img/healthtwo_text_transparent.png" alt="Logo">
                    <img class="d-block d-sm-none img-fluid" src="img/placeholder.png" alt="Logo">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img class="navbrand" src="img/healthtwo_logo_transparent.png" alt="Logo">
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
                        <a class="nav-link" href="contact.php">Contact</a>
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
            <?php 
            
            if($_SESSION) {
                switch($_SESSION['functie']) {
                    case 'arts': 
                    echo ('<div class="col-sm-6 mx-auto">
                    <a href="huisarts/index.php">
                    <img class="img-fluid" src="img/doctor.png">
                    <h3 class="text-danger">Doctor</h3>
                    <p>De docter kan uw gegevens inzien en aan passen en toevoegen.</p>
                    </a>
                    </div>');
                    break;
                    case 'apotheker':
                    echo ('<div class="col-sm-6 mx-auto">
                    <a href="apotheker/index.php">
                    <img class="img-fluid" src="img/apotheker.png">
                    <h3 class="text-danger">Apotheker</h3>
                    <p>Kan recepten inzien die de doctor heeft voorgeschreven.</p>
                    </a>
                    </div>');
                    break;
                    case 'verzekeringsmedewerker':
                    echo ('<div class="col-sm-6 mx-auto">
                    <a href="zorgverzekeraar/verzekeraar_index.php">
                    <img class="img-fluid" src="img/verzekeraar.png">
                    <h3 class="text-danger">Zorgverzekeraar</h3>
                    <p>Kan alles in zien voor het verzekeren voor de bedragen.</p>
                    </a>
                    </div>');
                    break;
                }
            } else {
                // echo ('<p style="text-align: center">Log in om het selectiescherm te bekijken.</p>');
                header("Location: login.php");
            }
            ?>
        </div>
        <div class="row">
            <div class="text-center col-sm-12">
                <H4 class="text-danger">HealthOne</H4>
                <p>Recepten op papier mee geven en wachten bij de apotheker is verleden tijd!</p>
                <p>Met HealthOne wordt dit allemaal gedigitaliseerd.</p>
            </div>
        </div>

    </div>
    <footer>
        <div class="container text-center">
            <small>Copyright <em class="text-danger"> &copy; </em>Zilveren Kruis</small>
        </div>
    </footer>
</body>

</html>