<?php
  $data = $_POST;
  session_start();
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(trim($data['username'])==""){
      $erreur = "Le champs nom est vide.";
      header("Location: register.php?error=$erreur");
    }
    if(trim($data['email'])==""){
      $erreur = "Le champs email est vide";
      header("Location: register.php?error=$erreur");
    }

  }

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(trim($data['username'])==""){
      $erreur = "Le champs nom est vide.";
      header("Location: register.php?error=$erreur");
    }
    if(trim($data['email'])==""){
      $erreur = "Le champs email est vide";
      header("Location: register.php?error=$erreur");
    }

  }

/*  if(empty($data['username'])||
    empty($data['email'])||
    empty($data['password'])||
    empty($data['confirm-password'])){
      die('Veuillez remplir tous les champs');
    }
    */
  if ($data['password'] !== $data['confirm-password']) {
    die('Les deux mots de passes sont différents');
  }

  include("connection.php");


  // Verifier que cette e-mail n'existe pas déja
  $verify = $db->prepare("SELECT * FROM clients WHERE nom = :username AND email = :email");
  $verify-> bindParam('username',$data['username'], PDO::PARAM_STR);
  $verify-> bindParam('email',$data['email'], PDO::PARAM_STR);
  $verify->execute();
  $nbr = $verify->rowCount();
  if ($nbr < 1) {
    $pass = md5($data['password']);
    $Stmt = $db->prepare('INSERT INTO clients (nom , email ,password) VALUES (?,?,?)');
    $Stmt-> bindParam(1,$data['username']);
    $Stmt-> bindParam(2,$data['email']);
    $Stmt-> bindParam(3,$pass);
    $Stmt->execute();

    // Create a session
    $_SESSION['session_nom'] = $data['username'];

  }else{
    $msg = "Ce login existe déja";
    header("Location: register.php?error=$msg");
  }
?>
