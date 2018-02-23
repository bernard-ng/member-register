<main class="container row">
    <?php include(APP."/Views/includes/left-aside.php"); ?>
    <section class="col l9 m12 s12">
        <div class="card-panel no-padding">
            <nav class="nav z-depth-2">
                <div class="nav-wrapper">
                <ul>
                    <li><a href="/qrcodes-generator"><i class="icon icon-qrcode"></i></a></li>
                    <li><a href="/pdf-generator/"><i class="icon icon-print"></i></a></li>
                    <li class="right"><a href="/settings"><i class="icon icon-cog"></i></a></li>
                </ul>
                </div>
            </nav>

        </div>
        <div class="card-panel">
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
                                    <button type="submit" class="btn waves-effect waves-light red" id="delete" title="supprimer">
                                        <i class="icon icon-remove" style="font-size: smaller !important;"></i>
                                    </button>
                                </form>

                                <a href="<?= "edit/{$member->id}" ?>">
                                     <button class="btn waves-effect waves-light" title="editer">
                                        <i class="icon icon-edit" style="font-size: smaller !important;"></i>
                                    </button>
                                </a>
                                <a href="<?= "/confirm/3/{$member->id}" ?>" id="confirm" title="obtenir pdf">
                                    <button class="btn btn-small blue-2 waves-effect waves-light">
                                        <i class="icon icon-print" style="font-size: smaller !important;"></i>
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
                            <button type="submit" class="btn btn-small waves-effect waves-light disabled">
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
