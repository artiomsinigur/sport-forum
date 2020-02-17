<!-- Section sujets
===================================== -->
<section class="admin-threads">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h2 class="card-title h4 mb-0">Liste des sujets</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm mb-0 table-hover table-borderless">
                    <thead class="bg-light border-bottom">
                    <tr>
                        <th class="py-2" scope="col">Titre</th>
                        <th class="py-2" scope="col">Auteur</th>
                        <th class="py-2" scope="col"></th>
                        <!--        <th class="py-2" scope="col">Modifier</th>-->
                        <th class="py-2" scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listTopics as $topic): ?>
                        <tr class="border-bottom">
                            <td class="thread-title">
                                <a href="index.php?Topics&action=topic&id=<?= htmlspecialchars($topic->getTopicId())?>"><?= htmlspecialchars($topic->getTopicTitle()) ?></a>
                            </td>
                            <td class="thread-author">
                                <a href="" class="thread-author-profile d-block"><?= htmlspecialchars($topic->getMemberPseudo()) ?></a>
                                <span class="thread-author-published"><small><?= htmlspecialchars($topic->getTopicPublished()) ?></small></span>
                            </td>
                            <td></td>
                            <!--            <td class="thread-edit">-->
                            <!--                <a href="" class="btn btn-sm btn-warning">Modifier</a>-->
                            <!--            </td>-->
                            <td class="thread-delete">
                                <a href="index.php?Topics&action=deleteTopic&id=<?= htmlspecialchars($topic->getTopicId())?>" class="btn btn-sm btn-danger">Supprimer</a>
                            </td>
                        </tr><!-- /end table row -->
                    <?php endforeach;?> <!-- /end table row -->
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /end card -->
</section><!-- /end threads -->


