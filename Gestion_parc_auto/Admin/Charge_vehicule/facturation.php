<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Style/pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<?php
require("db.php");
$stm = $con->prepare("SELECT * from facture f,vehicule v,type_charge t where f.id_vehicule=v.id_vehicule and f.numcharge=t.numcharge and f.id_Facture=:id");
$stm->execute([":id"=>$_GET["id"]]);
$result=$stm->fetch();
?>
<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">

        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" onclick="setTimeout(redirection, 3000);" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <img style="width: 195px;" src="../../media/logo-sofa.png"/>
                                        <li><h4>SOFA MAROC</h4></li>
                                        <li>30 Bd. Khalid Ibnou Lwalid, Aïn Sebaâ 20250</li>
                                        <li>Casablanca - Maroc</li>
                                        <li><a href="#" data-abc="true">sofamaroc.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Facture <?= date('ym').'000'.$result["id_Facture"]?></h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span class="font-weight-semibold"><?= date('M d Y')?></span></li>
                                            <li>Frais du services Sofa Maroc du date : <span class="font-weight-semibold"><?= $result['date_facture']?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted"></span>
                                <ul class="list list-unstyled mb-0">

                                </ul>
                            </div>
                            <div class="mb-2 ml-auto"> <span class="text-muted">Detail de vehicule</span>
                                <div class="d-flex flex-wrap wmin-md-400">
                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>
                                            <h5 class="my-2">Matricule</h5>
                                        </li>
                                        <li>Référence de vehicule:</li>
                                        <li>Marque:</li>
                                        <li>Model:</li>
                                        <li>Type:</li>
                                    </ul>
                                    <ul class="list list-unstyled text-right mb-0 ml-auto">
                                        <li>
                                            <h5 class="font-weight-semibold my-2"><?= $result['immatriculation']?></h5>
                                        </li>
                                        <li><span class="font-weight-semibold"><?= $result['id_vehicule']?></span></li>
                                        <li><?= $result['marque']?></li>
                                        <li><?= $result['model']?></li>
                                        <li><span class="font-weight-semibold"><?= $result['type']?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Nature</th>
                                    <th>TVA</th>
                                    <th>Prix HT</th>
                                    <th>TTC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong><?= $result['nature_charge']?></strong></td>
                                    <td><?= $result['TVA']?>%</td>
                                    <td><?= $result['prix_ht']?> DH</td>
                                    <td><span class="font-weight-semibold"><?= $result['total']?>Dhs</span></td>
                                </tr>
                            </tbody>
                        </table>
                                            </div>
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col">
                                <p class="conditions">
                                    En votre aimable règlement , Et avec nos remerciements.
                                    <br/>
                                    Conditions de paiement : paiement à réception de facture.
                                    <br/>
                                    Aucun escompte consenti pour règlement anticipé.
                                    <br/>
                                    Règlement par virement bancaire ou espèce.
                                </p>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">

                            </div>
                            <div class="col">
                                <p class="bottom-page text-right">
                                    TEL: (212) 5 22 34 00 83<br/>
                                    FAX: (212) 5 22 34 01 19<br/>
                                    Email: sofa@sofamaroc.com
                                </p>
                            </div>

                        </div>
                    </div>

            </div>
        </div>
    </div>
        <script>
            function redirection() {
                window.location.replace('http://localhost/Gestion_parc_auto/Admin/Acceuil.php')
            }
        </script>
</body>

</html>