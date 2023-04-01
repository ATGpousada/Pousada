<?php 
session_name('pousada');
session_start();
session_destroy();
header('location: ../index.php');
exit;
?>