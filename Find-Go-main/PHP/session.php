<?php
  include('connection.php');
  session_start();
  if ((isset($_SESSION['login']))&&(trim($_SESSION['login'])!="")) {
    $response = $db->prepare('SELECT username FROM users WHERE username = :session');
    $response-> bindParam('session',$_SESSION['lgoin']);
    $response->query();
    $data = $response->fetch();
  }else {
    header("Location: login.php");
  }
?>
