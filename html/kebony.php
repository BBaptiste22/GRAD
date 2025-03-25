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
            <img src="../Ressources/produits/Kebony.jpg" class="img-fluid rounded-3" style="width:80%; height:100%">
        
        </div>
        <div class="col-6 p-5  "><h3>Le bois Kebony</h3>
            Un matériau révolutionnaire
            Le Kebony est beaucoup plus stable que le bois massif traditionnel.Sa couleur chaude brun-rouge s’apparente à celle des essences tropicales, et évoluera vers une patine argentée qui lui gardera toute sa noblesse. Même sans aucune forme d’entretien, la longévité du Kebony est impressionnante.
            La société Kebony a été lauréate de nombreux et prestigieux prix pour ses innovations au service de la préservation de la ressource bois dans le cadre d’une démarche respectueuse de l’environnement.
            
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






</body>
</html>

<?php
session_start();
$serveur = "localhost";
$dbname = "GRAD";
$user = "mysql";
$pass = "mysql";
$pre = $_SESSION['id'];
$qte = $_POST['qte'];
$prix = 3;
$prixf = $qte * $prix;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $id = $_POST['id'];
    $etat = $_POST['etat'];

    try {
        $db = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $db->prepare("INSERT INTO commande(user,produit,quantite,prix)VALUES('$pre',2,$qte,$prixf)");

        $sth->execute();
    } catch (PDOException $e) {
        echo 'Impossible de mettre à jour l\'état. Erreur : ' . $e->getMessage();
    }
}
?>
<?php include 'footer.php'?>

