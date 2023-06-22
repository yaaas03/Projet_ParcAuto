<?php

require("db.php");
if (isset($_GET['id'])) {
    $stm = $con->prepare("delete from vehicule where id_vehicule=?");
    $stm->execute([$_GET['id']]);
}
echo "<script> window.location.replace('vehicule.php') </script>";

?>