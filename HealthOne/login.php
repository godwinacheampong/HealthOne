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

                    <li class="nav-item">
                        <a class="nav-link" href="#">Inloggen</a>
                    </li>
                    <?php
                    if(isset($_SESSION['functie']) && $_SESSION['functie'] != null) {
                        echo '<li class="nav-item"><a class="nav-link" href="uitloggen.php">Uitloggen</a></li>';
                    }
                    // print_r($_SESSION);
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center align-items-center" style="height:80%">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['functie'])) {
                            echo "<h1 class='text-center'>U bent al ingelogd.</h1>";
                        } else {
                        echo '
                        <form method="POST">
                            <div class="form-group">
                                <label for="username">Gebruikersnaam</label>
                                <input id="gebruikersnaam" type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Wachtwoord</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit">Login</button>
                        </form>
                    </div>
                    '; }
                    ?>
                </div>
                    <?php 
                        if (isset($_POST['submit'])) {
                            try {
                            $username = $_POST['username'];
                            $password = sha1(filter_var($_POST['password'], FILTER_SANITIZE_STRING));


                            $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                            // echo $username;
                            $query = $db->prepare('SELECT functie from user WHERE username = :username AND password = :password');
                            $query->bindParam(':username', $username);
                            $query->bindParam(':password', $password);
                            $query->execute();
                            // echo $query->queryString;
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as &$data) {
                                session_start();
                                $_SESSION['functie'] = $data['functie'];
                                switch($data['functie']) {
                                    case 'arts':
                                    header("Location: huisarts/index.php");
                                    break;
                                    case 'verzekeringsmedewerker':
                                    header("Location: zorgverzekeraar/verzekeraar_index.php");
                                    break;
                                    case 'apotheker':
                                    header("Location: apotheker/index.php");
                                    break;
                                    // Als we hier komen is er iets fout gegaan (dit is onmogelijk)
                                    default:
                                    header("Location: index.php");
                                    break;
                                }
                            }
                        }
                        catch(PDOException $e) {
                            die($e->getMessage());
                        }
                        }
                        ?>
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