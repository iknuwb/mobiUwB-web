<?php
require_once './libs/PHPTAL.php';

$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

class Sekcja {
    public $url;
    public $id;
    public $st;

    function Sekcja($url, $id, $st) {
        $this->url = $url;
        $this->id = $id;
        $this->st = $st;
    }
}

$apiUrl = 'http://ii.uwb.edu.pl/api/serwis/?/json';
$sekcje = array();
// to pozniej z konfiga
$sekcje[] = new Sekcja($apiUrl."/io", "aktualnosci", "Aktualności");
$sekcje[] = new Sekcja($apiUrl."/sz", "sz", "Zajęcia odwołane");
$sekcje[] = new Sekcja($apiUrl."/bk", "bk", "Biuro karier");
$sekcje[] = new Sekcja($apiUrl."/sk", "sk", "Szkolenia i praktyki");
$sekcje[] = new Sekcja($apiUrl."/so", "so", "Sprawy ogólne");


$template->tytul = 'mobiUwB';
$template->jednostka = "Instytut Informatyki";
$template->pelny_tytul = 'mobiUwB - Instytut Informatyki';
$template->sekcje = $sekcje;

try {
    echo $template->execute();
}
catch (Exception $e){
    echo $e;
}
?>
