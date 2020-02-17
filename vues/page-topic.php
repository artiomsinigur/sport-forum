<section class="show-thread">
    <div class="container-fluid">
        <h1 class="title mt-0 pt-4"><?= htmlspecialchars($topic->getTopicTitle()) ?></h1>

        <!-- Le sujet
        ================================ -->
        <div class="thread">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <td class="card-avatar">
                                <img class="card-avatar-img rounded-circle" src="https://placeimg.com/60/60/people" alt="">
                            </td>
                        </div>
                        <div class="col ml-n2">
                            <h2 class="card-title h5 mb-1 mt-2"><?= htmlspecialchars($topic->getMemberPseudo()) ?></h2>
                            <p class="card-time small text-muted mb-0">
                                <i class="material-icons md-18 mr-1 align-bottom">access_time</i>
                                <time datatime="2019-09-14"><?= htmlspecialchars($topic->getTopicPublished()) ?></time>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($topic->getTopicText()) ?></p>
                </div>
            </div>
        </div><!-- /end thread -->

        <!-- Les discussions
        =================================-->
        <?php foreach($posts as $post) : ?>
            <div class="comment shadow-sm border rounded-lg bg-white mb-4">
                <div class="row no-gutters">
                    <div class="col-auto">
                        <div class="comment-profile border-right">
                            <div class="card-img-top">
                                <img src="https://placeimg.com/150/100/people" alt="" class="comment-avatar">
                            </div>
                            <ul class="list-group list-group-flush mb-0 pl-0">
                                <li class="list-group-item text-center p-2">
                                    <h3 class="comment-name h5 text-primary mb-1"><?= htmlspecialchars($post->getMemberPseudo()) ?></h3>
                                    <p class="comment-last-visit small text-muted mb-0">Connecté il y a<br><span><?= htmlspecialchars($post->member_last_visited) ?></span></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between p-2">
                                    <p class="comment-joined text-muted mb-0">Adhéré</p>
                                    <span><?= htmlspecialchars($post->member_registered) ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between p-2">
                                    <p class="comment-messages text-muted mb-0">Messages</p>
                                    <span>1,304</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="comment-body p-3">
                            <div class="row no-gutters">
                                <div class="col">
                                    <p class="comment-published text-muted small mb-0">Daté publié <time><?= htmlspecialchars($post->getPostPublished()) ?></time></p>
                                </div>
                                <div class="col-auto">
                                    <a href="" class="comment-id-post"><?= htmlspecialchars($post->getPostId()) ?></a>
                                </div>
                            </div>
                            <p class="comment-text"><?= htmlspecialchars($post->getPostText()) ?></p>
                        </div>
                    </div>
                </div><!--/end row-->
            </div><!-- /end comment -->
        <?php endforeach; ?>

        <div class="thread-footer">
            <div class="row">
                <div class="col">
                    <ul class="comment-bar pagination">
                        <li class="page-item"><a class="page-link" href="#">Précedent</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                    </ul>
                </div>
                <div class="col-auto">
<!--                    <button class="btn btn-primary" type="button" name="action" value="formAddPost" data-toggle="modal" data-target="#modalReply">Répondre</button>-->
                    <?php if (isset($_SESSION["pseudo"])) : ?>
                        <a href="index.php?Posts&action=formAddPost" class="btn btn-primary reply" type="button" name="action" value="formAddPost">Répondre</a>
                    <?php else : ?>
                        <a href="index.php?Posts&action=formAddPost" class="btn btn-primary log-to-reply" type="button" name="action" value="formAddPost">Connectez-vous pour répondre</a>
                    <?php endif ; ?>
                </div>
            </div>
        </div>

    </div><!-- /end container -->
</section>
