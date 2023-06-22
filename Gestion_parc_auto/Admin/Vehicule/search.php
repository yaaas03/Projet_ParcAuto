<?php
try {
    require 'db.php';
    if (isset($_POST['input'])){
        $input = $_POST['input'];

        $stm=$con->prepare("SELECT av.*,immatriculation,nom FROM affectation_vehicule av ,vehicule v, personne p WHERE  v.immatriculation like '%$input%' and v.id_vehicule=av.id_vehicule and p.id_personne=av.id_personne");
        $stm->execute();
        $l=$stm->fetchAll();

        if (empty($l)) {
            echo "<div class='alert alert-dark' role='alert' style='position: absolute'>visite technique introuvable</div>";
        }else{


            foreach ($l as $ligne){

                echo "<tr>";
                echo "<td>".$ligne["date_affectation"]."</td>";
                echo "<td>".$ligne["date_recuperation"]."</td>";
                echo "<th>".$ligne["nom"]."</th>";
                echo "<th>".$ligne["immatriculation"]."</th>";
                echo '<td></button> <button><a href="supprimer.php?id='.$ligne["id_personne"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
                echo "</tr>";
            }
        }
    }
    else if ($_POST['input']==null) {

        $stm = $con->prepare("SELECT av.*,immatriculation FROM affectation_vehicule av,vehicule v, personne p  WHERE v.id_vehicule=av.id_vehicule and p.id_personne=av.id_personne");
        $stm->execute();
        $l=$stm->fetchAll();




        foreach ($l as $ligne){

            echo "<tr>";
            echo "<td>".$ligne["date_affectation"]."</td>";
            echo "<td>".$ligne["date_recuperation"]."</td>";
            echo "<th>".$ligne["nom"]."</th>";
            echo "<th>".$ligne["immatriculation"]."</th>";
            echo '<td></button> <button><a href="supprimer.php?id='.$ligne["id_personne"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
            echo "</tr>";
        }

    }
}catch (PDOException $e){
    echo $e;
}
?>


