<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football liga | football-liga.hu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body style="background-color:#838996;">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid bg-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menü
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (isset($_SESSION['user'])) {

                                        echo '<li><a class="dropdown-item" href="user.php">' . $_SESSION["user"]["username"] . '</a></li>';
                                    } else {
                                    }

                                    if (isset($_SESSION['user'])) {
                                        echo '<form action="controllers/logout.php">
<li><a class="dropdown-item" href="controllers/logout.php">Kijelentkezés</a></li>
</form>';
                                    } else {
                                        echo '<form method="POST" action="controllers/login.php">
<li><a class="dropdown-item" href="login_form.php">Bejelentkezés</a></li>
 </form>
<form action="register_form.php">
<li><a class="dropdown-item" href="register_form.php">Regisztráció</a></li>
</form>';
                                    }

                                    ?>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item disabled" href="#">Webshop</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="csapatok.php">Csapatok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eredmenyek.php">Meccseredmények</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="szimulalt_eredmenyek_valaszto.php">Szimulált eredmények</a>
                    </li>
                </ul>
                <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="images/labda.png" width="30" height="30" class="d-inline-block align-top" alt="">
                </a>
            </nav>

            </div>
        </div>
        </div>
    </nav>
    
</body>
<!-- Kész -->