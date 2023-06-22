<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=960px">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/png" href="../../media/logo-sofa.png" />



    <link rel="stylesheet" href="../../Style/Style_acceuil.css">
    <link rel="stylesheet" href="../../Style/Style_for_everything.css">

    <title>Facture</title>
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
                                <a href="http://localhost/Gestion_parc_auto/Admin/Charge_vehicule/fixes.php" class="nav__dropdown-item">Charges Fixes</a>
                                <a href="http://localhost/Gestion_parc_auto/Admin/Charge_vehicule/divers.php" class="nav__dropdown-item">Charges Divers</a>
                                <a href="http://localhost/Gestion_parc_auto/Admin/Charge_vehicule/facture.php" class="nav__dropdown-item">Facture</a>
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
            <div class="title">Facturiser vos charges
                <button style="position: relative;left: 1370px;background: #9c2323;font-size: xx-small;"><a  href="../Acceuil.php"><i class='bx bx-x table_icon' ></i></a></button></div>
            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details" style="color: black">Type charge<span style="color: red;margin-left: 9px;">*</span></span>
                            <select name="type_charge" id="list" onchange="getSelectValue();" style=" width: 100%!important;">
                                <option value="1">Fixes</option>
                                <option value="2">Divers</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">   &nbsp;&nbsp;Prix hors taxe<span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="number" onkeyup="calcule_total()" id="ht" autocomplete="off" name="prix_ht" style="color: #58555E" placeholder="Entrez le montant"  required>

                        </div>

                        <div class="input-box">
                            <span class="details" style="color: black">Vehicule concerne <span style="color: red;margin-left: 9px;">*</span></span>
                            <select class="list_mat" name="immatriculation" >
                                <?php
                                require("db.php");

                                $stm = $con->prepare("SELECT immatriculation ,id_vehicule FROM vehicule");
                                $stm->execute();
                                $l=$stm->fetchAll();
                                foreach ($l as $ligne){
                                    echo "<option value=".$ligne["id_vehicule"].">".$ligne["immatriculation"]."</option>";
                                }
                                if (empty($l)){
                                    echo "<option disabled >Tous les vehicules affecter</option>";
                                }
                                ?>

                            </select>

                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">TVA<span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="number"   onkeyup="calcule_total()" id="tva" autocomplete="off" name="TVA" style="color: #58555E" required>
                        </div>

                    </div>

                    <div class="user-details">
                        <div class="input-box" id="content">

                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">TTC</span>
                            <input type="number"  id="total"  autocomplete="off" name="total" style="color: #58555E" required readonly/>


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
    $total=$_POST["prix_ht"]+(($_POST["prix_ht"]*$_POST["TVA"])/100);
    echo "<script> console.log($total]) </script>";
    $stm=$con->prepare("INSERT INTO `facture`(`date_facture`, `total`, `TVA`, `prix_ht`, `nature_charge`, `numcharge`, `id_vehicule`)
                              VALUES (:date_facture,:total,:TVA,:prix_ht,:nature_charge,:numcharge,:id_vehicule)");
    $stm->execute([
        ":date_facture"=>date('Y-m-d '),
        ":TVA"=>$_POST["TVA"],
        ":total"=>$total,
        ":prix_ht"=>$_POST["prix_ht"],
        ":nature_charge"=>$_POST["nature_charge"],
        ":numcharge"=>$_POST["type_charge"],
        ":id_vehicule"=>$_POST["immatriculation"],
    ]);
    if ($_POST["type_charge"]==1){
        echo "<script> window.location.replace('fixes.php') </script>";
    }else{
        echo "<script> window.location.replace('divers.php') </script>";
    }



}


?>
<!--========== MAIN JS ==========-->
<script>

    function getSelectValue() {
        var selectedValue = document.getElementById("list").value;
        console.log(selectedValue);
        var htmlContent = '';
        var targetDiv = document.getElementById('content');

        switch (selectedValue) {
            case '1': {
                htmlContent = ' <span class="details" style="color: black" >Nature charge <span style="color: red;margin-left: 9px;">*</span></span><select name="nature_charge"   style=" width: 100%!important;"> <option>Assurance</option> <option>Vignette</option> </select>';
                break;
            }
            case '2': {
                htmlContent = '<span class="details" style="color: black">Nature charge <span style="color: red;margin-left: 9px;">*</span></span><input name="nature_charge"  type="text"  style=" color: #58555E"/>';
                break;
            }
        }
        targetDiv.innerHTML = htmlContent;

    }
    getSelectValue()
    function calcule_total(){
        let tva = document.getElementById("tva").value ;
        let ht = document.getElementById("ht").value ;

        let x = ht;
        let y = (ht*tva)/100;
        let z = +x + +y;
        console.log(z);
        document.getElementById("total").value=z ;



    }

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