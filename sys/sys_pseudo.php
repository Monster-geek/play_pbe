<?php

include 'database.php';

$pseudo = $_POST['pseudo'];
if(strlen($pseudo) == 0)
{
echo ('empty');
}
else 
{
// On r�cup�re la liste des membres et on check si le pseudo existe d�j�
$query = ("SELECT `username` FROM `user` WHERE `username`='".$pseudo."'");
$req = $mysqli->query($query);
$test = $req->fetch_array();
// On d�roule la liste
// Si le pseuo existe d�j� on retourne non

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