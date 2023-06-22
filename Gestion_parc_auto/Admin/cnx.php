<?php
session_start();
include "db.php";
if (isset($_POST["btnEnvoyer"])) {

    if (!empty($_POST["email"]) and !empty($_POST["mpass"])) {

        $email = htmlspecialchars($_POST["email"]);
        $mpass = htmlspecialchars($_POST["mpass"]);

        $req = $con->prepare("select * from Admin where email=:email");
        $req->execute([":email" => $email]);
        $result = $req->fetch();
        if ($result!=false && password_verify($mpass, $result["mpass"]) ){
            $_SESSION['id_admin'] =$result['id_admin'];
            $_SESSION['nom'] =$result['nom'];
            $_SESSION['prenom'] =$result['prenom'];
            header('Location:Acceuil.php');

        }else{
            header('Location:Connexion.html');
        }

    }

}
/*
$stm=$con->prepare("insert into Admin(NOM,PRENOM,EMAIL,mpass)
                     values(:nom,:prenom,:email,:mpass)");

$stm->execute([":nom"=>"AYA",
    ":prenom"=>"zouity",
    ":email"=>"Ayazouity@gmail.com",
    ":mpass"=>password_hash("aya",PASSWORD_DEFAULT),
]);

echo "Votre compte est crée avec succès ";
*/


?>
