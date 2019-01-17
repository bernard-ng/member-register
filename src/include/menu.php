<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'enregistrement
    <?= (isset($selectedForm)) ? $selectedForm : '' ?> | www.labornelushi.net </title>
  <link rel="stylesheet" href="/assets/css/app.css">
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/app.js"></script>
</head>

<body>
<header>
  <div class="navbar-fixed">
    <nav class="grey darken-3 shadow-3">
      <div class="nav-wrapper container " id="menu">
        <a href="http://www.labornelushi.net" class="brand-logo">
          Laborne
        </a>

        <a href="index.php" class="action right">
          <i class="icon icon-user-plus"></i>
        </a>

        <a href="#" data-activates="mobile-menu" class="button-collapse left">
          <i class="icon icon icon-menu"></i>
        </a>

        <?php if ($isLogged) : ?>
          <ul class="right hide-on-med-and-down links">
            <li class="left">
              <form action="search.php" method="get">
                <input class="default-form" type="search" placeholder="recherche..." name="q" id="q">
              </form>
            </li>
            <li>&nbsp;</li>
            <li><a href="index.php">Formulaires</a></li>
            <li><a href="dashboard.php">Listes</a></li>
            <li><a href="login.php?action=logout">Déconnexion</a></li>
          </ul>
        <?php else : ?>
          <ul class="right hide-on-med-and-down links">
            <li><a href="index.php">Formulaires</a></li>
            <li><a href="login.php?action=logout">Connexion</a></li>
          </ul>
        <?php endif; ?>
      </div>
    </nav>
  </div>
  <ul class="side-nav mobile-links" id="mobile-menu" style="transform: translateX(-100%);">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="/assets/img/background.jpg" alt="bg">
        </div>
        <a href="http://labornelushi.net">
          <img src="/assets/img/logo.png" alt="bg2" class="circle">
        </a>
        <span class="white-txt name">La Borne Lushi</span>
        <span class="email"></span>
      </div>
    </li>

    <div style="margin-top: 50px;"></div>
    <?php if ($isLogged) : ?>
      <li class="card-panel grey darken-3 shadow-3" style="padding-left: 25px; padding-right: 25px;">
        <form action="search.php" method="get">
          <input class="default-form" type="search" placeholder="recherche..." name="q" id="q">
        </form>
      </li>
      <li><a href="index.php">Choix du formulaire</a></li>
      <li><a href="dashboard.php">Listes</a></li>
      <div style="position: absolute; color: #fff; display: block; width: 100%; background: #000; padding: 15px; margin-top: 25px; bottom: 60px;">
        <a href="login.php?action=logout"><strong>Déconnexion</strong></a>
      </div>
    <?php else : ?>
      <li><a href="index.php">Choix du formulaire</a></li>
      <div style="position: absolute; color: #fff; display: block; width: 100%; background: #000; padding: 15px; margin-top: 25px; bottom: 60px;">
      <a href="login.php?action=logout"><strong>Connexion</strong></a>
    </div>
    <?php endif; ?>
  </ul>
</header>
<main class="container">