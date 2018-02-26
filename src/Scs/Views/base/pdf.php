<div class="scs">
    <div class="scs-profile" bgcolor="#263238">
        <img src="<?= $member->qrcodeUrl ?>" class="scs-profile__image"/>
        <div class="scs-profile__name"><?= "{$member->nom} {$member->second_nom}" ?></div>
        <div class="scs-profile__type"><?= $member->type ?></div>
    </div>
    <div class="scs-metas">
        <div class="scs-metas__desc">
            <?= $member->description ?>
            <div class="scs-metas__date"><?= date("d - m - y",strtotime($member->date_created)) ?></div>
        </div>
    </div>
</div>
