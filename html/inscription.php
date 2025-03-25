<?php
error_reporting(E_ALL); ini_set("display_errors", 1);
$user="mysql";
$mdp="mysql";
$dbco = new PDO("mysql:host=localhost;dbname=GRAD", $user, $mdp);
session_start();

if(isset($_POST['envoie'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $role = 'user';

    
            $sql = "INSERT INTO connexio(pseudo, password, role) VALUES (?, MD5(?), ?)";
            $result = $dbco->prepare($sql);
            $result->execute(array($pseudo,$password, $role));
    
            echo "Enregistrement effectué";
            header("Location: connexion.php");
            exit();
        
        }
    } else {
        echo 'Tous les champs ne sont pas remplie';
    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>





<div id="login">
        <h3 class="text-center pt-5">Inscription</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST">
                            <div class="form-group">
                                <label for="username" class="">Pseudo:</label><br>
                                <input type="text" name="pseudo" id="pseudo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div>
                                <button type="submit" name="envoie" id="connexion" class="btn btn-secondary">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>