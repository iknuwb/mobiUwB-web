<?php
header('Content-type: text/cache-manifest');

error_reporting(E_ALL);
ini_set('display_errors', 0); // wyłączone wyświetlanie błędów (ustawienie dla produkcji)

// pobieramy aktualny czas (UNIXowy znacznik czasu)
$czas = time();

// wczytujemy znacznik czasu zapisany w ostatnia_aktualizacja.txt
$ostatnia_aktualizacja = file_get_contents('ostatnia_aktualizacja.txt');

// wczytujemy szablon manifestu
$manifest_template = file_get_contents('template_cache.manifest');

// aktualizujemy plik manifestu co godzinę (60*60*1)
if ($ostatnia_aktualizacja + 3600 < $czas){

	// generujemy nowy manifest
	echo "CACHE MANIFEST\n# $czas\n".$manifest_template;
	
	// zapisujemy nowy czas aktualizacji (timestamp)
	file_put_contents('ostatnia_aktualizacja.txt', $czas);
}
else{
	// wczytujemy "stary" manifest
	echo "CACHE MANIFEST\n# $ostatnia_aktualizacja\n".$manifest_template;
}

?>