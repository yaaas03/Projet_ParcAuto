<?php
try {
    require 'db.php';
    if (isset($_POST['input'])){
        $input = $_POST['input'];

        $stm=$con->prepare("SELECT vt.*,immatriculation FROM visite_technique vt ,vehicule v  WHERE  v.immatriculation like '%$input%' and v.id_vehicule=vt.id_vehicule");
        $stm->execute();
        $l=$stm->fetchAll();

        if (empty($l)) {
            echo "<div class='alert alert-dark' role='alert' style='position: absolute'>visite technique introuvable</div>";
        }else{


            foreach ($l as $ligne){

                echo "<tr>";
                echo "<td>".$ligne["numVT"]."</td>";
                echo "<td>".$ligne["nature_visite"]."</td>";
                echo "<td>".$ligne["montant"]."dh</td>";
                echo "<td>".$ligne["date_visite"]." </td>";
                echo "<td>".$ligne["immatriculation"]."</td>";
                echo '<td> <button><a  href="modifier.php?id='.$ligne["numVT"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["numVT"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
                echo "</tr>";
            }
        }
    }
    else if ($_POST['input']==null) {

        $stm = $con->prepare("SELECT vt.*,immatriculation FROM visite_technique vt,vehicule v  WHERE v.id_vehicule=vt.id_vehicule");
        $stm->execute();
        $l=$stm->fetchAll();




        foreach ($l as $ligne){

            echo "<tr>";
            echo "<td>".$ligne["numVT"]."</td>";
            echo "<td>".$ligne["nature_visite"]."</td>";
            echo "<td>".$ligne["montant"]."dh</td>";
            echo "<td>".$ligne["date_visite"]." </td>";
            echo "<td>".$ligne["immatriculation"]."</td>";
            echo '<td> <button><a  href="modifier.php?id='.$ligne["numVT"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["numVT"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
            echo "</tr>";
        }

    }
}catch (PDOException $e){
    echo $e;
}
?>

