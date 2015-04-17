<?php

/*
 * Plik obecnie nie używany
 * 
 * Służy jedynie zachowaniu wstecznego wsparcia dla starszych, testowych buildów aplikacji na Androida.
 * Wsparcie to zostanie porzucone po ukończeniu prac, a przynajmniej publicznym opubliowaniu testowego wydania najnowszej,
 * odświeżonej aplikacji mobilnej na system Android.
 */


setcookie("client", "", time() - 3600);

error_reporting(E_ALL);
ini_set('display_errors', 0); // wyłączone wyświetlanie błędów (ustawienie dla produkcji)

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
header("Location: http://$host$uri/");
exit;
