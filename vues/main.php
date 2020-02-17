<!-- Contenu principale
===================================-->
<div class="jumbotron jumbotron-fluid p-5 mb-0 bg-primary text-white">
    <div class="container-fluid">
        <h1 class="forum-title display-4 mt-0 pt-4">Sport Forum</h1>
        <p class="forum-lead">Le sport est un ensemble d'exercices physiques se pratiquant sous forme de jeux individuels ou collectifs pouvant donner lieu à des compétitions.</p>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="row">
        <!-- Contenu principale
        ===================================== -->
        <div class="col">
            <!-- Les tendance
            =====================================-->
            <section class="trend-category">
                <div class="row">
                    <?php foreach ($listCategories as $cat) : ?>
                        <div class="col-sm-6">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h2 class="card-title">Forum <?= htmlspecialchars($cat->getCatName()) ?></h2>
                                    <p class="card-text"><?= htmlspecialchars($cat->getCatText()) ?></p>
                                    <a href='' class="btn btn-outline-primary btn-more">Aller au forum</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section><!-- /end trend-category -->


            <!-- Liste des sujets/threads
            =====================================-->
            <section class="page-threads">
                <h2 class="thread-title my-4">Liste des sujets</h2>

                <ul class="thread-bar pagination">
                    <li class="page-item"><a class="page-link" href="#">Précedent</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                </ul>

                <div class="table-responsive shadow-sm bg-white">
                    <table class="table table-sm mb-0 table-hover border table-borderless">
                        <thead class="border-bottom bg-dark text-white">
                        <tr>
                            <th class="py-3" scope="col" class="head-avatar"></th>
                            <th class="py-3" scope="col" class="head-topic">Sujet</th>
                            <th class="py-3" scope="col" class="head-author">Auteur</th>
                            <th class="py-3" scope="col" class="head-post">Messages</th>
                            <th class="py-3" scope="col" class="head-view">Vues</th>
                            <th class="py-3" scope="col" class="head-last-post">Dernier message</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listTopics as $topic): ?>
                                <?= $this->renderTemplate('topic.php', ['topic' => $topic])?>
                            <?php endforeach;?> <!-- /end table row -->
                        </tbody>
                    </table>
                </div>
            </section><!-- /end threads -->
        </div><!-- /end block gauche -->


        <!-- Barre latérale
        ===================================== -->
        <div class="col-lg-auto">
            <aside class="page-stats ">
                <h3 class="page-stats-title pb-2 pt-0">Forum statistiques</h3>
                <div class="card border-0 mb-4 shadow-sm">
                    <!-- <div class="card-header">
                    </div> -->
                    <ul class="list-group">
                        <li class="list-group-item topics d-flex justify-content-between align-items-center">
                            Sujets
                            <span class="badge badge-primary badge-pill"><?= $nrTopics ?></span>
                        </li>
                        <li class="list-group-item posts d-flex justify-content-between align-items-center">
                            Messages
                            <span class="badge badge-primary badge-pill"><?= $nrPosts ?></span>
                        </li>
                        <li class="list-group-item members d-flex justify-content-between align-items-center">
                            Membres
                            <span class="badge badge-primary badge-pill"><?= $nrMembers ?></span>
                        </li>
                    </ul>
                    <!-- <div class="card-body">
                    </div> -->
                </div>
            </aside>
        </div><!-- /end aside -->

    </div><!-- /end row -->
</div><!-- /end main-content-body -->