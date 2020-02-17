<div class="d-flex flex-column align-items-center bg-light" style="height: 100%; padding: 10rem 0">
    <!-- Connexion
    ============================== -->
    <div class="signin container mx-auto text-center p-4" style="max-width: 400px">
        <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
        <p>Nouvel utilisateur ?<a href="index.php"> S'inscrire</a></p>

        <form action="index.php?Members" method="POST">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons md-30">account_circle</i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="username" placeholder="Nom d'utilisateur">
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="material-icons md-30">lock</i></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de pass">
            </div>
            <button type="submit" class="btn btn-secondary btn-lg btn-block mb-4 bg-primary" name="action" value="signIn">Se connecter</button>
        </form>

        <!-- Revenir à la page d'accueil
        ====================================== -->
        <div class="page-index mb-3">
            <a href="index.php">Revenir à la page d'accueil</a>
        </div>

        <div class="errors">
            <?php if(isset($errors["signin"])) : ?>
                <div class="alert alert-danger">
                    <?=$errors["signin"]?>
                </div>
            <?php endif; ?>
        </div>

        <div class="warning">
            <?php if(isset($messages["banned"])) : ?>
                <div class="alert alert-warning">
                    <?=$messages["banned"]?>
                </div>
            <?php endif; ?>
        </div>
    </div><!-- /end signin -->
</div>