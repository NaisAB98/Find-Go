<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/create_business.css">
    <title></title>
  </head>
  <body>
    <div class="info">
      <div class="logo">
        <a href="business.php"><img src="img/logo2.png" alt="Logo" width="300px"></a>
      </div>
      <h2>Remplir les informations </br>de votre entreprise</h2>
      <img src="img/information.svg" alt="" width="300px">
    </div>
    <div class="box-container">
      <h3>Informations sur L'entreprise</h3>
      <form action="add_business.php" method="post">
        <input type="text" name="nom" placeholder="Nom de l'entreprise">
        <input type="text" name="wilaya" placeholder="Wilaya">
        <input type="text" name="cat" placeholder="Catégorie">
        <input type="text" name="adr" placeholder="Adresse">
        <input type="text" name="num" placeholder="Numéro de téléphone">
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Mot de passe">
        <textarea name="descr" placeholder="Description" rows="8" cols="32"></textarea>
        <input type="submit" name="" placeholder="Continuer">
      </form>
    </div>
  </body>
</html>
