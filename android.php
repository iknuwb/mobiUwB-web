<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // wyłączone wyświetlanie błędów (ustawienie dla produkcji)

// wejście z aplikacji mobilnej (Android)
setcookie('client', 'Android');

// użytkownik używa wersji starej - ciasteczko jest teraz ustawiane przez aplikację mobilną, która otwiera glowna.php zamiast android.php
setcookie('wersja', 'stara');

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'glowna.php';
header("Location: http://$host$uri/$extra");
exit;

