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
<body class="bg-light">
    <div class="dashboard">
        <!-- Navigation usager
        ================================= -->
        <nav class="navbar navbar-expand-md navbar-light bg-light  flex-md-column align-items-md-stretch bg-white">
            <a class="navbar-brand" href="index.php">SF</a>
            <span class="navbar-text">Sport Forum</span>

            <!-- Icon burger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  flex-md-column" id="navbarTogglerDemo02">
                <ul class="navbar-nav  flex-md-column align-items-md-stretch mt-2">

                    <!-- Menu déroulant usagers -->
                    <li class="nav-item users dropdown">
                        <i class="material-icons md-24 float-left mr-2 py-2">group</i><a href="" class="nav-link dropdown-toggle" role="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usagers</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownUser">
                            <a href="index.php?Members&action=adminMembers" class="dropdown-item">Tous</a>
                            <a href="index.php?Members&action=usersBanned" class="dropdown-item">Banni</a>
                        </div>
                    </li><!-- /end nav user -->

                    <!-- Menu déroulant sujets -->
                    <li class="nav-item threads dropdown">
                        <i class="material-icons md-24 float-left mr-2 py-2">work</i><a href="" class="nav-link dropdown-toggle" role="button" id="dropdownManage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownManage">
                            <a href="index.php?Members&action=adminTopics" class="dropdown-item">Tous</a>
                            <a href="" class="dropdown-item">En attente</a>
                        </div>
                    </li><!-- /end nav threads -->
                    <hr class="dropdown-divider">

                    <li class="nav-item logout"><i class="material-icons md-24 float-left mr-2 py-2">exit_to_app</i>
                        <a href="index.php?Members&action=logout" class="nav-link">Déconnexion</a>
                    </li>
                </ul>
            </div><!-- /end navbar-user -->
        </nav><!-- /end navbar-vertical -->

        <main class="main-content">
            <div class="container-fluid">
                <!-- Header de contenu -->
                <header class="header-main-content pt-4">
                    <h1 class="header-title h2">Tableau de bord</h1>
                </header>
                <hr>

                <!-- Section statistiques -->
                <section class="admin-stats">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title h6 mb-0 text-black-50">Nombre des sujets</h4>
                                        </div>
                                        <div class="col-auto">
                                            <span class="card-count-topic"><strong><?= $nrTopics ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title h6 mb-0 text-black-50">Nombre des usagers</h4>
                                        </div>
                                        <div class="col-auto">
                                            <span class="card-count-topic"><strong><?= $nrMembers ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title h6 mb-0 text-black-50">Dernier sujets</h4>
                                        </div>
                                        <div class="col-auto">
                                            <span class="card-count-topic"><strong>350</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="card-title h6 mb-0 text-black-50">Dernier messages</h4>
                                        </div>
                                        <div class="col-auto">
                                            <span class="card-count-topic"><strong>350</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section><!-- /end stats -->

                <?=$main_content?>
            </div>
        </main>


        <!-- Bas de page
        =================================== -->
        <footer class="page-footer dashboard-footer mt-5 py-4 bg-light">
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
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>