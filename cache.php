<?php
header('Content-type: text/cache-manifest');

error_reporting(E_ALL);
ini_set('display_errors', 0); // wyłączone wyświetlanie błędów (ustawienie dla produkcji)

// pobieramy aktualny czas (UNIXowy znacznik czasu)
$current_time = time();

// wczytujemy znacznik czasu zapisany w last_cache_update
$last_update = file_get_contents('last_cache_update');

// wczytujemy szablon manifestu
$manifest_template = file_get_contents('template_cache.manifest');

// aktualizujemy plik manifestu co godzinę (60*60*1)
if ($last_update + 3600 < $current_time){

	// generujemy nowy manifest
	echo "CACHE MANIFEST\n# $current_time\n".$manifest_template;
	
	// zapisujemy nowy czas aktualizacji (timestamp)
	file_put_contents('last_cache_update', $current_time);
}
else{
	// wczytujemy "stary" manifest
	echo "CACHE MANIFEST\n# $last_update\n".$manifest_template;
}
