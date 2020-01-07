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
    <link rel="stylesheet" href="../../../css/index.css">
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
    <div class=" row">
            <div class="col-sm-3">
                <img class="d-none d-sm-block img-fluid" src="../../../img/healthtwo_text_transparent.png" alt="Logo">
                <img class="d-block d-sm-none img-fluid" src="../../../img/placeholder.png" alt="Logo">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../../../index.php">
            <img class="navbrand" src="../../../img/healthtwo_logo_transparent.png" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="collapse_target">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../../index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Inloggen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <form action="aanmaken/success.php" method="POST">
        <div class="form-group">
            <label for="Naam">Naam</label>
            <input class="form-control" id="Naam" name="Naam" placeholder="Naam" required type="text">
        </div>
        <div class="form-group">
            <label for="Fabrikant">Fabrikant</label>
            <input class="form-control" id="Fabrikant" name="Fabrikant" placeholder="Fabrikant" required type="text">
        </div>
        <div class="form-group">
            <label for="Vergoeding">Vergoeding</label>
            <select class="form-control" id="Vergoeding" name="Vergoeding">
                <option>Vergoed</option>
                <option>Onvergoed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Bijwerking">Bijwerking</label>
            <input class="form-control" id="Bijwerking" name="Bijwerking" placeholder="Bijwerking" required type="text">
        </div>
        <div class="form-group">
            <label for="Effect">Effect</label>
            <input class="form-control" id="Effect" name="Effect" placeholder="Effect" required type="text">
        </div>
        <div class="form-group">
            <label for="Prijs">Prijs</label>
            <input class="form-control" id="Prijs" name="Prijs" placeholder="Prijs" required type="number" step="0.01"
                value="1" min="0.00" max="10000.00">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
    </form>
    <footer class="py-4 bg-light text-dark-50 text-center">
        <small>Copyright <em class="text-danger"> &copy; </em>Zilverenkruis</small>
    </footer>

    </div>
</body>

</html>