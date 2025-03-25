<?php
session_start();
$serveur = "localhost";
$dbname = "GRAD";
$user = "mysql";
$pass = "mysql";
$pre = $_SESSION['id'];



    try {
        $db = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $db->prepare("SELECT produit,quantite,prix FROM commande where user=$pre and produit=1;");
        $sth1 = $db->prepare("SELECT produit,quantite,prix FROM commande where user=$pre and produit=2;");
        $sth2 = $db->prepare("SELECT produit,quantite,prix FROM commande where user=$pre and produit=3;");
        $sth3 = $db->prepare("SELECT produit,quantite,prix FROM commande where user=$pre and produit=4;");

        $sth->execute();
        $data = $sth->fetch();
        $a1 = $data;

        $sth1->execute();
        $data = $sth1->fetch();
        $a2 = $data;

        $sth2->execute();
        $data = $sth2->fetch();
        $a3 = $data;

        $sth3->execute();
        $data = $sth3->fetch();
        $a4 = $data;
      
     

    } catch (PDOException $e) {
        echo 'Impossible de mettre à jour l\'état. Erreur : ' . $e->getMessage();
    }




?>












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
<body>
  <?php             echo '<pre>';
            print_r($data1);;
            echo '</pre>';
            ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

      <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Votre panier</h3>
        </div>
        <?php if ($a1['produit'] !="") { ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="../Ressources/produits/douglas.jpg"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Douglas</p>
                <p><span class="text-muted">Size: </span>1 Métre<span class="text-muted"></span></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
              <h5 class="mb-0"><?php echo $a1['quantite'];?></h5>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $a1['prix'];?>€</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="sup.php" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
        <?php if ($a2['produit'] !="") { ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="../Ressources/produits/Kebony.jpg"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Kebony</p>
                <p><span class="text-muted">Size: </span>1 Métre <span class="text-muted"></span></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
              <h5 class="mb-0"><?php echo $a2['quantite'];?></h5>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $a2['prix'];?>€</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="sup.php" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
        <?php if ($a3['produit'] !="") { ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="../Ressources/produits/accoya.jpg"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Accoya</p>
                <p><span class="text-muted">Size: </span>1 Métre <span class="text-muted"></span></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
              <h5 class="mb-0"><?php echo $a3['quantite'];?></h5>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $a3['prix'];?>€</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="sup.php" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
        <?php if ($a4['produit'] !="") { ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="../Ressources/produits/frene.jpg"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Thermofrene</p>
                <p><span class="text-muted">Size: </span>1 Métre <span class="text-muted"></span></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
              <h5 class="mb-0"><?php echo $a4['quantite'];?></h5>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $a4['prix'];?>€</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="sup.php" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php }?>


        <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-warning btn-block btn-lg">Paiement</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
</body>
</html>