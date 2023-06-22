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

    <title>Ajouter collaborateur</title>
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
        <div class="container">
            <div class="title">Ajouter un collaborateur
                <button style="position: relative;left: 910px;background: #9c2323;font-size: xx-small;"><a  href="collaborateur.php"><i class='bx bx-x table_icon' ></i></a></button>
            </div>

            <div class="content">
                <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details" style="color: black">Nom  <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" autocomplete="off" name="nom" style="color: #58555E" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Prénom  <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" autocomplete="off" name="prenom" style="color: #58555E" placeholder="Enter your Prenom" required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Numéro de la carte national <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" id="input_cin" autocomplete="off" name="cin" style="color: #58555E" placeholder="Entrez votre cin" required>
                            <span id="message" style="color:red"></span>

                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Email <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" id="input_email" autocomplete="off" name="email" style="color: #58555E" placeholder="Entrez votre email" required>
                            <span id="message_email" style="color:red"></span>
                        </div>
                        <div class="input-box">
                            <span class="details"  style="color: black">Numéro de téléphone</span>
                            <input type="number"  id="input_tel" autocomplete="off" name="tel" style="color: #58555E" placeholder="Entrez votre numero " >
                            <span id="message_tel" style="color:red"></span>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">adresse</span>
                            <input type="text"  autocomplete="off" name="adresse" style="color: #58555E" placeholder="Entrez votre adresse " >

                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Date de naissance</span>
                            <input type="date" name="date_naissance" style="color: #58555E" >
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Date d'engagement <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="date" name="date_engagement" style="color: #58555E"  required>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Numéro de cnss <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="number"  id="input_cnss" autocomplete="off" name="cnss" style="color: #58555E" placeholder="Entrez votre N° cnss" required>
                            <span id="message_cnss" style="color:red"></span>
                        </div>
                        <div class="input-box">
                            <span class="details" style="color: black">Service <span style="color: red;margin-left: 9px;">*</span></span>
                            <input type="text" autocomplete="off" name="service" style="color: #58555E" placeholder="Entrez votre service" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Confirmer" name="confirmer">
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
    $stm=$con->prepare("insert into personne(NOM,PRENOM,CIN,TEL,ADRESSE,service,email,cnss,date_naissance,date_engagement)
                                    values(:NOM,:PRENOM,:CIN,:TEL,:ADRESSE,:service,:email,:cnss,:date_naissance,:date_engagement)");
    $stm->execute([
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
<!--========== Traitement AJAX ==========-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#input_cin").keyup(function() {
            var input = $(this).val();

            if (input != "") {
                $.ajax({
                    url: "not_repeter.php",
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
        $("#input_email").keyup(function() {

            var email = $(this).val();
            if (email != "") {
                $.ajax({
                    url: "not_repeter.php",
                    method: "POST",

                    data: {
                        email: email
                    },

                    success: function(data) {
                        $("#message_email").html(data);
                    },
                });
            }
        });
        $("#input_tel").keyup(function() {

            var tel = $(this).val();
            if (tel != "") {
                $.ajax({
                    url: "not_repeter.php",
                    method: "POST",

                    data: {
                        tel: tel
                    },

                    success: function(data) {
                        $("#message_tel").html(data);
                    },
                });
            }
        });
        $("#input_cnss").keyup(function() {

            var cnss = $(this).val();
            if (cnss != "") {
                $.ajax({
                    url: "not_repeter.php",
                    method: "POST",

                    data: {
                        cnss: cnss
                    },

                    success: function(data) {
                        $("#message_cnss").html(data);
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