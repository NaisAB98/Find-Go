<?php
  session_start();
  include("connection.php");
  if(isset($_POST['search'])){
    $search = $_POST['search'];
  }
  if ((isset($_POST['search']))&&(isset($_POST['wilaya']))) {
    $response = $db->prepare('SELECT * FROM etablissement WHERE cat = ? AND wilaya = ? ;');
    $response-> bindParam(1,$_POST['search']);
    $response-> bindParam(2,$_POST['wilaya']);
    $response->execute();
  }if(isset($_POST['wilaya'])&&(empty($_POST['search']))){
    $response = $db->prepare('SELECT * FROM etablissement WHERE wilaya = ?;');
    $response-> bindParam(1,$_POST['wilaya']);
    $response->execute();
  }if(isset($_POST['search'])&&(empty($_POST['wilaya']))){
    $response = $db->prepare("SELECT * FROM etablissement WHERE cat = ? or descr Like '%$search%' or nom_et Like '%$search%';");
    $response-> bindParam(1,$_POST['search']);
    $response->execute();
    $_POST['wilaya'] = 'All';
  }
  if (empty($_POST['search']) && empty($_POST['wilaya'])) {
    $_POST['wilaya'] = 'All';
    $response = $db->query('SELECT * FROM etablissement');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
    <title>Search</title>
  </head>
  <body>
    <header>
      <div class="nav-bar">
        <div class="nav-bar-header">
          <div class="logo">
            <a href="acceuil.php"><img src="img/Logo2.svg" alt="Logo" width="100px"></a>
          </div>
          <form class="search-container" action="search.php" method="post">
              <input type="text" name="search" placeholder="Search">
              <input type="text" name="wilaya" placeholder="Wilaya" id="separate">
              <button type="submit" name="button" class="button">
                <a href="#"><li class="fa fa-search"></li></a>
              </button>
          </form>
          <div id="for-business">
            <a href="business.php">Commerce</a>
            <a href="#">Client</a>
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
                  <a href="profile.php">Profile</a>
                  <a href="logout.php">Déconnexion</a>
                </div>
              </div>
            </div>
          <?php }else { ?>
          <div class="login-sigup-button">
            <a href="login.php" class="btn">Se Connecter</a>
            <a href="register.php" class="btn" id="SignUp">S'inscrire</a>
          </div>
        <?php }?>
        </div>
        <div class="nav-bar-menu">
          <div class="dropdown">
            <a href="#">Restaurant</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Fast-Food</a>
              <a href="#">Traditionnelle</a>
              <a href="#">Livraison</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#">Home Services</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Plombier</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#">Service Auto</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Plombier</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#">Autres</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Plombier</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
        </div>
      </div>
      <section class="Search">
        <div class="filter-section">
          <h2>Filtres</h2>
          <div class="filter-options">
            <h2>Caractéristique</h2>
            <form class="" action="index.html" method="post">
              <label class="container">Ouvert
                <input type="checkbox" >
                <span class="checkmark"></span>
              </label>
              <label class="container">Pour Groupes
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Pour enfants
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Lieu Plein Air
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </form>
            <a href="#" id="See-all">Voir Tous</a>
          </div>
          <div class="filter-options">
            <h2>Wilaya</h2>
            <form class="" action="index.html" method="post">
              <label class="container">Alger
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Tizi Ouzou
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Oran
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Sétif
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </form>
            <a href="#" id="See-all">Voir Tous</a>
          </div>
        </div>
        <div class="search-content">
          <div class="search-desc">
            <h2 id="search-title">Résultat pour <?php echo $_POST['wilaya']; ?></h2>
            <div class="sort">
              <div class="dropdown">
                <a href="#">Recommandé</a>
                <span style="font-size: 14px; color: Dodgerblue;">
                  <i class="fas fa-chevron-down"></i>
                </span>
                <div class="dropdown-content">
                  <a href="#">Plus Visité</a>
                  <a href="#">Plus liké</a>
                </div>
              </div>
            </div>
          </div>
          <?php
            $i=1;
            while($donnes = $response->fetch()){
            ?>
            <div class="box-container">
            <div class="image-container">
              <img src=<?php echo $donnes['image_et'] ?> alt="">
            </div>
            <div class="info-container">
              <div class="profile-info">
                <h2><a href="bus-profile.php?profile=<?php echo $donnes['nom_et']; ?>"><?php echo $i.'.'.$donnes['nom_et']; ?></a></h2>
                <div class="stars">
                  <p><?php echo $donnes['NbrLike']; ?></p>
                  <span style="font-size: 18px; color: Dodgerblue;">
                    <i class="fas fa-star"></i>
                  </span>
                </div>
              </div>
              <?php echo '<p>' .$donnes['cat'] .'</p>'?>
              <div id="location">
                <span style="font-size: 20px; color: Dodgerblue;">
                  <i class="fas fa-map-marker-alt"></i>
                </span>
                <a href="#"> <?php echo $donnes['adr'] ?>.</a>
              </div>
              <p id="info-text"><span>&ldquo;</span>Hello <?php echo $donnes['descr']?>
                  <span>&ldquo;</span></p>
              <a href="avis.php?profile=<?php echo $donnes['nom_et']; ?>" class="avis">Ajouter un avis</a>
            </div>
          </div>
            <?php
            $i++;
            }
            ?>
        </div>
        <div id="map-card">
          <div class="mapouter"><div class="gmap_canvas"><iframe width="341" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Tour Ouarab Ali,Boulevard Krim Belkacem ,Tizi Ouzou&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:500px;width:341px;}</style><style>.gmap_canvas {overflow:hidden;background:black;height:100vh;width:100%;}</style></div></div>
        </div>
      </section>
    </header>
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
    </div>
  </body>
</html>
