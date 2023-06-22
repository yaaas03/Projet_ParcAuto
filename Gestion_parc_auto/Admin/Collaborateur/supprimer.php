<?php
require("db.php");
if (isset($_GET['id'])){
$stm=$con->prepare("delete from personne where id_personne=?");
$stm->execute([$_GET['id']]);
}
echo "<script> window.location.replace('collaborateur.php') </script>";
?>
