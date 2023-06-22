<?php

require("db.php");
if (isset($_GET['id'])) {
    $stm = $con->prepare("delete from facture where id_Facture=?");
    $stm->execute([$_GET['id']]);
}
header('Location:'.$_SERVER['HTTP_REFERER']);
?>