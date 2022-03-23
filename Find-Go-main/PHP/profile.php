<?php
  session_start();

  include("connection.php");
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $password = md5($password);
    if($username != "" && $password != ""){
      try{
        $Stmt = $db->prepare("SELECT * FROM clients WHERE nom = :username AND password = :password");
        $Stmt-> bindParam('username',$username, PDO::PARAM_STR);
        $Stmt-> bindParam('password',$password, PDO::PARAM_STR);
        $Stmt->execute();
        $count = $Stmt->rowCount();
        $row = $Stmt->fetch();
        if($count == 1 && !empty($row)){
          $_SESSION['session_id'] = $row['id'];
          $_SESSION['session_nom'] = $row['nom'];
        }
        else{
          header("Location: login.php?error=Mot de passe incorrect");
          $msg = 'Mot de passe incorrect !';
        }
      }
      catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
      }
    }
    else{
      $msg = 'Veuillez remplir les deux champs';
    }
  }elseif(isset($_SESSION['session_nom'])){

  }
  else{
    header('Location: login.php');
    exit();
  }
  $msg='';
  //Filtrer les entré utilisateurs
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $response = $db-> prepare('SELECT * FROM clients WHERE nom = ?;');
  $response-> bindParam(1,$_SESSION['session_nom']);
  $response-> execute();
  $donnes = $response->fetch();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
    <title><?php $donnes['email']; ?></title>
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
    <header class="profile-header">
      <div class="box-container-2">
        <div class="profile-image">
          <span style="font-size: 200px; color: #ff5f6d;">
            <i class="fas fa-user-circle"></i>
          </span>
          <div class="change">
            <span style="font-size: 20px; color: #ff5f6d;">
              <i class="fas fa-pen"></i>
            </span>
            <a href="#">Photo de profile</a></li>
          </div>
        </div>
        <div class="profile-content">
          <div class="param">
            <h2>Nom :</h2>
            <p><?php echo $donnes['nom']; ?></p>
          </div>
          <div class="param">
            <h2>E-mail :</h2>
            <p><?php echo $donnes['email']; ?></p>
          </div>
          <a href="logout.php" class="btn">Déconnexion</a>
        </div>
      </div>
    </header>
  </body>
</html>
