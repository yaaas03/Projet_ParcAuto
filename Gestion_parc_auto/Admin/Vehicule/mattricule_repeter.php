<?php
try {
    require 'db.php';
    if (isset($_POST['input'])){
        $input = $_POST['input'];

        $stm=$con->prepare("Select immatriculation from vehicule where immatriculation = '$input'");
        $stm->execute();
        $l=$stm->fetchAll();

        if (!empty($l)) {
            echo " <i class='bx bxs-error'></i> mattricule existe deja";
        }
    }

}catch (PDOException $e){
    echo $e;
}
?>

