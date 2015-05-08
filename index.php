<?php

/*
 * Ustawienia początkowe
 * (obsługa wielu jednostek w jednej instancji)
 * 
 */

switch ($_GET['place']) {
    case 'ii':
        $p = 0;
        $place = 'ii';

        break;
    case 'wf':
        $p = 1;
        $place = 'wf';
        break;

    default:
        $p = 0;
        $place = 'ii';
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "?place=$place";
        header("Location: http://$host$uri/$extra");

        break;
}

error_reporting(E_ALL);
ini_set('display_errors', 0); // wyłączone wyświetlanie błędów (ustawienie dla produkcji)

require_once './libs/PHPTAL.php';

$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

/*
 * Załadowanie pliku konfiguracyjnego
 */

if (file_exists('config.xml')) {
    $config = simplexml_load_file('config.xml'); // wczytanie pliku konfiguracyjnego
} else {
    exit('Nie mozna otworzyc pliku config.xml.');
}

/*
 * Utworzenie klas
 */

class Autor {

    public $imie;

    function __construct($imie) {
        $this->imie = $imie . ' (autor)';
    }

}

// tworzymy tablice obiektow
$autorzy = array();

foreach ($config->autorzy->autor as $autor) {
    $autorzy[] = new Autor($autor);
}

class Opiekun extends Autor {

    function __construct($imie) {
        $this->imie = $imie . ' (opiekun, autor)';
    }

}

// tworzymy tablice obiektow
$opiekun = array();

foreach ($config->opiekun as $opiekun) {
    $opiekunowie[] = new Opiekun($opiekun);
}

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

foreach ($config->jednostka[$p]->plany->pierwszy_stopien->plan as $plan_Ist) {
    $plany_Ist[] = new Plan($plan_Ist->link, $plan_Ist->opis);
}


$plany_IIst = array();

foreach ($config->jednostka[$p]->plany->drugi_stopien->plan as $plan_IIst) {
    $plany_IIst[] = new Plan($plan_IIst->link, $plan_IIst->opis);
}


/* Ustawienie linku do API (JSON) */
$api_url = $config->jednostka[$p]->apiUrl;
$template->apiUrl = $api_url;

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

// tworzymy tablice obiektow
$sekcje = array();
$sekcje_licznik = array();

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

foreach ($config->jednostka[$p]->sekcje->sekcja as $sekcja) {
    $json = file_get_contents("$api_url" . $sekcja->id_sekcji . "/6/0"); //limit 6 z offsetem 0
    $json_ile = file_get_contents("$api_url" . $sekcja->id_sekcji); //wczytujemy wszystko aby sprawdzic ile jest elementow tablicy
    $s = json_decode($json, true);
    $s_ile = json_decode($json_ile, true);
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
        $sekundy = $czasarr[2]; // obecnie nie używane
        $polskadata = $dzien . '.' . $miesiac . '.' . $rok . ' (' . $godzina . ':' . $minuty . ')';
        $elementy[] = new Elementy($s[$i]['tresc'], $s[$i]['tytul'], $polskadata);
    }

    if ($sekcja['licznik'] != 'tak') {
        $sekcje[] = new Sekcja($sekcja->id_sekcji, $sekcja->tytul_sekcji, "<a href=\"#$sekcja->id_sekcji\" class=$sekcja->id_sekcji>$sekcja->tytul_sekcji</a>", $elementy, $ile, $wiecej);
    } else {
        $sekcje_licznik[] = $sekcje[] = new Sekcja($sekcja->id_sekcji, $sekcja->tytul_sekcji, "<a href=\"#$sekcja->id_sekcji\" class=$sekcja->id_sekcji>$sekcja->tytul_sekcji</a><span class=ui-li-count id=\"licznik_$sekcja->id_sekcji\">0</span>", $elementy, $ile, $wiecej);
    }
}

class SekcjaStatyczna extends Sekcja {

    function __construct($id_sekcji, $tytul_sekcji) {
        $this->id_sekcji = $id_sekcji;
        $this->tytul_sekcji = $tytul_sekcji;
    }

}

// tworzymy tablice obiektow
$sekcje_statyczne = array();

foreach ($config->jednostka[$p]->sekcje_statyczne->sekcja_statyczna as $sekcja_statyczna) {
    $sekcje_statyczne[] = new SekcjaStatyczna($sekcja_statyczna->id_sekcji, $sekcja_statyczna->tytul_sekcji);
}



/*
 * Ustawianie danych pobranych z pliku konfiguracyjnego
 */

$template->opiekunowie = $opiekunowie;
$template->autorzy = $autorzy;

$template->plany_Ist = $plany_Ist;
$template->plany_IIst = $plany_IIst;
$template->sekcje = $sekcje;
$template->sekcje_licznik = $sekcje_licznik;
$template->sekcje_statyczne = $sekcje_statyczne;

$template->nazwa = $config->jednostka[$p]->nazwa;
$template->pelny_tytul = $config->jednostka[$p]->pelny_tytul;
$template->logo_aplikacji = $config->logo_aplikacji;    // 128 x 128

/* loga UwB */
$template->logo_male = $config->logo_male;    // 32 x 32
$template->logo_srednie = $config->logo_srednie;  // 64 x 64
$template->logo_duze = $config->logo_duze;    // 128 x 128

$template->logo_jednostki = $config->jednostka[$p]->logo; // opcjonalne

/* mapa */
$template->tytul = $config->jednostka[$p]->mapa->tytul;
$template->dlugosc = $config->jednostka[$p]->mapa->wspolrzedne->dlugosc;
$template->szerokosc = $config->jednostka[$p]->mapa->wspolrzedne->szerokosc;

/* adres */
$template->kod = $config->jednostka[$p]->adres->kod;
$template->miasto = $config->jednostka[$p]->adres->miasto;
$template->ulica = $config->jednostka[$p]->adres->ulica;
$template->numer = $config->jednostka[$p]->adres->numer;

$template->email = $config->jednostka[$p]->email;

$template->mailto = 'mailto:' . $config->jednostka[$p]->email;

$template->tel1 = $config->jednostka[$p]->tel1;

$tel = 'tel:';
$template->tel1_ = $tel . $config->jednostka[$p]->tel1;

// tutaj dla odmiany nie łączę - dałem tel:${tel2} w template_index.html
$template->tel2 = $config->jednostka[$p]->tel2; // opcjonalne
$template->fax = $config->jednostka[$p]->fax; // opcjonalne


/*
 * Zawartość specyficzna dla platform
 * 
 * - MobiUwB w belce tytułowej na stronie głównej; nie wyświetlana w aplikacji
 * - Wskaźnik stanu połączenia z siecią; nie wyświetlany w aplikacji
 * - Przycisk "Główna"; nie wyświetlany w aplikacji
 * 
 */

// isset powinno być szybsze niż porównywanie wartości.
if (isset($_GET['client'])) {
    $template->mobiuwb = '';
    $template->offline = '';
    $template->glowna = '';
} else {
    $template->mobiuwb = ' MobiUwB ';
    $template->offline = '        <!-- offline indicator - wskaźnik stanu połączenia z siecią (online/offline) -->
	<script src=js/offline.min.js></script>
	<link rel=stylesheet href=css/offline-indicator.css>';
    $template->glowna = "<a href=./?place=$place data-icon=home data-iconpos=left>Główna</a>";
}


/*
 * Odpalenie szablonu
 */

try {
    echo $template->execute();
} catch (Exception $e) {
    echo $e;
}	
	
	

