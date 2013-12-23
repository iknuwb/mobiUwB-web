<?php
require_once './libs/PHPTAL.php';

session_start();
$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

if (file_exists('config.xml')) {
    $config = simplexml_load_file('config.xml');	// wczytanie pliku konfiguracyjnego
	
	/* Wczytanie danych z pliku konfiguracyjnego */
	
	$template->nazwa = $config->jednostka[0]->nazwa;
	$template->pelny_tytul = $config->jednostka[0]->pelny_tytul;
	$template->logo = $config->jednostka[0]->logo;
	
	$template->apiUrl = $config->jednostka[0]->apiUrl;

// mapa
	$template->tytul = $config->jednostka[0]->mapa->tytul;
	$template->dlugosc = $config->jednostka[0]->mapa->wspolrzedne->dlugosc;
	$template->szerokosc = $config->jednostka[0]->mapa->wspolrzedne->szerokosc;
	
// adres
	$template->kod = $config->jednostka[0]->adres->kod;
	$template->miasto = $config->jednostka[0]->adres->miasto;
	$template->ulica = $config->jednostka[0]->adres->ulica;
	$template->numer = $config->jednostka[0]->adres->numer;
	
	$template->email = $config->jednostka[0]->email;
	
	$template->mailto = 'mailto:'.$config->jednostka[0]->email;
	
	$template->tel1 = $config->jednostka[0]->tel1;
	
	$tel = 'tel:';
	$template->tel1_ = $tel.$config->jednostka[0]->tel1;
	
	
	
	
	
	/* Zawartość specyficzna dla platform - Android/przeglądarka */
	
			 /* - Wskaźnik stanu połączenia z siecią; nie wyświetlany w aplikacji
				- Przycisk "Główna"; nie wyświetlany w aplikacji */
				
	// isset powinno być szybsze niż porównywanie wartości.
	if (isset($_SESSION['client'])) {
		$template->offline = '';
		$template->glowna = '';
	}
	else {
		$template->offline =
			'        <!-- offline indicator - wskaźnik stanu połączenia z siecią (online/offline) -->
	<script src=offline.min.js></script>
	<link rel=stylesheet href=offline-indicator.css>';
		$template->glowna = '<a href=glowna.php data-icon=home data-iconpos=left>Główna</a>';
	}
	
	try {
		echo $template->execute();
	}
	catch (Exception $e){
		echo $e;
	}	
	
	
} else {
    exit('Nie mozna otworzyc pliku config.xml.');
}

?>
