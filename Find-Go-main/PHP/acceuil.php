<?php
  session_start();
  include('connection.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
    <title>Acceuil</title>
  </head>
  <body>
    <header>
      <div class="nav-bar">
        <a href="acceuil.php"><img src="img/logo.png" alt="" width="100px"></a>
        <?php if ((isset($_SESSION['session_nom']))&&(isset($_SESSION['session_id']))) { ?>
          <div class="connexion-options">
            <span style="font-size: 30px; color: #ff5f6d;">
              <i class="fas fa-bell"></i>
            </span>
            <div class="dropdown">
              <span style="font-size: 40px; color: #ff5f6d;">
                <i class="fas fa-user-circle"></i>
              </span>
              <div class="dropdown-content dropdown-content-2">
                <a href="profile.php">Profile</a>
                <a href="logout.php">Déconnexion</a>
              </div>
            </div>
          </div>
        <?php }else { ?>
        <div class="login-sigup-button">
          <a href="login.php" class="btn">Se connecter</a>
          <a href="register.php" class="btn" id="SignUp">S'inscrire</a>
        </div>
      <?php }?>
      </div>
      <div class="content">
        <div class="logo">
          <img src="img/findfi.png" alt="">
        </div>

        <form class="search-container" action="search.php" method="post">
            <input type="text" name="search" placeholder="Search">
            <input type="text" name="wilaya" placeholder="Wilaya" id="separate">
            <button type="submit" name="button" class="button">
              <a href="#"><li class="fa fa-search"></li></a>
            </button>
        </form>
        <ul>
          <li>
            <div class="dropdown">
              <a href="#">Restaurant</a>
              <span style="font-size: 14px; color: Dodgerblue;">
                <i class="fas fa-chevron-down"></i>
              </span>
              <div class="dropdown-content">
                <a href="#">Fast-Food</a>
                <a href="#">Traditionnelle</a>
                <a href="#">Autre</a>
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <a href="#">Services à domicile</a>
              <span style="font-size: 14px; color: Dodgerblue;">
                <i class="fas fa-chevron-down"></i>
              </span>
              <div class="dropdown-content">
                <a href="#">Plombier</a>
                <a href="#">Peintre</a>
                <a href="#">Autre</a>
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <a href="#">Plus</a>
              <span style="font-size: 14px; color: Dodgerblue;">
                <i class="fas fa-chevron-down"></i>
              </span>
              <div class="dropdown-content">
                <a href="#">Hotel</a>
                <a href="#">Caféteria</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </header>
    <section class="about">
      <img src="img/chi.png" alt="" width="400px">
      <div class="about-text">
        <div class="title">
          <h1 id="title">A propos de</h1>
          <img src="img/findfi.png" alt="" width="150px">
        </div>
        <p>Find,Go connecte les gens aux meilleurs des commerces locaux .</p>
        <div class="button">
          <a href="#" class="btn-2">Savoir Plus</a>
        </div>
      </div>
    </section>
    <section class="parcourir">
      <h1>Parcourir les entreprise</h1>
      <div class="items">
        <div class="item">
          <img src="img/pharmacie.png" alt="" width="80px" height="80px">
          <p>Pharmacie</p>
        </div>
        <div class="item">
          <img src="img/autre.png" alt="" width="80px">
          <p>Services à domicile</p>
        </div>
        <div class="item">
          <img src="img/coiffeur.png" alt="" width="80px">
          <p>Beauté</p>
        </div>
        <div class="item">
          <img src="img/restau.png" alt="" width="80px">
          <p>Restaurant</p>
        </div>
        <div class="item">
          <img src="img/sh.png" alt="" width="80px">
          <p>Shopping</p>
        </div>
        <div class="item">
          <img src="img/xc.png" alt="" width="80px">
          <p>Autre</p>
        </div>
      </div>
    </section>
    <section class="avis">
      <h2>Avis des utilisateurs</h2>
      <div class="avis-item">
        <?php
        $item = 0;
        $rsp = $db->prepare('SELECT * FROM avis;');
        $rsp->execute();
        while(($data = $rsp->fetch()) and ($item<2)){
          ?>
          <div class="box-avis">
            <div class="user-info">
              <?php
              $clt = $db->prepare('SELECT * FROM clients WHERE id = ?;');
              $clt-> bindParam(1,$data['id']);
              $clt->execute();

              $user = $clt->fetch();
              ?>
              <span style="font-size: 25px; color: #ff5f6d;">
                <i class="fas fa-comment"></i>
              </span>
              <h2><?php echo $user['nom']; ?></h2>
            </div>
            <div class="content-avis">
              <img src=<?php echo $user['img']; ?> alt="">
              <p><span>&ldquo;&nbsp;&nbsp;</span><?php echo $data['commentaire']; ?><span>&nbsp;&nbsp;&ldquo;</span></p>
            </div>
          </div>
        <?php  $item++;} ?>
      </div>
    </section>
    <section class="business">
      <img src="img/logo2.png" alt="" width="300px">
      <div class="container">
        <div class="container-text">
          <h1>Attirez plus de clients gratuitement !</h1>
          <p>Find,go place votre entreprises au dessus des resultats de recherche et sur les
            pages de vos concurents cela signifie que les clients sont plus susceptible
            de vous trouver lorsqu'ils recherchent les services que vous proposez.</p>
            <a href="business.php" class="btn-2">Gérer mon business</a>
        </div>
        <img src="img/argent.png" alt="" width="400px">
      </div>
    </section>
    <footer>
      <div class="aide">
        <h2>Aide</h2>
        <a href="#">Support thchnique</a>
        <a href="#">Droit</a>
        <a href="#">F.A.Q</a>
      </div>
      <div class="liens">
        <h2>Liens Utiles</h2>
        <a href="">Acceuil</a>
        <a href="#">Mon compte</a>
        <a href="#">Recherche</a>
        <a href="#">Paramétre</a>
        <a href="#">Nous Contacter</a>
      </div>
      <div class="wilaya">
        <h2>Wilaya</h2>
        <a href="#">Tizi Ouzou</a>
        <a href="#">Alger</a>
        <a href="#">Oran</a>
        <a href="#">Setif</a>
      </div>
      <div class="social-media">
        <h2>Suivez-nous</h2>
        <div class="icons">
          <a href="#">
            <span style="font-size: 25px; color: #ff5f6d;">
              <i class="fab fa-facebook-square"></i>
            </span>
          </a>
          <a href="#">
            <span style="font-size: 25px; color: #ff5f6d;">
              <i class="fab fa-twitter-square"></i>
            </span>
          </a>
          <a href="#">
            <span style="font-size: 25px; color: #ff5f6d;">
              <i class="fab fa-instagram-square"></i>
            </span>
          </a>
        </div>
      </div>
    </footer>
  </body>
</html>
