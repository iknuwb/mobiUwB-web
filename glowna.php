<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // wyłączone wyświetlanie błędów (ustawienie dla produkcji)

require_once './libs/PHPTAL.php';

$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

if (file_exists('config.xml')) {
    $config = simplexml_load_file('config.xml');	// wczytanie pliku konfiguracyjnego
		
	// ---------------- AUTORZY ----------------
	
	// klasa Autor
	class Autor {
		public $imie;
		
		function __construct($imie) {
			$this->imie = $imie.' (autor)';
		}
	}

	// tworzymy tablice obiektow
	$autorzy = array();
	
	foreach ($config->autorzy->autor as $autor) {
		$autorzy[] = new Autor($autor);
	}

	// $template->autorzy = $autorzy;

	// -------------------------------------------
	
	// --------------- OPIEKUNOWIE ---------------
	
	class Opiekun extends Autor{
		//public $imie;

		function __construct($imie) {
			$this->imie = $imie.' (opiekun, autor)';
		}
	}
	
	// tworzymy tablice obiektow
	$opiekun = array();
	
	foreach ($config->opiekun as $opiekun) {
		$opiekunowie[] = new Opiekun($opiekun);
	}

	//$template->opiekunowie = $opiekunowie;
	
	// -------------------------------------------
	
	// ------------------ PLANY ------------------
	
	class Plan {
		public $link;
		public $opis;
		
		function __construct($link, $opis) {
			$this->link = $link;
			$this->opis = $opis;
		}
	}

	// tworzymy tablice obiektow
	$plany_Ist = array();
	
	foreach ($config->jednostka[0]->plany->pierwszy_stopien->plan as $plan_Ist) {
		$plany_Ist[] = new Plan($plan_Ist->link, $plan_Ist->opis);
	}
	
	
	$plany_IIst = array();
	
	foreach ($config->jednostka[0]->plany->drugi_stopien->plan as $plan_IIst) {
		$plany_IIst[] = new Plan($plan_IIst->link, $plan_IIst->opis);
	}

	// $template->plany_Ist = $plany_Ist;
	// $template->plany_IIst = $plany_IIst;

	// -------------------------------------------
	
	$template->apiUrl = $api_url = $config->jednostka[0]->apiUrl;
	
	// ----------------- SEKCJE -----------------
	
	class Sekcja {
		public $id_sekcji;
		public $tytul_sekcji;
		public $zawartosc;
		public $elementy;
		public $ilosc;
		public $wiecej;
		
		function __construct($id_sekcji, $tytul_sekcji, $zawartosc, $elementy, $ilosc, $wiecej) {
			$this->id_sekcji = $id_sekcji;
			$this->tytul_sekcji = $tytul_sekcji;
			$this->zawartosc = $zawartosc;
			$this->elementy = $elementy;
			$this->ilosc = $ilosc;
			$this->wiecej = $wiecej;
		}
	}

	class Elementy {
		public $tresc;
		public $tytul;
		public $data;

		function __construct($tresc, $tytul, $data) {
			$this->tresc = $tresc;
			$this->tytul = $tytul;
			$this->data = $data;
		}
	}
	// tworzymy tablice obiektow
	$sekcje = array();
	
	foreach ($config->jednostka[0]->sekcje->sekcja as $sekcja) {
		/*UWAGA UWAGA UWAGA*/
		$json = file_get_contents("$api_url". $sekcja->id_sekcji ."/6/0"); //limit 6 z offsetem 0
		$json_ile = file_get_contents("$api_url". $sekcja->id_sekcji); //wczytujemy wszystko aby sprawdzic ile jest elementow tablicy
		$s = json_decode($json,true);
		$s_ile = json_decode($json_ile,true);
		$elementy = array();
		$ile = count($s_ile);
		if ($ile > 6)
			$wiecej = true;
		else
			$wiecej = false;
		for ($i = 0; ($i < 6 && $i < count($s)); $i++) {
			$cala = str_replace('Z', '', $s[$i]['data']);
			$calaarr = explode("T", $cala);
			$dataarr = explode("-", $calaarr[0]);
			$czasarr = explode(":", $calaarr[1]);
			$rok = $dataarr[0];
			$miesiac = $dataarr[1];
			$dzien = $dataarr[2];
			$godzina = $czasarr[0];
			$minuty = $czasarr[1];
			$sekundy = $czasarr[2]; // nie uzywam teraz
			$polskadata = $dzien . '.' . $miesiac . '.' . $rok . ' (' . $godzina . ':'. $minuty . ')';
			$elementy[] = new Elementy($s[$i]['tresc'], $s[$i]['tytul'], $polskadata);
		}
		//$elementy[] = new Elementy("bla", "Bla", "bla");//usunac
		if ($sekcja['licznik'] != 'tak'){
			$sekcje[] = new Sekcja($sekcja->id_sekcji, $sekcja->tytul_sekcji, "<a href=\"#$sekcja->id_sekcji\" class=$sekcja->id_sekcji>$sekcja->tytul_sekcji</a>", $elementy, $ile, $wiecej);
		} else{
			$sekcje[] = new Sekcja($sekcja->id_sekcji, $sekcja->tytul_sekcji, "<a href=\"#$sekcja->id_sekcji\" class=$sekcja->id_sekcji>$sekcja->tytul_sekcji</a><span class=ui-li-count id=\"licznik_sz\">0</span>", $elementy, $ile, $wiecej);
		}
	}

	// $template->sekcje = $sekcje;

	// -------------------------------------------	
	
	// ------------ SEKCJE STATYCZNE -------------
	
	class SekcjaStatyczna extends Sekcja{
		//public $id_sekcji;
		//public $tytul_sekcji;
		
		function __construct($id_sekcji, $tytul_sekcji) {
			$this->id_sekcji = $id_sekcji;
			$this->tytul_sekcji = $tytul_sekcji;
		}
	}

	// tworzymy tablice obiektow
	$sekcje_statyczne = array();
	
	foreach ($config->jednostka[0]->sekcje_statyczne->sekcja_statyczna as $sekcja_statyczna) {
			$sekcje_statyczne[] = new SekcjaStatyczna($sekcja_statyczna->id_sekcji, $sekcja_statyczna->tytul_sekcji);
	}

	// $template->sekcje_statyczne = $sekcje_statyczne;

	// -------------------------------------------	
	
	/* Wczytanie danych z pliku konfiguracyjnego */
	
	$template->opiekunowie = $opiekunowie;
	$template->autorzy = $autorzy;
	
	$template->plany_Ist = $plany_Ist;
	$template->plany_IIst = $plany_IIst;
	$template->sekcje = $sekcje;
	$template->sekcje_statyczne = $sekcje_statyczne;
	
	// --
	
	$template->nazwa = $config->jednostka[0]->nazwa;
	$template->pelny_tytul = $config->jednostka[0]->pelny_tytul;
	$template->logo_aplikacji = $config->logo_aplikacji;				// 128 x 128
	
	/* loga UwB */
	$template->logo_male = $config->logo_male;				// 32 x 32
	$template->logo_srednie = $config->logo_srednie;		// 64 x 64
	$template->logo_duze = $config->logo_duze;				// 128 x 128
	
	$template->logo_jednostki = $config->jednostka[0]->logo;	// opcjonalne
	
	//$template->apiUrl = $config->jednostka[0]->apiUrl; // jest nad wczytywaniem sekcji

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
	
	// tutaj dla odmiany nie łączę - dałem tel:${tel2} w template_index.html
	$template->tel2 = $config->jednostka[0]->tel2;	// opcjonalne
	$template->fax = $config->jednostka[0]->fax;	// opcjonalne
	
	
	/* Zawartość specyficzna dla platform - Android/przeglądarka */
	
			/*  
				- MobiUwB w belce tytułowej na stronie głównej; nie wyświetlana w aplikacji
				- Wskaźnik stanu połączenia z siecią; nie wyświetlany w aplikacji
				- Przycisk "Główna"; nie wyświetlany w aplikacji
			*/

	$template->nowa_wersja = '';
			
	// isset powinno być szybsze niż porównywanie wartości.
	if (isset($_COOKIE['client'])) {
		$template->mobiuwb = '';
		$template->offline = '';
		$template->glowna = '';
		
		// sprawdzamy czy użytkownik używa starej wersji aplikacji
		if (isset($_COOKIE['wersja'])) {
			$template->nowa_wersja = '$( document ).ready(function() {
	setTimeout(function() {
	$("#nowawersja").click();
	}, 5000);
});';
		}
	}
	else {
		$template->mobiuwb = ' MobiUwB ';
		$template->offline =
			'        <!-- offline indicator - wskaźnik stanu połączenia z siecią (online/offline) -->
	<script src=js/offline.min.js></script>
	<link rel=stylesheet href=css/offline-indicator.css>';
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
