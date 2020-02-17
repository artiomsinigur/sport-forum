<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="css/main.css">

    <title><?= $title ?></title>
</head>
<body>
    <!-- Navigation principale
    ===================================-->
    <header class="page-header header-navbar">
        <nav class="navbar navbar-expand-md bg-dark text-white">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">Sport Forum</a>

                <!-- Icon burger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="material-icons md-30 text-white">menu</i></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav order-md-1">

                        <a href="index.php?Topics&action=formAddTopic" type="button" class="btn btn-success">Créer un sujet</a>

                        <!-- Menu déroulant categories
                        ===================================-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gategories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <a href="" class="dropdown-item">Hockey</a>
                                <a href="" class="dropdown-item">Soccer</a>
                                <a href="" class="dropdown-item">Football</a>
                                <a href="" class="dropdown-item">Baseball</a>
                            </div>
                        </li><!-- end categories -->

                        <!-- Menu block logged
                        ===================================-->
                        <?php if (isset($_SESSION["pseudo"])) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= "Hi " . $_SESSION["pseudo"] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                    <?php if (isset($_SESSION["rang"]) && ($_SESSION["rang"] == ADMIN)) : ?>
                                        <a href="index.php?Members&action=dashboard" class="dropdown-item">Tableau de bord</a>
                                    <?php endif; ?>
                                    <a href="index.php?Members&action=logout" class="dropdown-item">Déconnexion</a>
                                </div>
                            </li><!-- end categories -->
                        <?php else: ?>
                            <!-- Menu déroulant authentification
                            =====================================-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="autenticationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Authentification
                                </a>
                                <div class="dropdown-menu" aria-labelledby="autenticationDropdown">
                                    <a href="index.php?Members&action=formSignIn" class="dropdown-item">Se connecter</a>
                                    <a href="index.php" class="dropdown-item">S'inscrire</a>
                                </div>
                            </li><!-- /end authentication -->
                        <?php endif; ?>
                    </ul>


                    <!-- Champ rechercher
                    ====================================-->
                    <div class="order-md-0">
                        <form action="" method="GET" id="formSearch">
                            <div class="form-inline">
                                <input type="text" class="form-control form-control-sm col-8 bg-light rounded-left border-0" aria-describedby="search" placeholder="Rechercher">
                                <button type="submit" class="btn btn-sm btn-primary col-4 rounded-right">Réchercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav><!-- /end navbar -->
    </header><!-- /end header-navbar -->

    <main class="main-content bg-light">
        <?=$main_content?>
    </main>

    <!-- Bas de page
    =================================== -->
    <footer class="page-footer py-4 bg-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-6">
                    <p class="mb-0" style="font-size: .875rem"><strong>SA Sport Forum</strong></p>
                </div>
                <div class="col-sm-8 col-md-6">
                    <p class="mb-0" style="font-size: .875rem">Développé par <strong>Sinigur Artiom</strong></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
