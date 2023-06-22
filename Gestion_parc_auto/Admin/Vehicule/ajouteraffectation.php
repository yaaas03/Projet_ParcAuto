<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />

    <link rel="stylesheet" href="../../Style/Style_for_everything.css">
    <link rel="stylesheet" href="../../Style/Style_acceuil.css">
    <title>Ajouter affectation</title>
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

        <div class="container">
            <div class="title">Ajouter une affectation
                <button style="position: relative;left: 1370px;background: #9c2323;font-size: xx-small;"><a  href="affectervehicule.php"><i class='bx bx-x table_icon' ></i></a></button>
            </div>
            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details" style="color: black">collaborateur concerne<span style="color: red;margin-left: 9px;">*</span></span>
                            <select class="list_mat" name="id_personne" required>
                                <?php
                                require("db.php");
                                $stm = $con->prepare("SELECT id_personne, nom  FROM `personne` ORDER by rand()");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    echo "<option value=".$ligne["id_personne"]." >".$ligne["nom"]."</option>";
                                }
                                if (empty($l)){
                                    echo "<option disabled >Pas de collaborateur trouve</option>";
                                }
                                ?>

                            </select>

                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Vehicule concerne<span style="color: red;margin-left: 9px;">*</span></span>
                            <select class="list_mat" name="immatriculation" >
                                <?php
                                require("db.php");
                                $stm = $con->prepare("SELECT immatriculation , id_vehicule FROM vehicule  WHERE id_vehicule not in( SELECT id_vehicule FROM affectation_vehicule WHERE date_recuperation ='0000-00-00' ) ORDER by rand() ");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    if (empty($l)){
                                        echo "<option disabled >Tous les vehicules affecter</option>";
                                    }else {
                                        echo "<option value=" . $ligne["id_vehicule"] . ">" . $ligne["immatriculation"] . "</option>";
                                    }
                                }

                                ?>

                            </select>

                        </div>
                    </div>

                    <div class="button">
                        <input type="submit" value="Confirmer" name="Confirmer">
                    </div>
                </form>
            </div>
        </div>
        <?php
        require("db.php");
        if (isset($_POST['Confirmer'])){

            $date = date('Y-m-d ');
                $affectaion=$con->prepare("insert into affectation_vehicule(date_affectation ,id_personne,id_vehicule)
                              values(:date_affectation,:id_personne,:id_vehicule)");
                $affectaion->execute([
                    ":date_affectation"=>$date,
                    ":id_personne"=>$_POST["id_personne"],
                    ":id_vehicule"=>$_POST["immatriculation"],

                ]);

                $last_insert = $con->prepare("SELECT MAX( id_affectation ) FROM affectation_vehicule");
                $last_insert->execute([]);
                $id_affectation = $last_insert->fetch();


                $historique=$con->prepare("INSERT INTO `historique`(`id_affectation`, `id_vehicule`, `id_personne`, `date_affectation`) 
                                           VALUES (:id_affectation , :id_vehicule , :id_personne ,:date_affectation)");

                 $historique->execute([
                    ":date_affectation"=>$date,
                    ":id_personne"=>$_POST["id_personne"],
                    ":id_vehicule"=>$_POST["immatriculation"],
                    ":id_affectation"=>$id_affectation[0]
                ]);

                echo "<script> window.location.replace('affectervehicule.php') </script>";

        }

        ?>
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
</script>
</body>
</html>