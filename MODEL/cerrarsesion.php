<?php
session_start();

session_unset();
session_destroy();

header('location: ../MODEL/iniciosesion1.php'); 
exit();
?>
