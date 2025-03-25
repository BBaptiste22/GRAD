<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'head.php'?>
<body>
<section class="container-fluid">
    <div class="row">
        <div class="col-6 p-3 ml-5 pb-5 pt-5">
            <img src="../Ressources/produits/douglas.jpg" class="img-fluid rounded-3" style="width:90%; height:100%">
        
        </div>
        <div class="col-6 p-5  "><h3>Le Douglas</h3>
            Grâce au profilage et à la mise en oeuvre particulière de Grad, sa résistance naturelle et sa pérennité sont encore augmentées.
            Le Douglas est raboté après un passage en séchoir ; cette opération alliée à son faible retrait radial lui permet d’être fixé avec le système du clip JuAn.
            Note : <br>
            - La présence des noeuds confère au Douglas une apparence rustique, d’une couleur miel, proche de celle du Pin à l’état naturel<br>
            Ce produit bénéficie d’une garantie de 5 ans.
            Grad améliore de manière significative la conception des terrasses en Douglas : <br>
            - par le Clip JuAn, les lames sont isolées de leur support ; <br>
            - le dessus légèrement bombé favorise l'écoulement rapide de l'eau de pluie ;<br>
            - le rapport maximal entre épaisseur et largeur est réduit de 6 à 5.<br>
            Selon les termes de la norme régissant les platelages extérieurs en bois (DTU 51-4), ces améliorations de la conception des lames permettent à celles-ci de répondre aux sollicitations de la classe 4.
            
            
            <form id="login-form" class="form pt-3" method="POST">
                <div class="form-group mr-2">
                    <input type="text" id="qte" name="qte">
                </div>
                <div>
                    <button type="submit" name="envoie" id="connexion" class="btn btn-secondary mt-3">Valider</button>
                </div>
            </form>
    
    </div>
</section>

<?php
session_start();
$serveur = "localhost";
$dbname = "GRAD";
$user = "mysql";
$pass = "mysql";
$pre = $_SESSION['id'];
$qte = $_POST['qte'];
$prix = 5;
$prixf = $qte * $prix;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $id = $_POST['id'];
    $etat = $_POST['etat'];

    try {
        $db = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $db->prepare("INSERT INTO commande(user,produit,quantite,prix)VALUES('$pre',1,$qte,$prixf)");

        $sth->execute();
    } catch (PDOException $e) {
        echo 'Impossible de mettre à jour l\'état. Erreur : ' . $e->getMessage();
    }
}
?>
<?php include 'footer.php'?>