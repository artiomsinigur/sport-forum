<!-- Section membres
===================================== -->
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h2 class="card-title h4 mb-0">Liste des membres banni</h2>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm mb-0 table-hover table-borderless">
                <thead class="bg-light border-bottom">
                <tr>
                    <th class="py-2" scope="col">Pseudo</th>
                    <th class="py-2" scope="col">Email</th>
                    <th class="py-2" scope="col">Inscrit</th>
                    <th class="py-2" scope="col"></th>
                    <th class="py-2" scope="col">Bannir</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($usersBanned as $member): ?>
                    <tr class="border-bottom">
                        <td class="member-pseudo">
                            <a href=""><?= htmlspecialchars($member->getMemberPseudo()) ?></a>
                        </td>
                        <td class="member-email">
                            <span><?= htmlspecialchars($member->getMemberEmail()) ?></span>
                        </td>
                        <td class="member-registered">
                            <span><?= htmlspecialchars($member->getMemberRegistered()) ?></span>
                        </td>
                        <td></td>
                        <td class="member-banned">
                            <?php if ($member->getMemberBanned() == 0) : ?>
                                <a href="index.php?Members&action=banUser&pseudo=<?= $member->getMemberPseudo() ?>" class="btn btn-sm btn-danger">Bannir</a>
                            <?php else : ?>
                                <a href="index.php?Members&action=banUser&pseudo=<?= $member->getMemberPseudo() ?>" class="btn btn-sm btn-success">Activer</a>
                            <?php endif; ?>
                        </td>
                    </tr><!-- /end table row -->
                <?php endforeach;?> <!-- /end table row -->
                </tbody>
            </table>
        </div>
    </div>
</div><!-- /end card -->
</section><!-- /end threads -->

