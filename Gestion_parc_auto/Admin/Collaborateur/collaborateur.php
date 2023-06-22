<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />



    <link rel="stylesheet" href="../../Style/Style_acceuil.css">
    <link rel="stylesheet" href="../../Style/Style_for_everything.css">

    <title>Collaborateurs</title>
</head>
<body>

<?php
session_start();

if($_SESSION['prenom']==null && $_SESSION['nom']==null && $_SESSION['id_admin']==null ){
    header('location:Connexion.html');
}
?>

<header class="header">
    <div class="header__container">


        <label class="header__logo">SOFA Maroc</label>
        <a href="http://localhost/Gestion_parc_auto/Admin/Acceuil.php"> <img src="../../media/logo-sofa.png" alt="" class="header__img"></a>

        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="#" class="nav__link nav__logo">
                <i class='bx bxs-disc nav__icon' ></i>
                <span class="nav__logo-name">
                    <?php
                    echo $_SESSION['nom'].' '. $_SESSION['prenom']
                    ?>
                </span>
            </a>
            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Menu</h3>

                    <a href="http://localhost/Gestion_parc_auto/Admin/Acceuil.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Home</span>
                    </a>

                    <div class="nav__dropdown">
                        <a href="http://localhost/Gestion_parc_auto/Admin/Vehicule/vehicule.php" class="nav__link">
                            <i class='bx bx-car'></i>&nbsp;&nbsp;&nbsp;
                            <span class="nav__name">Vehicule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="http://localhost/Gestion_parc_auto/Admin/Vehicule/ajoutervehicule.php" class="nav__dropdown-item">Ajouter</a>
                                <a href="http://localhost/Gestion_parc_auto/Admin/Vehicule/affectervehicule.php" class="nav__dropdown-item">Affectation de vehicule</a>
                            </div>
                        </div>
                    </div>

                    <div class="nav__dropdown">
                        <a href="http://localhost/Gestion_parc_auto/Admin/Collaborateur/collaborateur.php" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Collaborateur</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="http://localhost/Gestion_parc_auto/Admin/Collaborateur/ajoutercollaborateur.php" class="nav__dropdown-item">Ajouter</a>

                            </div>
                        </div>
                    </div>


                    <div class="nav__dropdown">
                        <a href="http://localhost/Gestion_parc_auto/Admin/Proce/proces.php" class="nav__link">
                            <i class='bx bx-notepad'></i>&nbsp;&nbsp;&nbsp;
                            <span class="nav__name">Procès</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="http://localhost/Gestion_parc_auto/Admin/Proce/ajouterproce.php" class="nav__dropdown-item">Ajouter</a>

                            </div>
                        </div>
                    </div>


                    <div class="nav__dropdown">
                        <a href="http://localhost/Gestion_parc_auto/Admin/Visite_technique/visitetechnique.php" class="nav__link">
                            <i class='bx bx-wrench'></i>&nbsp;&nbsp;&nbsp;
                            <span class="nav__name">Visite technique</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="http://localhost/Gestion_parc_auto/Admin/Visite_technique/ajoutervisite.php" class="nav__dropdown-item">Ajouter</a>

                            </div>
                        </div>
                    </div>


                    <div class="nav__dropdown">
                        <a class="nav__link">
                            <i class='bx bx-bar-chart-square'></i>&nbsp;&nbsp;&nbsp;
                            <span class="nav__name">Charge vehicule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="http://localhost/Gestion_parc_auto/Admin/Charge_vehicule/fixes.php" class="nav__dropdown-item">Charges fixes</a>
                                <a href="http://localhost/Gestion_parc_auto/Admin/Charge_vehicule/divers.php" class="nav__dropdown-item">Charges divers</a>
                                <a href="http://localhost/Gestion_parc_auto/Admin/Charge_vehicule/facture.php" class="nav__dropdown-item">Saisie facture</a>
                            </div>
                        </div>
                    </div>

                </div>



                <a href="http://localhost/Gestion_parc_auto/Admin/deconnection.php" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
    </nav>
</div>

<!--========== CONTENTS ==========-->

<main>
    <section>

        <div class=" row back_absolute rounded" >
            <div  style="margin-top:27px;">
                <div class="table_header rounded-top" style="background: linear-gradient(135deg,#333333,#f80000);">
                    <h3 style="color:#ffffff ">Collaborateurs</h3>
                    <div> <input  id="live_search" style="background-color:#ffffff" placeholder="Recherche"  /> <button class="add_new"><a style="color: white" href="http://localhost/Gestion_parc_auto/Admin/Collaborateur/ajoutercollaborateur.php">+ Add New</a></button> </div>
                </div>
                <div class="table_section " style="background-color: white;">
                    <table>
                        <thead >
                        <tr>
                            <th style="width: 12px;">N°</th>
                            <th>Nom complet</th>
                            <th>N° cin</th>
                            <th>N° tel</th>
                            <th>Email</th>
                            <th>N° cnss</th>
                            <th>Service</th>
                            <th>Adresse</th>
                            <th>Date naissance</th>
                            <th>Date engagement </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="body">
                        <?php
                        require("db.php");
                        $stm = $con->prepare("select * from personne");
                        $stm->execute();
                        $l=$stm->fetchAll();
                        foreach ($l as $ligne){

                            echo "<tr>";
                            echo "<td>".$ligne["id_personne"]."</td>";
                            echo "<td>".$ligne["nom"]."  ".$ligne["prenom"]."</td>";
                            echo "<td>".$ligne["cin"]."</td>";
                            echo "<td>+212".$ligne["tel"]."</td>";
                            echo "<td>".$ligne["email"]."</td>";
                            echo "<td>".$ligne["cnss"]."</td>";
                            echo "<td>".$ligne["service"]."</td>";
                            echo "<td><div>".$ligne["adresse"]."</div></td>";
                            echo "<td>".$ligne["date_naissance"]."</td>";
                            echo "<td>".$ligne["date_engagement"]."</td>";
                            echo '<td> <button><a  href="modifier.php?id='.$ligne["id_personne"].'"><i class="bx bx-edit-alt table_icon"></i></a></button> <button><a href="supprimer.php?id='.$ligne["id_personne"].'"><i class="bx bx-trash table_icon" ></i></a></button> </td>';
                            echo "</tr>";
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </section>
</main>

<!--========== MAIN JS ==========-->
<!--========== Traitement AJAX ==========-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#live_search").keyup(function() {
            var input = $(this).val();
            if (input != "") {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        input: input
                    },

                    success: function(data) {
                        $("#body").html(data);
                    }
                });
            } else if (input == "") {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        input: input
                    },

                    success: function(data) {
                        $("#body").html(data);
                    }
                });
            }


        });
    });
</script>

<!--========== Fin traitement ==========-->
<script type="javascript">
    const showMenu = (headerToggle, navbarId) =>{
        const toggleBtn = document.getElementById(headerToggle),
            nav = document.getElementById(navbarId)

        // Validate that variables exist
        if(headerToggle && navbarId){
            toggleBtn.addEventListener('click', ()=>{
                // We add the show-menu class to the div tag with the nav__menu class
                nav.classList.toggle('show-menu')
                // change icon
                toggleBtn.classList.toggle('bx-x')
            })
        }
    }
    showMenu('header-toggle','navbar')

    /*==================== LINK ACTIVE ====================*/
    const linkColor = document.querySelectorAll('.nav__link')

    function colorLink(){
        linkColor.forEach(l => l.classList.remove('active'))
        this.classList.add('active')
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink))
</script>
</body>
</html>