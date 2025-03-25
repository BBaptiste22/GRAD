<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8e7701e8f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/TP.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/js.js"></script>
</head>
<?php include 'head.php'?>
<body> 
<div class="carousel slide" data-ride="carousel" style="margin-top:3% ">
        <div class="carousel-inner">
            
            <div class="carousel-item active ">
            <img src="../Ressources/entete01.jpg" alt="accueil" style="height:350px ; width:100%">
            <div class="carousel-caption">
            <h1>Contact</h1>
            </div>
            </div>
            <div class="carousel-item ">
            <img src="../Ressources/entete02.jpg" alt="accueil" style="height:350px ; width:100%">
            <div class="carousel-caption">
            <h1>Contact</h1>
            </div>
            </div>
            <div class="carousel-item ">
            <img src="../Ressources/entete03.jpg" alt="accueil" style="height:350px ; width:100%">
            <div class="carousel-caption">
            <h1>Contact</h1>
            </div>
            </div>
        </div>
    </div> 
    <section id="titrec">
    <h3>GRAD répond à toutes vos questions sur tous les sujets ! </h3></section>
    <form method="post" id="formulaire" > 
        
    <div class="container">
             <h1>Formulaires</h1>
             <form>
               <fieldset>
                
                 
                 <div class="form-group">
                   <label for="nom">Entrez votre nom</label>
                   <input name="nom" id="nom" type="text" class="form-control" />
                 </div>
                 
                 <div class="form-group">
                   <label for="prenom">Entrez votre prenom</label>
                   <input name="prenom" id="prenom" type="text" class="form-control" />
                 </div>
                 
                 <div class="form-group">
                   <label for="ville">Entrez votre ville</label>
                   <input name="ville" id="ville" type="text" class="form-control" />
                 </div>
                 <div class="form-group">
                   <label for="Code postale">Entrez votre Code postal</label>
                   <input name="CP" id="CP" type="text" class="form-control" />
                 </div>
                 <div class="form-group">
                   <label for="email">Entrez votre mail</label>
                   <input name="email" id="email" type="text" class="form-control" />
                 </div>
                 <div class="form-group">
                   <label for="telephone">Entrez votre numéro de telephone</label>
                   <input name="telephone" id="telephone" type="text" class="form-control" />
                 </div>
                 <div class="form-group">
                   <label for="message">message</label>
                   <textarea class="form-control" id="Message" name = "message" rows="3"></textarea>
                 </div>
                 <div class="form-group">
                   <label for="verification">Vérification</label>
                   <input type="text" class="form-control" id="3">
                 </div>
                 <div class="buttoncontact">
                    <input type="submit" id="Envoyer" value="Envoyer">
                    <button id="Annuler" type="reset">Annuler</button>
                    </form>
                    </div>
    
               </fieldset>
             </form>
         </div>
    </form>
      
    <?php 


 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $email = $_POST['email'];
 $Ville = $_POST['ville'];
 $CP = $_POST['CP'];
 $Telephone = $_POST['telephone'];
 $message = $_POST['message'];
 $etat = "Nontraite";
 $user="mysql";
 $mdp="mysql";
 

 
 try{
  $dbco = new PDO("mysql:host=localhost;dbname=GRAD", $user, $mdp);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}

catch(PDOException $e){
  $dbco->rollBack();
echo "Erreur : " . $e->getMessage();
}

$sql = "INSERT INTO Contact(Nom,Prenom,Mail,Ville,Codepostale,Telephone,Messag,Etat) 
          VALUES('$nom','$prenom','$email','$Ville',$CP,$Telephone,'$message','$etat')";

  
  

  $rs = $dbco->prepare($sql);
  $rs->execute();



?>

    
         

    <?php include 'footer.php'?>
     
</body>
</html>