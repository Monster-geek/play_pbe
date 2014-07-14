<?php 

include 'class_secu.php';
include 'database.php';
//include 'sys_captcha.php';

if ((isset ($_GET['inscrip'])) && ($_GET['inscrip']=='ok')){  // acc�es par Jquery. G�n�re le captcha et le token.

if (isset ($_GET['newPseudo'])){$pseudo = $_GET['newPseudo'];} else {die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Pseudo non d�fini !</center></div>');} 
if ((isset ($_GET['newPass'])) && ($_GET['newPass'] !="")) {$pass = $_GET['newPass'];} else {die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Mot de passe non d�fini !</center></div>');}
if ((isset ($_GET['confirmPass'])) && ($_GET['confirmPass'] !="")) {$confirmPass = $_GET['confirmPass'];} else {die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Confirmez votre mot de passe !</center></div>');}
if (isset ($_GET['mail'])) {$mail = $_GET['mail'];} else {die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Vous devez renseigner une adresse e-mail !</center></div>');}
if ((isset ($_GET['CGU'])) && ($_GET['CGU'] == 'ok')) {$cgu = $_GET['CGU'];} else {die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Vous devez accepter les CGU !</center></div>');}



	if ($pass == $confirmPass){// check de correspondance des pwd
				
			if (preg_match("/^[-+.\w]{3,16}$/i", $pseudo)){ // dat regex pour le controle du pseudo
			
				if (preg_match("/^[-+.\w]{2,64}@[-.\w]{2,64}\.[-.\w]{2,4}$/i", $mail)){// dat regex de controle e-mail
					
					// ici on va cr�er notre captcha en objet
					//$c = new captcha();
					//$code = $c->gen_captcha();
					// une fois le captcha g�n�r� on va stock� le code dans un fichier s�curis� sur le serveur via notre class_secu bien sur :D
					$s = new secu();
					//$rep = "token_captcha_storage";
					//$s->store_token_captcha($rep,$code);
					//et par s�curit� on va d�ja hash� le pass
					$hashed_pass = $s->pwd_hash($pass);
					//puis on va mettre les donn�e en forme pour les pr�-stock� sur le serveur
					$donnees = $pseudo."%".$hashed_pass."%".$mail;
					$rep= "tmp";
					$s->write_user_ins($rep,$donnees);
					echo '<div class="popup_title">Bienvenue sur le PBE</div><div id="Conteneur">';//T�te de code
					echo '<form method="post" action="./sys/sys_inscrip.php">';
					echo '<center> Bienvenue sur le PBE '.$pseudo.' .</center><br />';
					echo '<input type="submit" name="Entrer" value=" Entrer " />';
					echo '</form></div>'; //fin de code
				}
				else
				{
					die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Adresse e-mail invalide !</center></div>');
				}
			}
			else
			{
				die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Pseudo invalide !</center></div>');
			}
			
		}
		else
		{
			die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Les mot de passes ne correspondent pas !</center></div>');
		}
}
elseif(isset($_POST['Entrer'])){

	$s = new secu();
	$rep_BF = "unautorized";
	$lim = 5;

    $error = " ";
    $rep= "tmp";
    $ip = (isset($_SERVER['REMOTE_ADDR']));
    $file =$rep."/".$ip;
    if(file_exists($file)){
        $tmp = $s->read_file($file);
        $tmp = explode("%", $tmp);
        $pseudo = $tmp[0]; $pass = $tmp[1]; $mail = $tmp[2];
    }
    else
    {
        $error = " Fichier d'inscription expir�. Vous aller �tre redirig�...";
    }

    if ($error == " "){
        $req='SELECT `username` FROM `user` WHERE `username` = \''.$pseudo.'\'';
        $result = $mysqli->query($req);
        $row = $result->fetch_array();

        $req2='SELECT `mail_user` FROM `user` WHERE `mail_user` = \''.$mail.'\'';
        $result2 = $mysqli->query($req2);
        $row2 = $result2->fetch_array();


        if (($row['username'] == $pseudo) || ($row2['mail_user'] == $mail)){ // controle d'existance dans la BDD
            $error = "Pseudo ou e-mail d�ja present dans la base de donn�e";
        }
        else
        {
        // on d�clare notre nouvelle classe s�cu et on hash les donn�e

            $id_user = $s->hash_id_user($pseudo,$pass);
            $cookie = $s->cookie_hash($id_user,$ip);

            // on stock tout le bowdel dans la BDD
            $inser='INSERT INTO `user`(`username` ,`mail_user` ,`password`, `key_user`) VALUES (\''.$pseudo.'\',\''.$mail.'\',\''.$pass.'\',\''.$id_user.'\')';
            $mysqli->query($inser);

            $cookDB='INSERT INTO `check_cookie`(`id_user`,`last_cookie`) VALUES (\''.$id_user.'\',\''.$cookie.'\')';
            $mysqli->query($cookDB);

            $expire = time()+3600;
setcookie('IGP_user', $id_user , $expire , "/");
setcookie('IGP_parse', $cookie , $expire , "/");

header('Location: ../session.php');
		}
	}
}
else // un utilisateur n'a rien a faire ici. On le pr�viens que si il continue de fouinn� son IP sera bloqu� :D
{
$s = new secu();
$rep = "unautorized";
$lim = 5;
	//du bla-bla en HTML pour lui dire que putain mec mais qu'est-ce que tu fout la ???!!!
	$error = "Vous ne devriez pas vous trouver ici !!";
	include 'error.php';
	//et on note dans notre carnet noir, niark niark niark...
	$s->anti_brute($rep,$lim);
}
?>