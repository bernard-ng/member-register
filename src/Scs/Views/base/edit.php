<main class="container row">

    <div class="col l3 no-padding hide-on-med-and-down">
        <div class="card ">
            <div class="card-image">
                <img src="<?= $member->qrcodeUrl ?>">
            </div>
            <div class="ng-contain">
                <section class="description">
                    <blockquote>
                        Developped by <a href="http://ngpictures.pe.he" target="_blank">Bernard Ng</a>
                    </blockquote>
                </section>
            </div>
        </div>
    </div>

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
            <div class="page-title section-title">Edition d'un membre <i class="icon icon-pencil right"></i></div>

            <form action="" method="POST" class="ml-10 mr-10 mb-30">
                <div class="col s6">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="nom" value="<?= $member->nom ?>" data-length="150">
                </div>

                <div class="col s6">
                    <label for="second_nom">Second Nom</label>
                    <input type="text"  id="second_nom" name="second_nom" placeholder="second nom" value="<?= $member->second_nom ?>" data-length="150">
                </div>

                <div class="col s12">
                    <label for="type">Type</label>
                    <input type="text" id="type" name="type" placeholder="type" value="<?= $member->type ?>" data-length="150">
                </div>

                <div class="input-field col l12 m12 s12">
                    <label for="description">Description</label>
                    <textarea name="description" id="Description" placeholder="description" class="materialize-textarea" data-length="200"><?= $member->description ?></textarea>
                </div>

                <div class="col s12">
                    <button type="submit" class="ng-btn feed-btn mb-20 mt-20" style="height: 40px;">Soumettre</button>
                </div>
            </form>
        </div>
    </section>
</main>
