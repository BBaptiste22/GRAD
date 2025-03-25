<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Société GRAD</title>
    <script src="https://kit.fontawesome.com/8e7701e8f4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/TP.css"> 
</head>
<body >
<?php
session_start();
$connect = $data['role'];

?>

  <img class="logo"  src="../Ressources/Logo Grad.jpg"/>
  <?php
      // On recupere l'URL de la page pour pouvoir modifier la couleur des bouton de la nav
      $page = $_SERVER['REQUEST_URI'];
      $page = str_replace("/~bbernard/site%20grad/html/", "",$page);
      //mettre le chemin permettant d'arriver aux fichier dans str_replace
?>
    <div class="nav justify-content-end" >
    <nav>
        <ul class="nav nav-pills" >
          
          <li class="nav-item "><a <?php if($page == "accueil.php"){echo 'class="nav-link  text-white bg-dark"';} else{echo 'class="nav-link text-dark"';} ?> href="accueil.php">Accueil</a></li>
          <li class="nav-item "><a <?php if($page == "Nos%20prestations.php"){echo 'class="nav-link  text-white bg-dark"';} else{echo 'class="nav-link text-dark"';} ?> href="Nos prestations.php">Nos prestations</a></li>
          <li class="nav-item "><a <?php if($page == "Nos%20produits.php"){echo 'class="nav-link  text-white bg-dark"';} else{echo 'class="nav-link text-dark"';}?> href="Nos produits.php">Nos produits</a></li>
          <li class="nav-item "><a <?php if($page == "Nosrealisations.php"){echo 'class="nav-link  text-white bg-dark"';} else{echo 'class="nav-link text-dark"';} ?> href="Nosrealisations.php">Nos réalisations</a></li>
          <li class="nav-item "><a <?php if($page == "Contact.php"){echo 'class="nav-link  text-white bg-dark"';} else{echo 'class="nav-link text-dark"';}?> href="Contact.php">Contact</a></li>
        </ul>
        <?php if ($_SESSION['role']=='admin'){ ?>
        
        <button onclick="window.location.href = 'tabsql.php';" type="button" class="btn btn-dark" >Espace Admin</button> 
        <a href="deconnexion.php" action='deconnexion.php' class="btn btn-dark">deconnexion</a>
        <?php }elseif($_SESSION['role']=='user'){
        ?>
        <i class="fa-solid fa-user fa-2xl"></i>
        <?php echo $_SESSION['pseudo'];?>
        <button onclick="window.location.href = 'commande.php';" type="button" class="btn btn-dark" >commande</button> 
        <button onclick="window.location.href = 'panier.php';" type="button" class="btn btn-dark" >panier</button> 
        <a href="deconnexion.php" action='deconnexion.php' class="btn btn-dark">deconnexion</a>
        <?php }else{
        ?>
        <button onclick="window.location.href = 'connexion.php';" type="button"  class="btn btn-dark" >Connexion</button> 
        <button onclick="window.location.href = 'inscription.php';" type="button" class="btn btn-dark">Inscription</button>
        <?php }
        ?>
        </nav>
    </div>
  </body>
</html>

<?php
session_start();



?>