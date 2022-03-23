<?php
  include("connection.php");

  session_start();
  $nbr = 0;

  if(empty($_POST['nom'])||
     empty($_POST['wilaya'])||
     empty($_POST['cat'])||
     empty($_POST['adr'])||
     empty($_POST['num'])||
     empty($_POST['descr'])
   ){
     die('Veuillez remplir tous les champs');
   }
   $Stmt = $db->prepare('INSERT INTO etablissement(nom_et,wilaya,cat,adr,NbrLike,email,descr,tel,image_et) VALUES (:nom,:wilaya,:cat,:adr,0,:email,:descr,:num,:img);');
   $Stmt-> bindParam('nom',$_POST['nom']);
   $Stmt-> bindParam('wilaya',$_POST['wilaya']);
   $Stmt-> bindParam('cat',$_POST['cat']);
   $Stmt-> bindParam('email',$_POST['email']);
   $Stmt-> bindParam('adr',$_POST['adr']);
   $Stmt-> bindParam('num',$_POST['num']);
   $Stmt-> bindParam('descr',$_POST['descr']);
   $Stmt-> bindParam('img',$_POST['img']);
   $Stmt->execute();

   $param = $_POST['nom'];
   echo $param;
   header("Location: bus-profile.php?profile=$param");
 ?>
