<?php
require_once './libs/PHPTAL.php';

session_start();
$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

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
	

$template->nazwa = "Instytut Informatyki";
$template->pelny_tytul = 'mobiUwB - Instytut Informatyki';

try {
    echo $template->execute();
}
catch (Exception $e){
    echo $e;
}
?>
