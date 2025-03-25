<?php
session_start();
echo '2';

echo '5';
unset($_SESSION['role']);
session_destroy();
header("Location: accueil.php");
exit();

?>