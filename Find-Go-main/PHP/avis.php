<?php
  session_start();
  if(!isset($_SESSION['session_nom'])){
    header("Location: login.php");
  }
  include("connection.php");
  if(isset($_GET['profile'])){
    $reponse = $db->prepare('SELECT * FROM etablissement WHERE nom_et = ?;');
    $reponse-> bindParam(1,$_GET['profile']);
    $reponse-> execute();
    $donnes = $reponse->fetch();
    $_SESSION['id_et'] = $donnes['id_et'];
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/avis.css">
    <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
    <title>Avis</title>
  </head>
  <body>
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
          <a href="business.php">For Businesses</a>
          <a href="#">For Clients</a>
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
          <a href="login.php" class="btn">Login</a>
          <a href="register.php" class="btn" id="SignUp">SignUp</a>
        </div>
      <?php }?>
      </div>
    </div>
    <section class="content">
      <div class="box-container">
      <div class="image-container">
        <img src=<?php echo $donnes['image_et'] ?> alt="">
      </div>
      <div class="info-container">
        <div class="profile-info">
          <h2><a href="bus-profile.php?profile=<?php echo $donnes['nom_et']; ?>"><?php echo $donnes['nom_et']; ?></a></h2>
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
        <p id="info-text"><span>&ldquo;</span> <?php echo $donnes['descr'] ?> .
            <span>&ldquo;</span></p>
        <div class="avis-box">
          <form class="" action="avis.php" method="post">
            <textarea name="avis" rows="12" cols="80" placeholder="Veuillez saisir votre avis"></textarea>
            <input type="submit" name="submit" value="Ajouter avis">
          </form>
        </div>
      </div>
    </div>
    </section>
  </body>
</html>
<?php
  $Stmt = $db->prepare('INSERT INTO avis (commentaire , id_et , id) VALUES (:commentaire,:id_et,:id);');
  $Stmt-> bindParam('commentaire',$_POST['avis']);
  $Stmt-> bindParam('id_et',$_SESSION['id_et']);
  $Stmt-> bindParam('id',$_SESSION['session_id']);
  $Stmt->execute();
  header("Location: acceuil.php");
?>
