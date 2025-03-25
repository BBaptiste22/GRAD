<?php
$user = "mysql";
$mdp = "mysql";
$nom = $_POST["pseudo"];
$password = $_POST["password"];
$dbco = new PDO("mysql:host=localhost;dbname=GRAD", $user, $mdp);




    $sql = "SELECT id,pseudo,role FROM connexio WHERE pseudo = ? AND password = MD5(?)";
    $get_user = $dbco->prepare($sql);
    $get_user->execute(array($nom,$password));
    $data = $get_user->fetch();

    if ($get_user->rowCount() > 0) {
        session_start();
            $_SESSION['role'] = $data['role'];
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['id'] = $data['id'];
            

            header("Location: accueil.php");
            exit();
        
    
    }
else {
    header("Location: inscription.php");
            exit();
}

?>


