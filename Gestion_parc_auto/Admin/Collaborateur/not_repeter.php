<?php
try {
    require 'db.php';
    if (isset($_POST['input'])){
        $input = $_POST['input'];

        $stm=$con->prepare("Select cin from personne where cin = '$input'");
        $stm->execute();
        $l=$stm->fetchAll();

        if (!empty($l)) {
            echo " <i class='bx bxs-error'></i> cin existe deja";
        }
    }
    if (isset($_POST['email'])){
        $email = $_POST['email'];

        $stm=$con->prepare("Select email from personne where email = '$email'");
        $stm->execute();
        $l=$stm->fetchAll();

        if (!empty($l)) {
            echo " <i class='bx bxs-error'></i> email existe deja";
        }
    }
    if (isset($_POST['tel'])){
        $tel = $_POST['tel'];

        $stm=$con->prepare("Select tel from personne where tel = '$tel'");
        $stm->execute();
        $l=$stm->fetchAll();

        if (!empty($l)) {
            echo " <i class='bx bxs-error'></i> numero de télephone existe deja";
        }
    }
    if (isset($_POST['cnss'])){
        $cnss = $_POST['cnss'];

        $stm=$con->prepare("Select cnss from personne where cnss = '$cnss'");
        $stm->execute();
        $l=$stm->fetchAll();

        if (!empty($l)) {
            echo " <i class='bx bxs-error'></i> numero de cnss existe deja";
        }
    }

}catch (PDOException $e){
    echo $e;
}
?>


