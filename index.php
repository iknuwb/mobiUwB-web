<?php
require_once 'autoload.php';

$loader = new Twig_Loader_Filesystem('dark');
$twig = new Twig_Environment($loader, [
    'cache' => 'tmp\cache',
    'auto_reload' => true,
]);

if (file_exists('config.xml')) {
    $config = simplexml_load_file('config.xml'); // wczytanie pliku konfiguracyjnego
} else {
    exit('Nie mozna otworzyc pliku config.xml.');
}

$x = array();
switch ($_GET['place']) {
    case 'ii':
        foreach ($config->jednostka[0]->sekcje->sekcja as $sekcja) {
            $x["$sekcja->id_sekcji"] = json_decode(file_get_contents($config->jednostka[0]->apiUrl.''.$sekcja->id_sekcji), true);
        }
        break;
    default:
        $place = 'ii';
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "?place=$place";
        header("Location: http://$host$uri/$extra");

        break;
}

 // var_dump($x['io'][0]);
 //echo $x['io'];

    echo $twig->render('home.html.twig', ([
        'title_page' => 'MobiUwB Instytut Informatyki',
        'header' => 'header.html.twig',
        'autorzy' => $config->autorzy->autor,
        'opiekunowie' => $config->opiekunowie->opiekun,
        'num_telefon' => $config->jednostka->tel1,
        'num_fax' => $config->jednostka->fax,
        'instytut_nazwa' => $config->jednostka->nazwa,
        'kod_poczta' => $config->jednostka->adres->kod,
        'miasto' => $config->jednostka->adres->miasto,
        'ulica' => $config->jednostka->adres->ulica,
        'numer_budynku' => $config->jednostka->adres->numer,
        'email' => $config->jednostka->email,
        'logo32' => $config->logo_male,
        'logo_app' => $config->logo_aplikacji,
        'sekcje' => $config->jednostka->sekcje->children(),
        'plany_i_st' => $config->jednostka->plany->pierwszy_stopien->children(),
        'plany_ii_st' => $config->jednostka->plany->drugi_stopien->children(),
        'url_json' => $config->jednostka->apiUrl,
        'json' => $x,

    ]));