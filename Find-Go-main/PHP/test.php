<?php
  session_start();
  include('connection.php');
  if ((isset($_POST['search']))&&(isset($_POST['wilaya']))) {
    $response = $db->prepare('SELECT * FROM business WHERE cat = ? AND wilaya = ? ;');
    $response-> bindParam(1,$_POST['search']);
    $response-> bindParam(2,$_POST['wilaya']);
    $response->execute();
  }else{
    $reponse = $db->query('SELECT * FROM business');
    $donnes = $reponse->fetch();
  }
  echo 'hello';
  $i=1;
  while($donnes = $response->fetch()){
    echo $i.$donnes['nom'];
    $i++;
  }
  ?>
