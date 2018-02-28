<div class="scs">
    <div class="scs-profile" bgcolor="#263238">
        <img src="<?= realpath("public/qrcodes")."/{$member->id}.png" ?>" class="scs-profile__image"/>
        <div class="scs-profile__name"><?= "{$member->nom} {$member->second_nom}" ?></div>
        <div class="scs-profile__type"><?= $member->type ?></div>
    </div>
    <div class="scs-metas">
        <div class="scs-metas__desc">
            <?= $member->shortDesc ?>
            <div class="scs-metas__date"><?= date("d M-Y", strtotime($member->date_created)) ?></div>
        </div>
    </div>
</div>

<div style="margin-top: 200px; text-align: center" >
    <h3>CTRL + P pour lancer l'impression</h3>
    <h3>CTRL + S pour sauvegarder</h3>
    <p>
        les pdfs générés se trouvent dans le dossier <b>public/pdf</b> de l'application.
    </p>
    <hr>
    <small>
        developped by Bernard Ng &copy; http://ngpictures.pe.hu
    </small>
</div>
