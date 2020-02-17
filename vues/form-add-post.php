<?php
    $comment = htmlspecialchars($_POST["comment"] ?? "");
?>
<div class="content container-fluid">
    <form action="index.php?Posts" method="POST" id="formReply">
        <div class="modal-header">
            <h5 class="modal-title h5">Création d’une nouvelle réponse</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="fieldText">Texte</label>
                <?php $errors_class = isset($errors['post-text']) ? 'is-invalid' : ''?>
                <?php $errors_feedback = $errors['post-text'] ?? ''?>
                <textarea class="form-control <?= $errors_class ?>" name="comment" id="fieldText" rows="3" placeholder="Votre texte..."><?= $comment ?></textarea>
                <div class="invalid-feedback"><?=$errors_feedback?></div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="action" value="addPost">Publier</button>
        </div>
    </form>
</div>