<?php
require_once './libs/PHPTAL.php';

session_start();
$template = new PHPTAL('template_index.html');
$template->setOutputMode(PHPTAL::HTML5);

$template->nazwa = "Instytut Informatyki";
$template->pelny_tytul = 'mobiUwB - Instytut Informatyki';

try {
    echo $template->execute();
}
catch (Exception $e){
    echo $e;
}
?>
