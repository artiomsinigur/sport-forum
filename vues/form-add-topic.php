<?php
    $title = htmlspecialchars($_POST["title"] ?? "");
    $text = htmlspecialchars($_POST["text"] ?? "");
    $idCat = htmlspecialchars($_POST["idCat"] ?? "");
?>
<div class="content container-fluid">
    <form action="index.php?Topics" method="POST" id="formThread">
        <div class="modal-header">
            <h5 class="modal-title h5">Création d’un nouveau sujet</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="fieldTitle">Titre*</label>
                <?php $errors_class = isset($errors['topic-title']) ? 'is-invalid' : ''?>
                <?php $errors_feedback = $errors['topic-title'] ?? ''?>
                <input type="text" class="form-control <?= $errors_class ?>" id="fieldTitle" name="title" value="<?= $title ?>" aria-describedby="title" placeholder="Entrez un titre">
                <div class="invalid-feedback"><?=$errors_feedback?></div>
            </div>
            <div class="form-group">
                <label for="fieldText">Texte*</label>
                <?php $errors_class = isset($errors['topic-text']) ? 'is-invalid' : ''?>
                <?php $errors_feedback = $errors['topic-text'] ?? ''?>
                <textarea class="form-control <?= $errors_class ?>" name="text" id="fieldText" rows="3" placeholder="Votre texte..."><?= $text ?></textarea>
                <div class="invalid-feedback"><?=$errors_feedback?></div>
            </div>
            <select class="custom-select" name="idCat">
                <?php foreach ($categories as $cat) : ?>
                    <?php $catSelected = ($cat->getCatId() == $idCat) ? "selected" : "";?>
                    <option value="<?= $cat->getCatId()?>" <?= $catSelected ?>><?= $cat->getCatName()?></option>
                <?php endforeach ; ?>
            </select>
            <small class="text-muted d-block mt-4">Tous les champs avec un astérisque(*) sont obligatoires!</small>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="action" value="addTopic">Publier</button>
        </div>
    </form>
</div><!-- /end fenêtre modale -->