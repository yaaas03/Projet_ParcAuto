<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../media/logo-sofa.png" />



    <link rel="stylesheet" href="../Style/Style_acceuil.css">
    <link rel="stylesheet" href="../Style/test.css">

    <title>Acceuil</title>
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

           <strong><label style="    font-size: x-large;font-weight: var(--font-medium);color: black;">PARC AUTOMOBILE</label></strong>
        <a href="http://localhost/Gestion_parc_auto/Admin/Acceuil.php"> <img src="../media/logo-sofa.png" alt="" class="header__img"></a>
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

        <body>
        <div class="container">
            <div class="navigation">
                <div class="cardBox">
                    <div class="card">

                        <div>
                            <div class="numbers">
                                <?php
                                require("db.php");
                                $stm=$con->prepare("select  COUNT(id_personne) as cpt from personne order by cpt DESC LIMIT 1");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    echo "".$ligne["cpt"]." ";

                                }

                                ?>
                            </div>
                            <div class="cardName">Collaborateurs</div>

                        </div>

                        <div class="iconBx">
                            <i class='bx bx-user' ></i>

                        </div>
                        </a>
                    </div>

                    <div class="card">

                        <div>
                            <div class="numbers"><?php
                                require("db.php");
                                $stm=$con->prepare("select  COUNT(id_vehicule) as cpt from vehicule order by cpt DESC LIMIT 1");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    echo "".$ligne["cpt"]." ";

                                }

                                ?></div>
                            <div class="cardName">Vehicules</div>
                        </div>

                        <div class="iconBx">
                            <i class='bx bx-car'></i>
                        </div>
                        </a>
                    </div>
                    <div class="card">

                            <div>
                                <div class="numbers"><?php
                                    require("db.php");
                                    $stm=$con->prepare("select  COUNT(id_Facture) as cpt from facture order by cpt DESC LIMIT 1");
                                    $stm->execute();
                                    $l=$stm->fetchAll();
                                    foreach ($l as $ligne){
                                        echo "".$ligne["cpt"]." ";

                                    }

                                    ?></div>
                                <div class="cardName">Factures</div>
                            </div>

                            <div class="iconBx">
                                <i class='bx bx-detail'></i>
                            </div>
                        </a>
                    </div>
                    <div class="card">

                        <div>
                            <div class="numbers">
                                <?php
                                require("db.php");
                                $stm=$con->prepare("select  COUNT(numVT) as cpt from visite_technique order by cpt DESC LIMIT 1");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    echo "".$ligne["cpt"]." ";

                                }

                                ?>
                            </div>
                            <div class="cardName">Visites techniques</div>
                        </div>

                        <div class="iconBx">
                            <i class='bx bx-wrench'></i>
                        </div>
                        </a>
                    </div>

                    <div class="card">

                        <div>
                            <div class="numbers">
                                <?php
                                require("db.php");
                                $stm=$con->prepare("select  COUNT(numproces) as cpt from proces order by cpt DESC");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    echo "".$ligne["cpt"]." ";

                                }

                                ?></div>
                            <div class="cardName">Procès</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                        </a>
                    </div>
                </div>

                <!-- ================ Order Details List ================= -->
                <?php
                $stm=$con->prepare("SELECT * FROM vehicule WHERE Date_visitepro BETWEEN DATE_ADD(CURDATE(), INTERVAL -30 DAY) and DATE_ADD(CURDATE(), INTERVAL 30 DAY)");
                $stm->execute();
                $visite_tech=$stm->fetchAll();
                ?>
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Statut visites techniques</h2>
                        </div>

                        <table >
                            <thead >

                            <tr>
                                <td>Immatriculation</td>
                                <td>Date visite technique</td>
                                <td>Catégorie</td>
                                <td>Temps restant</td>
                            </tr>
                            </thead>

                            <tbody >
                            <?php
                            foreach ($visite_tech as $v){
                                $date1=date_create(date('Y-m-d'));
                                $date2=date_create($v["Date_visitepro"]);
                                $diff=date_diff($date1,$date2);
                                $resultat =$diff->format("%a");

                                echo "<tr>";
                                echo "<td>".$v["immatriculation"]."</td>";
                                echo "<td>".$v["Date_visitepro"]."</td>";
                                echo "<td>".$v["categorie"]."</td>";
                                if ($date1>$date2 and $resultat!=0){
                                echo "<td><span class='status return'>J  +$resultat </span></td>";}

                                elseif ($resultat<=30 and $resultat!=0){
                                   echo "<td><span class='status pending'>J  -$resultat </span></td>";}
                                elseif ($resultat==0){
                                    echo "<td><span class='status delivered'>Aujourd'hui</span></td>";
                                }
                                echo "<tr>";

                            }
                            ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- ================= New Customers ================ -->
                    <?php
                    include('db.php');
                    $stf=$con->prepare("SELECT p.*,nom , prenom FROM proces p ,personne pr where p.id_personne=pr.id_personne  ");
                    $stf->execute();
                    $proces=$stf->fetchAll();
                    ?>

                    <div class="recentCustomers" style="width: 568px;">
                        <div class="cardHeader">
                            <h2>Statut procès</h2>
                        </div>
                        <div style="margin-top: 173px;">
                            <table >
                                <thead >
                                <td></td>
                                <td>Collaborateur </td>
                                <td>Nature</td>
                                <td>État</td>
                                </thead>

                                <tbody >
                                <?php
                                foreach ($proces as $v){


                                    echo "<tr>";
                                   echo "<td ><div style='font-size: 39px;' ><i class='bx bxs-user-circle'></i></div></td>";
                                    echo "<td style='width: 207px;'>&nbsp;&nbsp;".$v["nom"]." ".$v["prenom"]."</td>";
                                    echo "<td style='width: 207px;'>".$v["nature"]."</td>";

                                    if ($v["date_paiement"] == '0000-00-00') {
                                        echo "<td style='position: relative;' ><span class='status return'>non payée</span></td>";
                                    } else {
                                        echo "<td style='position: relative; '><span class='status delivered'>payée</span></td>";
                                    }
                                    echo "<tr>";

                                }
                                ?>

                                </tbody>
                            </table>

                        </div>
                    </div>


        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
    </section>
</main>

<!--========== MAIN JS ==========-->
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

    let list = document.querySelectorAll(".navigation li");

    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
    }

    list.forEach((item) => item.addEventListener("mouseover", activeLink));

    // Menu Toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

</script>

</body>
</html>