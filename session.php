<?php

include './sys/database.php';
include './sys/class_secu.php';

if ((isset($_POST['destroysess'])) && ($_POST['destroysess'] = 'Fermer la session.'))
{
setcookie ("IGP_user", "", time() - (24*3600));
setcookie ("IGP_parse", "", time() - (24*3600));
header('Location: index.php');
}
if((isset($_COOKIE['IGP_user'])) && (isset($_COOKIE['IGP_parse']))){
	$id_user = $_COOKIE['IGP_user'];
	$hash_cookie = $_COOKIE['IGP_parse'];
	
	$check_req = 'SELECT `id_user`, `last_cookie` FROM `check_cookie` WHERE `id_user`= \''.$id_user.'\' AND `last_cookie` = \''.$hash_cookie.'\' ';
	$check_result = $mysqli->query($check_req);
	$check_row = $check_result->fetch_array();
	
	$s = new secu();
	$ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR'];
	$check_hash_cookie = $s->cookie_hash($id_user,$ip);

		if(($check_row['id_user'] == $id_user) && ($hash_cookie == $check_hash_cookie)){
		
		$user_req = 'SELECT `username` FROM `user` WHERE `key_user` = \''.$id_user.'\' ';
		$user_result = $mysqli->query($user_req);
		$user_row = $user_result->fetch_array();
		
		$username = $user_row['username'];
		
		include './users/view_session.php';
		}
		else
		{
		header('Location: index.php');
		}

}
else
{
header('Location: index.php');
}
?>