<?php
require_once './libs/PHPTAL.php';

session_start();
$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

/* Zawartość specyficzna dla platform - Android/przeglądarka */
	
	// isset powinno być szybsze niż porównywanie wartości.
	if (isset($_SESSION['client'])) {
		$template->offline = '';
	}
	else {
		$template->offline =
			'        <!-- offline indicator - wskaźnik stanu połączenia z siecią (online/offline) -->
	<script src=offline.min.js></script>
	<link rel=stylesheet href=offline-indicator.css>';
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
