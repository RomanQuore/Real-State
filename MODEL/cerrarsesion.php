<?php
session_start();

// Unset and destroy the session
session_unset();
session_destroy();

// Redirect to the login page after logout
header('location: ../MODEL/iniciosesion1.php'); // Replace with the actual name of your login page
exit();
?>
