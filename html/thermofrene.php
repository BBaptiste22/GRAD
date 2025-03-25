<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/8e7701e8f4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/TP.css"> 
</head>
<?php include 'head.php'?>
<body>
<section class="container-fluid">
    <div class="row">
        <div class="col-6 p-3 ml-5 pb-5 pt-5">
            <img src="../Ressources/produits/frene.jpg" class="img-fluid rounded-3" style="width:80%; height:100%">
        
        </div>
        <div class="col-6 p-5  "><h3>Le Frene (TERRASSES BOIS)</h3>
        Le frêne est un bois européen qui présente de nombreuses qualités pour l'usage en terrasses. Il est issu de forêts durablement gérées et bénéficie d'une technologie de traitement performante et non polluante : la modification thermique.
        Le frêne chauffé est traité par modification thermique, un procédé qui modifie les propriétés du bois en le chauffant à haute température. Ce traitement rend le bois plus résistant aux intempéries, aux insectes et aux champignons.
        
            

            
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
$prix = 8;
$prixf = $qte * $prix;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $id = $_POST['id'];
    $etat = $_POST['etat'];

    try {
        $db = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $db->prepare("INSERT INTO commande(user,produit,quantite,prix)VALUES('$pre',4,$qte,$prixf)");

        $sth->execute();
    } catch (PDOException $e) {
        echo 'Impossible de mettre à jour l\'état. Erreur : ' . $e->getMessage();
    }
}
?>
<?php include 'footer.php'?>





