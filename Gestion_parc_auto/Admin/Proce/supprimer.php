<?php

require("db.php");
if (isset($_GET['id'])) {
    $stm = $con->prepare("delete from proces where numproces=?");
    $stm->execute([$_GET['id']]);
}
echo "<script> window.location.replace('proces.php') </script>";

?>