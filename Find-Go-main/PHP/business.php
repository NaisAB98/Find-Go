<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Find-Go Business</title>
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/business.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <div class="nav-bar">
        <div class="nav-bar-header">
          <div class="logo">
            <a href="#"><img src="img/businessLogo.svg" alt="Logo" width="100px"></a>
          </div>
          <div class="search-bar">
            <form class="search-container" action="search.php" method="post">
                <input type="text" name="search" placeholder="Search">
                <input type="text" name="wilaya" placeholder="Wilaya" id="separate">
                <button type="submit" name="button" class="button">
                  <a href="#"><li class="fa fa-search"></li></a>
                </button>
            </form>
          </div>
          <div id="for-business">
            <a href="#">Commerce</a>
            <a href="acceuil.php">Client</a>
          </div>
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
                  <a href="#">Profile</a>
                  <a href="logout.php">Déconnexion</a>
                </div>
              </div>
            </div>
          <?php }else { ?>
          <div class="login-sigup-button">
            <a href="login.php" class="btn">Se connecter</a>
            <a href="register.php" class="btn" id="SignUp">S'inscrie</a>
          </div>
        <?php }?>
        </div>
      </div>
      <div class="header-descr">
        <img src="img/logo2.png" alt="" width="400px">
        <h1>Commencez dès maintenant à gérer votre profil d'établissement sur</br> Find Go .</h1>
        <a href="Create_business.php" class="button2">Créer mon business</a>
      </div>
    </header>
    <section class="first">
      <div class="section-text">
        <h2>Attirez de nouveaux clients grâce à un profil d'établissement attrayant</h2>
        <p>Vous pouvez publier des photos et des offres dans votre profil afin de
          mettre en avant les spécificités de votre établissement,
          et d'inciter les utilisateurs à vous choisir systématiquement.</p>
      </div>
      <div class="section-image">
        <img src="img/business.svg" alt="" width="280px" height="200px">
      </div>
    </section>
    <section class="second">
      <div class="section-image">
        <img src="img/Confirmed.svg" alt="" width="280px" height="200px">
      </div>
      <div class="section-text">
        <h2>Proposez différentes solutions pour vous contacter</h2>
        <p>Vos clients cherchent sur Google comment communiquer avec vous, que ce soit par téléphone,
           par message ou en publiant des avis. Aujourd'hui,les méthodes de communications
            se multiplient, ce qui peut vous permettre de développer votre activité.</p>
      </div>
    </section>
    <section class="nslpv">
      <div class="text">
        <h2>Nous somme là pour vous</h2>
        <p>Notre équipe de support est disponible 24 h/24 et 7 j/7 pour vous accompagner à chaque
          étape de la création de votre entreprise. Consultez notre Teaching Center pour mieux
          comprendre le processus de création de profile. Rejoignez notre groupe communautaire Studio U,
          composé de formateur toujours prêts à partager leurs conseils et bonnes pratiques.</p>
      </div>
      <img src="img/maintenance.svg" alt="" width="500px" height="400px">
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
