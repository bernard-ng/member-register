<?php
require_once("../src/form.core.php");
require_once("../src/form.database.php");
require_once("../src/form.process.php");

loggedOnly();

$list = isset($_GET['list']) ? htmlspecialchars($_GET['list']) : false;
$members = all('members');
$children = all('children');

?>
<?php include('../src/inc/menu.php'); ?> 
<section class="row">
  <?php if(!$list): ?>
    <div class="row card-panel">
      <h3 class="ui header">Liste des Membres</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error omnis nihil veniam ea, perspiciatis porro temporibus enim molestias eveniet nesciunt tempore dolore tempora iure. Officia eum aliquam a odit autem.</p>
        <a href="?list=membre" class="btn blue darken-4">voir plus</a>
        <br><br>
      <div class="divider"></div>

      <h3 class="ui header">Liste des enfants</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum voluptate, corporis sunt facilis cumque, aliquid alias sapiente culpa esse hic dignissimos iure placeat suscipit non rem molestiae, voluptatibus veritatis assumenda.</p>
        <a href="?list=enfant" class="btn blue darken-4">voir plus</a>
        <br>
    </div>
  <?php endif; ?>

  <?php if($list): ?>
    <a href="?list=" class="btn blue darken-4">Choix de la liste</a>
    <?php if ($list == 'membre'): ?>
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
            <?php if (!empty($members)) : ?>
            <?php foreach ($members as $member) : ?>
            <tr>
              <td><b><?= $member->id ?></b></td>
              <td><img src="<?= $member->imageUrl ?>" width="60px" height="60px"  /></td>
              <td><?= $member->nom ?></td>
              <td><?= $member->prenom ?></td>
              <td>
                <form method="POST" action="?list=membre&action=delete" style="display: inline-block !important;">
                  <input type="hidden" name="id" value="<?= $member->id ?>">
                  <input type="hidden" name="type" value="members">
                  <button type="submit" class="btn red" id="delete" title="supprimer">
                    <i class="icon icon-remove" style="font-size: smaller !important;">
                      suppr
                    </i>
                  </button>
                </form>

                <a href="?list=membre&action=edit&id=<?= $member->id ?>">
                  <button class="btn" title="editer">
                    <i class="icon icon-edit" style="font-size: smaller !important;">
                      editer
                    </i>
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
    <?php endif; ?>

    <?php if ($list == 'enfant'): ?>
      <div class="card-panel row">
        <h3 class="ui header">Les Enfants</h3>
        <table class="table bordered striped">
          <thead>
            <tr>
              <th>id</th>
              <th>nom</th>
              <th>postnom</th>
              <th>matricule</th>
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
                    <i class="icon icon-remove" style="font-size: smaller !important;">
                      suppr
                    </i>
                  </button>
                </form>

                <a href="?list=enfant&action=editt&id=<?= $child->id ?>">
                  <button class="btn" title="editer">
                    <i class="icon icon-edit" style="font-size: smaller !important;">
                      editer
                    </i>
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
    <?php endif; ?>
  <?php endif; ?>
</section>
<?php include('../src/inc/footer.php'); ?>