<?php
  $user = 'yacine';
  $pass = "password";
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=FINDGO' , $user , $pass ,array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $db)
  {
    die('Erreur : '.$bd->getMessage());
  }
?>
