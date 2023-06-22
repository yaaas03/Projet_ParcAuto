<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />


    <link rel="stylesheet" href="../../Style/Style_for_everything.css">
    <link rel="stylesheet" href="../../Style/Style_acceuil.css">

    <title>Modifier vehicule</title>
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
                            <span class="nav__name">Procé</span>
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
$stm= $con->prepare("select * from vehicule where id_vehicule=?");
$stm->execute([$id]);
$result=$stm->fetch();

?>
<main>
    <section>

        <div class="container" >

            <div class="title">modification d'un vehicule
                <button style="position: relative;left: 1090px;background: #9c2323;font-size: xx-small;"><a  href="vehicule.php"><i class='bx bx-x table_icon' ></i></a></button>
            </div>

            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Immatriculation</span>
                            <input type="text" value="<?= $result['immatriculation']?>" style="border-radius:5px; border:1px solid #8b8181 ;border-bottom-width: 2px;" name="immat" readonly autocomplete="false">
                        </div>
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Catégorie</span>

                            <select name="categorie" autocomplete="off" name="Categorie"  style=" width: 100%!important;">
                                <option selected disabled ><?= $result['categorie']?></option>
                                <option>Voiture Avec remorque</option>
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
                                <option>Car</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Modèle</span>
                            <input type="month" autocomplete="off" value="<?=date($result['model'])?>-01"  name="model" required/>

                        </div>
                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Type</span>

                            <select name="type" autocomplete="off" nonce="type" style=" width: 100%!important;">
                                <option selected disabled><?= $result['type']?></option>
                                <option>Diesel</option>
                                <option>Essence</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details"  >&nbsp;&nbsp;Marque</span>

                            <select style=" width: 100%!important;" autocomplete="off" name="marque">
                                <option selected disabled><?= $result['marque']?></option>
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
                            <span class="details">&nbsp;&nbsp;Date circulation</span>
                            <input type="date"  value="<?= $result['Date_circulation']?>"  name="Date_circulation"   style="border-radius: 5px; border: 1px solid #8b8181 ;border-bottom-width: 2px;" required>
                        </div>

                        <div class="input-box">
                            <span class="details">&nbsp;&nbsp;Date d'achat</span>
                            <input type="date"  value="<?= $result['date_achat']?>"  name="date_achat"   style="border-radius: 5px; border: 1px solid #8b8181 ;border-bottom-width: 2px;" required>
                        </div>
                        <div class="input-box">

                            <span  class="details">Compagnie assurance</span>

                            <select  type="text" autocomplete="off" name="Compagnie"  required>
                                <option  selected><?= $result['Compagnie']?></option>
                                <option value="Saham-Assurance">Saham Assurance</option>
                                <option value="Wafa-Assurance">Wafa Assurance</option>
                                <option value="Axa-Assurance">Axa Assurance</option>
                                <option value="RMA">RMA</option>
                                <option value="AtlantaSanad">AtlantaSanad</option>
                                <option value="MAMDA">MAMDA</option>
                            </select>
                        </div>


                    </div>

                    <div class="button">
                        <input type="submit" value="modifier" name="modifier">
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
<?php



require("db.php");


    if (isset($_POST['modifier'])) {
        $date = date('Y-m-d ');
        if (isset($_POST["categorie"])){
        if($_POST["categorie"]!=$result['categorie'] or !empty($_POST["categorie"])){
            $stm = $con->prepare("update vehicule set categorie=:categorie where id_vehicule=:id");
            $stm->execute([
                ":id" => $id,
                ":categorie" => $_POST["categorie"]
            ]);

        }}
    if (isset($_POST["Date_circulation"])){
        if( $date >= $_POST["Date_circulation"] and $_POST["Date_circulation"]!=$result['Date_circulation'] or !empty($_POST["Date_circulation"])){
            $stm = $con->prepare("update vehicule set Date_circulation=:Date_circulation where id_vehicule=:id");
            $stm->execute([
                ":id" => $id,
                ":Date_circulation" => $_POST["Date_circulation"],
            ]);
        }}
         if (isset($_POST["model"])){
            if ($_POST["model"] != $result['model'] or !empty($_POST["model"])) {
                $stm = $con->prepare("update vehicule set model=:model  where id_vehicule=:id");

                $stm->execute([
                    ":model" => $_POST["model"],
                    ":id" => $id
                    ]
                );

            }}
        if (isset($_POST["type"])){
            if ($_POST["type"] != $result['type'] or !empty($_POST["type"])) {
                $stm = $con->prepare("update vehicule set type=:type where id_vehicule=:id");
                $stm->execute([
                    ":type" => $_POST["type"],
                    ":id" => $id
                ]
                );

            }}

            if (isset($_POST["marque"])){
            if ($_POST["marque"] != $result['marque'] or !empty($_POST["marque"])) {
                $stm = $con->prepare("update vehicule  set marque=:marque where id_vehicule=:id");

                $stm->execute([
                    ":marque" => $_POST["marque"],
                    ":id" => $id
                ]);

            }}
        if (isset($_POST["Date_visitepro"])){
            if ($_POST["Date_visitepro"] != $result['Date_visitepro'] or !empty($_POST["Date_visitepro"])) {
                $stm = $con->prepare("update vehicule set Date_visitepro=:Date_visitepro  where id_vehicule=:id");
                $stm->execute([
                    ":Date_visitepro" => date('Y-m-d', strtotime( $_POST["Date_circulation"]. ' + 5 years')),
                    ":id" => $id]);

            }}
        if (isset($_POST["compagnie"])){
            if ($_POST["compagnie"] != $result['compagnie'] or !empty($_POST["compagnie"])) {
                $stm = $con->prepare("update vehicule compagnie=:compagnie  where id_vehicule=:id");

                $stm->execute([
                    ":compagnie" => $_POST["Compagnie"],
                    ":id" => $id
                ]
                );

            }}

        if (isset($_POST["date_achat"])) {
            if ($date >= $_POST["date_achat"] and $_POST["date_achat"] != $result['date_achat'] and !empty($_POST["date_achat"])) {
                $stm = $con->prepare("update vehicule set date_achat=:date_achat where id_vehicule=:id");
                $stm->execute([
                    ":date_achat" => $_POST["date_achat"],
                    ":id" => $id]);

            }}

            echo "<script> window.location.replace('vehicule.php') </script>";

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