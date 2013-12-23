<?php
session_start();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'glowna.php';
$_SESSION['client'] = 'Android';
header("Location: http://$host$uri/$extra");
exit;
?>

