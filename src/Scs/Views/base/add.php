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
        <div class="card col s12">
            <div class="page-title section-title">Ajouter un membre <i class="icon icon-pencil right"></i></div>

            <form action="" method="POST" class="ml-10 mr-10 mb-30">
                <div class="col s6">
                    <input type="text" name="nom" placeholder="nom" value="<?= $infos->get('nom') ?>">
                </div>

                <div class="col s6">
                    <input type="text" name="second_nom" placeholder="second nom" value="<?= $infos->get('second_nom') ?>" >
                </div>

                <div class="col s12">
                    <input type="text" name="type" placeholder="type" value="<?= $infos->get('type') ?>" >
                </div>

                <div class="input-field col l12 m12 s12">
                    <textarea id="content" name="description" placeholder="description"><?= $infos->get('description') ?></textarea>
                </div>

                <div class="col s12">
                    <button type="submit" class="ng-btn feed-btn mb-20 mt-20" style="height: 40px;">Soumettre</button>
                </div>
            </form>
        </div>
    </section>
</main>
