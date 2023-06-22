<?php
try {
    require 'db.php';
    if (isset($_POST['input'])){
        $input = $_POST['input'];

        $stm=$con->prepare("SELECT pr.*,nom , prenom FROM proces pr ,personne p WHERE p.nom like '%$input%' and p.id_personne=pr.id_personne");
        $stm->execute();
        $l=$stm->fetchAll();

        if (empty($l)) {
            echo "<div class='alert alert-dark' role='alert' style='position: absolute'>Proce indefini</div>";
        }else{


            foreach ($l as $ligne){
                echo "<td>".$ligne["numproces"]."</td>";
                echo "<td>".$ligne["nature"]."</td>";
                echo "<td>".$ligne["description"]."</td>";
                echo "<td>".$ligne["montant"]." dh</td>";
                echo "<td>".$ligne["date_paiement"]."</td>";
                echo "<td>".$ligne["nom"]." ".$ligne["prenom"]."</td>";
                echo '<td> <button><a  href="modifier.php?id='.$ligne["numproces"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["numproces"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
                echo "</tr>";
            }
        }
    }
    else if ($_POST['input']==null) {

        $stm = $con->prepare("SELECT pr.*,nom, prenom FROM proces pr ,personne p WHERE  p.id_personne=pr.id_personne");
        $stm->execute();
        $l=$stm->fetchAll();
        foreach ($l as $ligne){

            echo "<td>".$ligne["numproces"]."</td>";
            echo "<td>".$ligne["nature"]."</td>";
            echo "<td>".$ligne["description"]."</td>";
            echo "<td>".$ligne["montant"]." dh</td>";
            echo "<td>".$ligne["date_paiement"]."</td>";
            echo "<td>".$ligne["nom"]." ".$ligne["prenom"]."</td>";
            echo '<td> <button><a  href="modifier.php?id='.$ligne["numproces"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["numproces"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
            echo "</tr>";
        }

    }
}catch (PDOException $e){
    echo $e;
}
?>
