<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/signup.css">
    <title>S'inscrire</title>
  </head>
  <body>
    <div class="signup-page">
      <div class="signup-form">
        <a href="search.php"><img src="img/wrong.svg" alt="" width="30px" height="30px" id="close_page"></a>
        <div class="login-form-title">
          <h1>Créez votre compte</h1>
          <p><?php
            if (isset($_GET['error'])) {
              echo $_GET['error'];
            }?></p>
        </div>
        <div class="social-media">
          <img src="img/facebook.svg" alt="" width="40px" height="40px">
          <img src="img/gmail.svg" alt="" width="40px" height="40px">
          <img src="img/linkedin.svg" alt="" width="40px" height="40px">
        </div>
        <div class="login-form-form">
          <form action="profile.php" method="post" class="form">
            <div class="input-content-field">
              <div class="input-field">
                <input type="text" name="username" placeholder="Nom d'utilisateur">
              </div>
              <div class="input-field">
                <input type="text" name="email" placeholder="Email">
              </div>
            </div>
            <div class="input-content-field">
              <div class="input-field">
                <input type="password" name="password" placeholder="Mot de passe">
              </div>
              <div class="input-field">
                <input type="password" name="confirm-password" placeholder="Mot de passe vérification">
              </div>
            </div>
            <input type="submit" name="" value="Confirmer" >
          </form>
        </div>
      </div>
      <div class="signup-info">
        <div class="logo">
          <a href="#"><img src="img/Logo2.svg" alt="Logo" width="150px"></a>
        </div>
        <div class="signup-info-title">
          <h1>One Of Us?</h1>
        </div>
        <div class="signup-info-content">
          <h3>Si vous avez déjà un compte, connectez-vous simplement. Vous nous avez manqué !</h3>
          <a href="#" class="btn">Log In</a>
        </div>
      </div>
    </div>
  </body>
</html>
