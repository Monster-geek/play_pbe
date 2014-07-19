<?php
if((isset($_GET['token'])) && (isset($_GET['mail_user'])))
{
include 'database.php';
$token = $_GET['token'];
$mail_user = $_GET['mail_user'];

$rq_check = "SELECT token , email_user FROM token_reset WHERE token='".$token."' AND email_user='".$mail_user."'";
$rq_check_ex = $mysqli->query($rq_check);
$rq_check_row = $rq_check_ex->fetch_array();

echo $rq_check_row['token'];
echo $rq_check_row['email_user'];
// A finir...
if($rq_check_row['token']!="" && $rq_check_row['email_user']!=""){

	$rq_delet = "DELETE FROM token_reset WHERE token = '".$token."'";
	$mysqli->query($rq_delet);
	die('Token supprimé !');
}
else
{
	die('Token invalide !');
}
}

if((isset($_POST['mail'])) && (isset($_POST['pseudo']))){
	
	$pseudo = $_POST['pseudo']; 
	$mail_user = $_POST['mail'];
	
	include 'database.php';
	include 'class_secu.php';
	
	$s = new secu();
	
	$rq1 = "SELECT username , mail_user FROM user WHERE username = '".$pseudo."' AND mail_user = '".$mail_user."'";
	$is_ok = $mysqli->query($rq1);
	$is_ok_row = $is_ok->fetch_array();
	
	$pseudo_BDD = $is_ok_row['username'];
	$mail_BDD = $is_ok_row['mail_user'];
	
	$rq_check = "SELECT email_user FROM token_reset WHERE email_user = '".$mail_user."'";
	$is_ok_check = $mysqli->query($rq_check);
	$is_ok_check_row = $is_ok_check->fetch_array();
	
	if ($pseudo == $pseudo_BDD )
	{
		if (($mail_user == $mail_BDD) &&($mail_user !=$is_ok_check_row['email_user']))
		{
			//On génére le lien spécial vers recorvery.php par methode GET et jeton dans la base de donnée.
			//structure url : http://play.infiniteam-gaming.org/recorvery.php?token=XXXXXX&mail_user=xxxx@xxxx.xx
			//$token sera stocké dans la BDD. il aura une date et heure d'expiration. A 3h du mat chaque jour une CRON général de ménage videra la table.
			$token = $s->gen_token();
			$final_url = 'http://pbe.infiniteam-gaming.org/sys/recorvery.php?token='.$token.'&mail_user='.$mail_user;
			$expire_date = time()+ (2*3600);
			
			$rq2="INSERT INTO token_reset VALUES('".$token."','".$mail_user."','".$expire_date."')";
			$store_token= $mysqli->query($rq2);
			//on send le lien via email
			
			$name = "Lindsey Crunch - Password Recorvey System";
			$email = "no-reply@infiniteam-gaming.org";
			$recipient = $mail_user;
			$mail_body = "Test du recorvery. Voici le lien : ".$final_url ;
			$subject = "Demande de récupération de mot de passe.";
			$header = "From: ".$name."<".$email.">\r\n";
			
			mail($recipient,$subject,$mail_body,$header);
		}
		else
		{
			die('Email invalide !');
			//+1 anti-BF
		}
	}
	else
	{
		die('Pseudo invalide !');
		//+1 anti-BF
	}
}
else
{
echo 'Accès non autorisé à un fichier système !';
}
?>