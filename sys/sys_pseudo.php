<?php

include 'database.php';

$pseudo = $_POST['pseudo'];
if(strlen($pseudo) == 0)
{
echo ('empty');
}
else 
{
// On récupère la liste des membres et on check si le pseudo existe déjà
$query = ("SELECT `username` FROM `user` WHERE `username`='".$pseudo."'");
$req = $mysqli->query($query);
$test = $req->fetch_array();
// On déroule la liste
// Si le pseuo existe déjà on retourne non

if($test[0] == '1' || $test[0] > '1')
	{
		echo ('no');
		$ok = false;
	}
	else
	{
		echo ('yes');
	}
} 
?>