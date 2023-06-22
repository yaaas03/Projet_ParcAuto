<?php
session_start();
$_SESSION['nom']=null;
$_SESSION['prenom']=null;
$_SESSION['id_admin']=null;
header('location:Connexion.html');
?>
