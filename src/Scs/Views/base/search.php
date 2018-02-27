<div class="container row" style="margin-top: 64px;">
<h3 class="section-title">Résultat pour : <?= $query ?> <span class="badge new"><?= count($results ?? []); ?></span></h3>
<hr style="background-color: #ccc">


<?php if (isset($results) && !empty($results)) : ?>
    <?php foreach ($results as $result) : ?>
        <div class="col s12 m3">
            <div class="card primary-b" style="text-align: center; color: #ccc;">
                <div class="card-content">
                    <span class="card-title" style="text-transform: capitalize;">
                        <?= "{$result->nom} {$result->second_nom}" ?>
                    </span>
                    <div style="margin-top: -13px;"><?= "({$result->type})" ?></div>
                    <?= $result->shortDesc; ?>
                </div>
                <div class="card-action">
                <center>
                    <a href="<?= $result->editUrl ?>"><i class="icon icon-edit"></i></a>
                    <a href="<?= $result->pdfUrl ?>"><i class="icon icon-print"></i></a>
                    <a href="<?= $result->qrcodeUrl ?>" class="zoombox"><i class="icon icon-qrcode"></i></a>
                </center>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Aucun Résultat</span>
                <p> Aucun résultat pour : &quot; <?= $query ?> &quot; , verifiez l'orthographe puis réessayez.</p>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
