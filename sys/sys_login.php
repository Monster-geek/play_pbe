<?php
include 'class_secu.php';
include 'database.php';
if((isset($_POST['login']))&& ($_POST['login'] = 'login')){

	if((isset($_POST['username']))&&($_POST['username'] != "")){$username = $_POST['username'];}else{die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Pseudo invalide !</center></div>');}
	if((isset($_POST['pass']))&&($_POST['pass'] != "")){$pass = $_POST['pass'];}else{die('<div class="popup_title">Erreur !</div><div id="Conteneur"> <center> Mot de passe invalide !</center></div>');}

	if (preg_match("/^[-+.\w]{3,16}$/i", $username)){ // dat regex pour le controle du pseudo
		
		$s = new secu();
		$pass = $s->pwd_hash($pass);
		$rep_BF = "login_fail";
		$lim = 5 ;
		$req = 'SELECT `username`,`password`,`key_user` FROM `user` WHERE `username` = \''.$username.'\' AND `password` = \''.$pass.'\'';
		$result = $mysqli->query($req);
		$row = $result->fetch_array();
		
		if(($row['username'] == $username) && ( $row['password'] == $pass)){
		
		    $id_user_login = $row['key_user'];
		
		    $cookie_req = 'SELECT `id_user`, `last_cookie` FROM `check_cookie` WHERE `id_user`= \''.$id_user_login.'\' ';
		    $cookie_result = $mysqli->query($cookie_req);
		    $cookie_row = $cookie_result->fetch_array();
		
		    $id_user = $cookie_row['id_user'];
		    $cookie = $cookie_row['last_cookie'];
		
            if ((strlen($id_user)==32) && (strlen($cookie)==40) /*(strlen($id_user) <= 33) && (strlen($cookie)<=41)*/){


                $expire = time()+3600;
                setcookie('IGP_user', $id_user , $expire , "/");
                setcookie('IGP_parse', $cookie , $expire , "/");

                echo '<div class="popup_title">Bonjour '.$username.' . </div><div id="Conteneur">';
                echo '<center>Bienvenue '.$username.' . Ravi de vous revoir :D</center> ' ;
                echo '<form method="post" action="./session.php"><input type="submit" name="login" value=" Entrer " /></form>';
                echo '</form></div>';

            }
            else
            {

                // TODO : A remplacer par le nouveau système d'update de cookie !
                // Dans la pop-up bouton et champs JQuery pour saisir le mot de passe de confirmation
                // Si ok vider le contenue de la pop-up pour le remplacer par le bouton de login

                $s = new secu();

                $ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR'];
                $cookie_login=$s->cookie_hash($id_user, $ip);

                $cookDB='UPDATE `check_cookie` SET `last_cookie`=\''.$cookie_login.'\' WHERE `id_user` = \''.$id_user.'\' ';
                $mysqli->query($cookDB);
                $id_user = $id_user_login;
                $cookie = $cookie_login;
            }

		}
		else
		{
			echo '<div class="popup_title">Erreur !</div><div id="Conteneur">';
			echo '<center>Combinaison login/mot de passe invalide !</center> ' ;
			echo '</form></div>';
			$s->anti_brute($rep_BF,$lim);
		}	
		
	}
	else
	{
			echo '<div class="popup_title">Erreur !</div><div id="Conteneur">';
			echo '<center>Pseudo invalide !</center> ' ;
			echo '</form></div>';
			$s->anti_brute($rep_BF,$lim);;
	}
}
else
{
$s = new secu();
$rep = "unautorized";
$lim = 5;
	$error = "Vous ne devriez pas vous trouver ici !!";
	include 'error.php';
	$s->anti_brute($rep,$lim);
}
?>