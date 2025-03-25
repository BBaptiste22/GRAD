<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'head.php'?>
<body>
<section class="container-fluid">
    <div class="row">
        <div class="col-6 p-3 ml-5 pb-5 pt-5">
            <img src="../Ressources/produits/accoya.jpg" class="img-fluid rounded-3" style="width:80%; height:100%">
        
        </div>
        <div class="col-6 p-5  "><h3>L'Accoya</h3>
            Imaginez un bois solide, récolté dans une forêt à croissance et à renouvellement rapides, qui n'aurait aucune toxicité, aucune variation dimensionnelle et d'une durabilité supérieure à celle des meilleures essences tropicales.
            Imaginez un bois capable de remplacer des matériaux tels que le PVC, le bois traité et les bois exotiques de plus en plus rares, dans toutes les applications extérieures.
            Imaginez un matériau dont le cycle de stockage de carbone serait triplé et qui serait recyclable à loisir. Un tel bois existe, c'est l'Accoya, le leader de la haute technologie appliquée au bois.
            

            <form id="login-form" class="form pt-3" method="POST">
                <div class="form-group mr-2">
                    <input type="text" id="qte" name="qte">
                </div>
                <div>
                    <button type="submit" name="envoie" id="connexion" class="btn btn-secondary mt-3">Valider</button>
                </div>
            </form>
</section>
<?php
session_start();
$serveur = "localhost";
$dbname = "GRAD";
$user = "mysql";
$pass = "mysql";
$pre = $_SESSION['id'];
$qte = $_POST['qte'];
$prix = 4;
$prixf = $qte * $prix;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $id = $_POST['id'];
    $etat = $_POST['etat'];

    try {
        $db = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $db->prepare("INSERT INTO commande(user,produit,quantite,prix)VALUES($pre,3,$qte,$prixf)");

        $sth->execute();
    } catch (PDOException $e) {
        echo 'Impossible de mettre à jour l\'état. Erreur : ' . $e->getMessage();
    }
}
?>
<?php include 'footer.php'?>
