<main class="container row">
    <?php include(APP."/Views/includes/left-aside.php"); ?>
    <section class="col l9 m12 s12">
        <div class="card-panel no-padding">
            <nav class="nav z-depth-2">
                <div class="nav-wrapper">
                <ul>
                    <li><a href="/pdf-generator/"><i class="icon icon-print"></i></a></li>
                    <li class="right"><a href="/settings"><i class="icon icon-cog"></i></a></li>
                </ul>
                </div>
            </nav>
        </div>

        <div class="card-panel col s12 m12" style="margin-top: -3px;">
        <?php for ($i = 0; $i < 8; $i++) : ?>
            <?php if (array_key_exists($i, $members)) : ?>
                <div class="col s12 m3">
                    <div class="card primary-b" style="text-align: center; color: #ccc;">
                        <div class="card-content">
                            <span class="card-title" style="text-transform: capitalize;">
                                <?= "{$members[$i]->nom} {$members[$i]->second_nom}" ?>
                            </span>
                            <div style="margin-top: -13px;"><?= "({$members[$i]->type})" ?></div>
                            <?= $members[$i]->description; ?>
                        </div>
                        <div class="card-action">
                        <center>
                            <a href="<?= $members[$i]->editUrl ?>"><i class="icon icon-edit"></i></a>
                            <a href="<?= $members[$i]->pdfUrl ?>"><i class="icon icon-print"></i></a>
                            <a href="<?= $members[$i]->qrcodeUrl ?>" class="zoombox"><i class="icon icon-qrcode"></i></a>
                        </center>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
        </div>

        <div class="card-panel col s12 m12" style="margin-top: -3px;">
            <div class="section-title mb-10 mt-20 ml-10">
                Les membres
                <span class="btn primary-b right"><?= count($members) ?></span>
            </div>

            <table class="card table bordered striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>second_nom</th>
                        <th>type</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($members)) : ?>
                    <?php foreach ($members as $member) : ?>
                        <tr>
                            <td><b><?= $member->id ?></b></td>
                            <td><?= $member->nom ?></td>
                            <td><?= $member->second_nom ?></td>
                            <td><?= $member->type ?></td>
                            <td>
                                <form method="POST" action="<?= "/delete" ?>" style="display: inline-block !important;">
                                    <input type="hidden" name="id" value="<?= $member->id?>" >
                                    <button type="submit" class="btn red" id="delete" title="supprimer">
                                        <i class="icon icon-remove" style="font-size: smaller !important;"></i>
                                    </button>
                                </form>

                                <a href="<?= $member->editUrl ?>">
                                     <button class="btn" title="editer">
                                        <i class="icon icon-edit" style="font-size: smaller !important;"></i>
                                    </button>
                                </a>
                                <a href="<?= $member->pdfUrl ?>" id="confirm" title="obtenir pdf">
                                    <button class="btn btn-small blue-2">
                                        <i class="icon icon-print" style="font-size: smaller !important;"></i>
                                    </button>
                                </a>
                                <a href="<?= $member->qrcodeUrl ?>" class="zoombox" title="obtenir qrcode">
                                    <button class="btn primary-b">
                                        <i class="icon icon-qrcode"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td><b>0</b></td>
                        <td>Aucun membre pour l'instant</td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-small disabled">
                                <i class="icon icon-remove" style="font-size: smaller !important;"></i>
                            </button>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </section>
</main>
