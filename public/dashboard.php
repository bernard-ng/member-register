<?php
require_once("../src/core.php");
require_once(ROOT . "/src/database.php");
require_once(ROOT . "/src/process.php");

loggedOnly();

$list = isset($_GET['list']) ? htmlspecialchars($_GET['list']) : false;
$adults = all('adults');
$children = all('children');

?>
<?php include(ROOT . 'src/include/menu.php'); ?> 
<section class="row">
  <?php if (!$list) : ?>
    <div class="row card-panel">
      <h3 class="ui header">Liste des Membres</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error omnis nihil veniam ea, perspiciatis porro temporibus enim molestias eveniet nesciunt tempore dolore tempora iure. Officia eum aliquam a odit autem.</p>
        <a href="?list=adult" class="btn blue darken-4">voir plus</a>
        <br><br>
      <div class="divider"></div>

      <h3 class="ui header">Liste des enfants</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum voluptate, corporis sunt facilis cumque, aliquid alias sapiente culpa esse hic dignissimos iure placeat suscipit non rem molestiae, voluptatibus veritatis assumenda.</p>
        <a href="?list=enfant" class="btn blue darken-4">voir plus</a>
        <br>
    </div>
  <?php endif; ?>

  <?php if ($list) : ?>
    <?php if ($list == 'adult') : ?>
      <div class="card-panel row">
        <h3 class="ui header">Les Membres</h3>
        <table class="table bordered striped">
          <thead>
            <tr>
              <th>id</th>
              <th>image</th>
              <th>nom</th>
              <th>postnom</th>
              <th>actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($adults)) : ?>
            <?php foreach ($adults as $adult) : ?>
            <tr>
              <td><b><?= $adult->id ?></b></td>
              <td><img src="<?= $adult->imageUrl ?>" width="60px" height="60px"  /></td>
              <td><?= $adult->nom ?></td>
              <td><?= $adult->prenom ?></td>
              <td>
                <form method="POST" action="?list=adult&action=delete" style="display: inline-block !important;">
                  <input type="hidden" name="id" value="<?= $adult->id ?>">
                  <input type="hidden" name="type" value="adults">
                  <button type="submit" class="btn red" id="delete" title="supprimer">
                    <i class="icon icon-user-times" style="font-size: smaller !important;"></i>
                  </button>
                </form>

                <a href="?list=adult&action=edit&id=<?= $adult->id ?>">
                  <button class="btn" title="editer">
                    <i class="icon icon-user" style="font-size: smaller !important;"></i>
                  </button>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
              <td><b>0</b></td>
              <td>Aucun adult pour l'instant</td>
              <td></td>
              <td></td>
              <td>
                <button type="submit" class="btn btn-small disabled">
                  <i class="icon icon-user" style="font-size: smaller !important;"></i>
                </button>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

    <?php if ($list == 'enfant') : ?>
      <div class="card-panel row">
        <h3 class="ui header">Les Enfants</h3>
        <table class="table bordered striped">
          <thead>
            <tr>
              <th>id</th>
              <th>image</th>
              <th>nom</th>
              <th>postnom</th>
              <th>actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($children)) : ?>
            <?php foreach ($children as $child) : ?>
            <tr>
            <td><b><?= $child->id ?></b></td>
              <td><img src="<?= $child->imageUrl ?>" width="60px" height="60px"  /></td>
              <td><?= $child->nom ?></td>
              <td><?= $child->prenom ?></td>
              <td>
                <form method="POST" action="?list=enfant&action=delete" style="display: inline-block !important;">
                  <input type="hidden" name="id" value="<?= $child->id ?>">
                  <input type="hidden" name="type" value="children">
                  <button type="submit" class="btn red" id="delete" title="supprimer">
                    <i class="icon icon-user-times" style="font-size: smaller !important;"></i>
                  </button>
                </form>

                <a href="?list=enfant&action=edit&id=<?= $child->id ?>">
                  <button class="btn" title="editer">
                    <i class="icon icon-user" style="font-size: smaller !important;"></i>
                  </button>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
              <td><b>0</b></td>
              <td>Aucun enfant pour l'instant</td>
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
    <?php endif; ?>
  <?php endif; ?>
</section>
<?php include(ROOT . 'src/include/footer.php'); ?>