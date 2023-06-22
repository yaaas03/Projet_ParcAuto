<?php

require("db.php");
if (isset($_GET['id'])) {
    $stm = $con->prepare("delete from visite_technique where numVT=?");
    $stm->execute([$_GET['id']]);
}
echo "<script> window.location.replace('visitetechnique.php') </script>";

?>