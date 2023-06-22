<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />


    <link rel="stylesheet" href="../../Style/Style_for_everything.css">
    <link rel="stylesheet" href="../../Style/Style_acceuil.css">

    <title>Modifier collaborateur</title>
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
<?php
require("db.php");
$id=$_GET["id"];
$stm=$con->prepare("select * from personne where id_personne=?");
$stm->execute([$id]);
$result=$stm->fetch();

?>
<main>
    <section>

        <body class="body">
        <div class="container">
            <div class="title">Modifier un collaborateur
                <button style="position: relative;left: 900px;background: #9c2323;font-size: xx-small;"><a  href="collaborateur.php"><i class='bx bx-x table_icon' ></i></a></button>
            </div>
            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details" style="color: black">Nom</span>
                            <input type="text" autocomplete="off" value="<?= $result['nom']?>" name="nom" style="color: #58555E" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Prenom</span>
                            <input type="text" autocomplete="off" value="<?= $result['prenom']?>" name="prenom" style="color: #58555E" placeholder="Enter your Prenom" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Numero de la carte national</span>
                            <input type="text" autocomplete="off" value="<?= $result['cin']?>" name="cin" style="color: #58555E" placeholder="Entrez votre cin" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Email</span>
                            <input type="text" autocomplete="off" value="<?= $result['email']?>" name="email" style="color: #58555E" placeholder="Entrez votre email" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Numero de telephone</span>
                            <input type="number" autocomplete="off" value="<?= $result['tel']?>" name="tel" style="color: #58555E" placeholder="Entrez votre numero " required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">adresse</span>
                            <input type="text" autocomplete="off" value="<?= $result['adresse']?>" name="adresse" style="color: #58555E" placeholder="Entrez votre adresse " required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Date de naissance</span>
                            <input type="date"  value="<?= $result['date_naissance']?>" name="date_naissance" style="color: #58555E" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Date d'engagement</span>
                            <input type="date" value="<?= $result['date_engagement']?>" name="date_engagement" style="color: #58555E"  required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Numero de cnss</span>
                            <input type="number" autocomplete="off" value="<?= $result['cnss']?>" name="cnss" style="color: #58555E" placeholder="Entrez votre N° cnss" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Service</span>
                            <input type="text" autocomplete="off" value="<?= $result['service']?>" name="service" style="color: #58555E" placeholder="Entrez votre service" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="modifier" name="modifier">
                    </div>
                </form>
            </div>
        </div>

        </body>


    </section>
</main>
<?php
    require("db.php");
    if (isset($_POST['modifier'])){
    $stm=$con->prepare("update personne set NOM=:NOM ,PRENOM=:PRENOM ,CIN=:CIN, TEL=:TEL,ADRESSE=:ADRESSE ,service=:service ,email=:email,cnss=:cnss,date_naissance=:date_naissance,date_engagement=:date_engagement where id_personne=:id");
    $stm->execute([
     ":id"=>$id,
    ":NOM"=>$_POST["nom"],
    ":PRENOM"=>$_POST["prenom"],
    ":CIN"=>$_POST["cin"],
    ":TEL"=>$_POST["tel"],
    ":ADRESSE"=>$_POST["adresse"],
    ":email"=>$_POST["email"],
    ":date_naissance"=>$_POST["date_naissance"],
    ":date_engagement"=>$_POST["date_engagement"],
    ":service"=>$_POST["service"],
    ":cnss"=>$_POST["cnss"],
    ]);
   echo "<script> window.location.replace('collaborateur.php') </script>";
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