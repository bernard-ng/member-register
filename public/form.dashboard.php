<?php
require_once("../src/form.core.php");
$list = isset($_GET['list']) ? htmlspecialchars($_GET['list']) : false;
$results = [];

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
              <th>nom</th>
              <th>postnom</th>
              <th>matricule</th>
              <th>actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($members)) : ?>
            <?php foreach ($members as $member) : ?>
            <tr>
              <td><b>
                  <?= $member->id ?></b></td>
              <td>
                <?= $member->nom ?>
              </td>
              <td>
                <?= $member->second_nom ?>
              </td>
              <td>
                <?= $member->type ?>
              </td>
              <td>
                <form method="POST" action="<?= "/delete" ?>" style="display: inline-block !important;">
                  <input type="hidden" name="id" value="<?= $member->id ?>">
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
            <?php if (!empty($members)) : ?>
            <?php foreach ($members as $member) : ?>
            <tr>
              <td><b>
                  <?= $member->id ?></b></td>
              <td>
                <?= $member->nom ?>
              </td>
              <td>
                <?= $member->second_nom ?>
              </td>
              <td>
                <?= $member->type ?>
              </td>
              <td>
                <form method="POST" action="<?= "/delete" ?>" style="display: inline-block !important;">
                  <input type="hidden" name="id" value="<?= $member->id ?>">
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
    <?php endif; ?>
  <?php endif; ?>
</section>
<?php include('../src/inc/footer.php'); ?>