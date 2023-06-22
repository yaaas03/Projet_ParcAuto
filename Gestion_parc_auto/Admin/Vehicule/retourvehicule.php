<?php

require("db.php");
if (isset($_GET['id'])) {
    $date = date('Y-m-d ');
    $stm1 = $con->prepare("update historique set  date_recuperation= :date  where id_affectation = :id ")->execute([":id"=> $_GET['id'] , ":date"=>$date]);
    $stm = $con->prepare("update affectation_vehicule set date_recuperation =:date  where id_affectation = :id ")->execute([":id"=> $_GET['id'] , ":date"=>$date]);
}
echo "<script> window.location.replace('affectervehicule.php') </script>";


?>