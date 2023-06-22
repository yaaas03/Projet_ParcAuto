<?php
try {
    require 'db.php';
    if (isset($_POST['input'])){
        $input = $_POST['input'];

        $stm=$con->prepare("SELECT * FROM `personne` WHERE nom like'$input%' or prenom like '$input%' ");
        $stm->execute();
        $l=$stm->fetchAll();

        if (empty($l)) {
            echo "<div class='alert alert-dark' role='alert' style='position: absolute'>COLLABORATEUR NON TROUVE</div>";
        }else{


            foreach ($l as $ligne){

                echo "<tr>";
                echo "<td>".$ligne["id_personne"]."</td>";
                echo "<td>".$ligne["nom"]."  ".$ligne["prenom"]."</td>";
                echo "<td>".$ligne["cin"]."</td>";
                echo "<td>".$ligne["tel"]."</td>";
                echo "<td>".$ligne["email"]."</td>";
                echo "<td>".$ligne["cnss"]."</td>";
                echo "<td>".$ligne["service"]."</td>";
                echo "<td><div>".$ligne["adresse"]."</div></td>";
                echo "<td>".$ligne["date_naissance"]."</td>";
                echo "<td>".$ligne["date_engagement"]."</td>";
                echo '<td> <button><a  href="modifierp.php?id='.$ligne["id_personne"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["id_personne"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
                echo "</tr>";
            }
        }
    }
    else if ($_POST['input']==null) {

        $stm = $con->prepare("SELECT * FROM `personne` ");
        $stm->execute();
        $l=$stm->fetchAll();




            foreach ($l as $ligne){

                echo "<tr>";
                echo "<td>".$ligne["id_personne"]."</td>";
                echo "<td>".$ligne["nom"]."  ".$ligne["prenom"]."</td>";
                echo "<td>".$ligne["cin"]."</td>";
                echo "<td>".$ligne["tel"]."</td>";
                echo "<td>".$ligne["email"]."</td>";
                echo "<td>".$ligne["cnss"]."</td>";
                echo "<td>".$ligne["service"]."</td>";
                echo "<td><div>".$ligne["adresse"]."</div></td>";
                echo "<td>".$ligne["date_naissance"]."</td>";
                echo "<td>".$ligne["date_engagement"]."</td>";
                echo '<td> <button><a  href="modifierp.php?id='.$ligne["id_personne"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["id_personne"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
                echo "</tr>";
            }

    }
}catch (PDOException $e){
    echo $e;
}
?>
