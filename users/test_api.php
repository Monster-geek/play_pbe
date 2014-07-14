<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13/07/14
 * Time: 13:40
 */

include 'api_dev.php';

$msg = "Test de la fonction set_message() ";
$date = "13/07/2014";
$heure = "13:41";

$api = new api_dev();

$api->set_message($msg,$date,$heure);

echo 'Done !';
echo 'Affichage ... ';

$msg_to_print = $api->get_info_dev();

echo $msg_to_print;