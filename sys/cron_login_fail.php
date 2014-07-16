<?php

include 'class_secu.php';

if($dossier = opendir('./login_fail')){
	while(false !== ($file = readdir($dossier))){
		if(($file != '.') && ($file != '..') && ($file != '.htaccess')){
			$s = new secu();
			$tmp = $s->read_file($file);
			$tmp = explode("-", $tmp);
			$nb_try = $tmp[0]; $time_try = $tmp[1];
			
			if (($nb_try < 5) && ($time_try > (time() + 295)))
				unlink($file);
			elseif(($nb_try > 5) && ($time_try > (time() + 295)))
				

?>