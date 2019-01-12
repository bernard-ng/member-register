<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'enregistrement
    <?= (isset($selectedForm)) ? $selectedForm : '' ?> | www.labornelushi.net </title>
  <link rel="stylesheet" href="http://localhost/local-ressources/materializecss/css/style.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <script src="http://localhost/local-ressources/materializecss/js/bin/materialize.min.js"></script>
</head>

<body>
<header>
  <nav class="grey darken-3 z-depth-3">
    <div class="nav-wrapper container " id="menu">
      <a href="http://www.labornelushi.net" class="brand-logo">
        La Borne
      </a>

      <?php if ($isLogged) : ?>
        <ul class="right hide-on-med-and-down links">
          <li class="left">
            <form action="form.search.php" method="get">
              <input class="default-form" type="search" placeholder="recherche..." name="q" id="q">
            </form>
          </li>
          <li>&nbsp;</li>
          <li><a href="index.php">Formulaires</a></li>
          <li><a href="form.dashboard.php">Listes</a></li>
          <li><a href="form.login.php?action=logout">Déconnexion</a></li>
        </ul>
      <?php else : ?>
        <ul class="right hide-on-med-and-down links">
          <li><a href="index.php">Formulaires</a></li>
          <li><a href="form.login.php?action=logout">Connexion</a></li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>
</header>
<main class="container">