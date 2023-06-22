<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />
    <link rel="stylesheet" href="../../Style/Style_for_everything.css">
    <link rel="stylesheet" href="../../Style/Style_acceuil.css">

    <title>Ajouter vehicule</title>
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

            <div class="title">Ajout d'un vehicule
                <button style="position: relative;left: 1430px;background: #9c2323;font-size: xx-small;"><a  href="http://localhost/Gestion_parc_auto/Admin/Vehicule/vehicule.php"><i class='bx bx-x table_icon' ></i></a></button>

            </div>
            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Immatriculation<span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" autocomplete="off" style="border-radius: 5px; border: 1px solid #8b8181 ;border-bottom-width: 2px;" name="immat" id="input_matt" autocomplete="false" required>
                            <span id="message" style="color:red"></span>
                        </div>
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Date circulation<span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="date" name="Date_circulation"  style="color: #58555E" required>
                        </div>
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Catégorie<span style="color: red;margin-left: 9px;">*</span></span>
                            <select name="categorie" name="categorie" autocomplete="off" style=" width: 100%!important;" required>
<<<<<<< HEAD
                                <option>Voiture Avec remorque</option>
=======
                                <option selected disabled>Categorie</option>
                                <option>Voiture</option>
>>>>>>> 7d04f13c91869a854b50fac479a1acf72d72d84d
                                <option>Minibus</option>
                                <option>Camionnette</option>
                                <option>Camping car</option>
                                <option>Quatricycle a moteur</option>
                                <option>Motocyclette</option>
                                <option>Moto</option>
                                <option>Appareils agricoltes ou forstiers</option>
                                <option>Camion</option>
                                <option>Camion remorque</option>
                                <option>Bus</option>
                                <option>Voiture avec remorque</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Modèle<span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="month" autocomplete="false" name="model" required>

                        </div>
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Type<span style="color: red;margin-left: 9px;">*</span></span>
                            <select name="type" nonce="type" autocomplete="off" style=" width: 100%!important;" required>
                                <option>Diesel</option>
                                <option>Essence</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details"  >&nbsp;&nbsp;Marque <span style="color: red;margin-left: 9px;">*</span></span>
                            <select  style=" width: 100%!important;" name="marque"required>
                                <option value="Renault">Renault</option>
                                <option value="BMW">BMW</option>
                                <option value="Citroen">Citroen</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Opel">Opel</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Ford">Ford</option>
                                <option value="Audi">Audi</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Volvo">Volvo</option>
                                <option value="DS">DS</option>
                                <option value="Mercedes">Mercedes</option>

                            </select>
                        </div>


                        <div class="input-box">

                            <span class="details">Compagnie assurance<span style="color: red;margin-left: 9px;">*</span></span>
                            <select type="text" autocomplete="off" name="Compagnie" required >
                            <option value="Saham-Assurance">Saham Assurance</option>
                            <option value="Wafa-Assurance">Wafa Assurance</option>
                            <option value="Axa-Assurance">Axa Assurance</option>
                            <option value="RMA">RMA</option>
                            <option value="AtlantaSanad">AtlantaSanad</option>
                            <option value="MAMDA">MAMDA</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Date d'achat<span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="date" name="date_achat"  style="color: #58555E" required>
                        </div>

                    </div>

                    <div class="button">
                        <input type="submit" value="Confirmer" name="confirmer">
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
<?php

require("db.php");

    if (isset($_POST['confirmer'])) {
        try {


                $datecirculation = $_POST["Date_circulation"] ;
                $dateAchat =$_POST["date_achat"];
                $model=$_POST["model"];
                $date = date('Y-m-d ');
                if ($date >= $datecirculation and $date >= $dateAchat and  $model<=$datecirculation ){


                    $stm = $con->prepare("insert into vehicule(immatriculation,categorie,model,type,marque,Date_circulation,Date_visitepro,date_achat,Compagnie)
                                            values(:immatriculation,:categorie,:model, :typev ,:marque, :Date_circulation,:Date_visitepro,:date_achat,:compagnie)");
                    $stm->execute([
                        ":immatriculation" => $_POST["immat"],
                        ":categorie" => $_POST["categorie"],
                        ":model" =>  $model,
                        ":typev" => $_POST["type"],
                        ":marque" => $_POST["marque"],
                        ":Date_circulation" => $datecirculation ,
                        ":Date_visitepro" => date('Y-m-d', strtotime($datecirculation.' + 5 years')),
                        ":date_achat" => $_POST["date_achat"],
                        ":compagnie" => $_POST["Compagnie"],

                    ]);




                echo "<script> window.location.replace('vehicule.php') </script>";
                }
            else{

                echo "<script> alert('Erreur de saisie pour les dates') </script>";

            }
        }
        catch (Exception $e ){
            echo 'erreeeur';
        }
    }
?>

<!--========== MAIN JS ==========-->
<!--========== Traitement AJAX ==========-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#input_matt").keyup(function() {
            var input = $(this).val();
            if (input != "") {
                $.ajax({
                    url: "mattricule_repeter.php",
                    method: "POST",

                    data: {
                        input: input
                    },

                    success: function(data) {
                        $("#message").html(data);
                    },
                });
            }
        });
    });
</script>
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