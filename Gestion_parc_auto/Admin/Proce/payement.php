<?php

require("db.php");
if (isset($_GET['id'])) {
    $date = date('Y-m-d ');
    $stm = $con->prepare("update proces set  date_paiement= :date  where numproces= :id ")->execute([":id"=> $_GET['id'] , ":date"=>$date]);

}
echo "<script> window.location.replace('proces.php') </script>";


?>