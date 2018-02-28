<main class="container row">
    <?php include(APP."/Views/includes/left-aside.php"); ?>
    <section class="col l9 m12 s12">
        <div class="card-panel no-padding">
            <nav class="nav z-depth-2">
                <div class="nav-wrapper">
                <ul>
                    <li><a href="/pdf-generator/"><i class="icon icon-print"></i></a></li>
                    <li class="right disabled"><a href="#" id="off"><i class="icon icon-cog"></i></a></li>
                </ul>
                </div>
            </nav>
        </div>

        <div class="card-panel col s12 m12" style="margin-top: -3px;">
            <div class="section-title mb-20 mt-20 ml-10">
                Les cartes PDF
            </div>

            <table class="card table bordered striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>nom du fichier</th>
                        <th>taille</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($files)) : ?>
                    <?php foreach ($files as $file) : ?>
                        <tr>
                            <td><b><?= $files->key(); ?></b></td>
                            <td>
                               <?php if ($file->key() !== 0 && $file->key() !== 1) : ?>
                               <?= "{$member->find(intval($file->getBasename()))->nom} {$member->find(intval($file->getBasename()))->second_nom}" ?>
                               <?php endif; ?>
                            </td>

                            <td><?= $file->getBasename(); ?></td>
                            <td><?= round(($file->getSize() / 1024 ) / 1024, 2) . "Mb" ?></td>
                            <td>
                                <form method="POST" action="<?= "/pdf-delete" ?>" style="display: inline-block !important;">
                                    <input type="hidden" name="file" value="<?= $file->getBasename() ?>" >
                                    <button type="submit" class="btn red" id="delete" title="supprimer">
                                        <i class="icon icon-remove" style="font-size: smaller !important;"></i>
                                    </button>
                                </form>
                                <a href="<?= $member->find(intval($file->getBasename()))->pdfUrl ?>" id="confirm" title="obtenir pdf">
                                    <button class="btn btn-small blue-2">
                                        <i class="icon icon-print" style="font-size: smaller !important;"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td><b>0</b></td>
                        <td>Aucune carte PDF pour l'instant</td>
                        <td>-</td>
                        <td>-</td>
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
