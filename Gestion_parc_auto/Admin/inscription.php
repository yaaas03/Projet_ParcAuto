<?php
session_start();
include "db.php";
if (isset($_POST["btnEnvoyer"])) {
        $stm=$con->prepare("insert into Admin(nom,prenom,email,mpass)
                     values(:nom,:prenom,:email,:mpass)");
        $stm->execute([":nom"=>$_POST["nom"],
            ":prenom"=>$_POST["prenom"],
            ":email"=>$_POST["email"],
            ":mpass"=>password_hash($_POST["mpass"],PASSWORD_DEFAULT),
        ]);
        echo "Votre compte est crée avec succès ";
    header('Location:Connexion.html');
}
?>

