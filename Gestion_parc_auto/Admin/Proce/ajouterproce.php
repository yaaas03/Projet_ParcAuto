<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />

    <link rel="stylesheet" href="../../Style/Style_for_everything.css">

    <link rel="stylesheet" href="../../Style/Style_acceuil.css">

    <title>Ajouter procès</title>
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
        <body class="body">
        <div class="container" style="margin-top: 76px;">
            <div class="title">Ajouter un Procès
                <button style="position: relative;left: 1230px;background: #9c2323;font-size: xx-small;"><a  href="proces.php"><i class='bx bx-x table_icon' ></i></a></button>
            </div>
            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details" style="color: black">   &nbsp;&nbsp;Nature du proces <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" autocomplete="off" name="nature" style="color: #58555E" placeholder="Entrez la nature " required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">   &nbsp;&nbsp;Montant <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="number" autocomplete="off" name="montant" style="color: #58555E" placeholder="Entrez le montant"  required>
                        </div>
                    </div>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details" style="color: black">Date paiement <span style="color: red;margin-left: 9px;"></span></span>
                            <input type="date"  name="date_paiement" style="color: #58555E" >
                        </div>


                            <div class="input-box">
                                <span class="details" style="color: black">Collaborateur concerne <span style="color: red;margin-left: 9px;">*</span></span>
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
                                <span class="details" style="color: black">Description du proce  <span style="color: red;margin-left: 9px;">*</span></span>
                                <textarea type="text" autocomplete="off" name="description" style="color: #58555E; width: 850px;border-radius: 5px; border-bottom-width: 2px;" placeholder="Entrez la description du proces"  rows="3" cols="45" required></textarea>
                            </div>


                    </div>


                    <div class="button">
                        <input type="submit" value="confirmer" name="confirmer">
                    </div>
                </form>
            </div>
        </div>

        </body>

    </section>
</main>
<?php
require("db.php");
if (isset($_POST['confirmer'])){


    $stm=$con->prepare("insert into proces(NATURE,description,montant,date_paiement,id_personne)
                              values(:NATURE,:description,:montant,:date_paiement,:id_personne)");
    $stm->execute([
        ":NATURE"=>$_POST["nature"],
        ":description"=>$_POST["description"],
        ":montant"=>$_POST["montant"],
        ":date_paiement"=>$_POST["date_paiement"],
        ":id_personne"=>$_POST["id_personne"],
    ]);
    echo "<script> window.location.replace('proces.php') </script>";
}


?>
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