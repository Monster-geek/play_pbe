﻿	$('#JqueryLangFR').html('<span class="selected">Francais</span>');
	$('#JqueryLangEN').html('<span class="hover"> English </span>');
	$('.choixlang').html('Choix de la langue :');
	$('.connexion').html('Connexion :');
	$('.Pseudo').html('Pseudo');
	$('.pass').html('Mot de passe');
	$('.bouttonCo').html('<span class="hover"><img src="./img/bco.png"></span>');
	$('.recorvery').html('<a href="./sys/recorvery.php">Mot de passe perdu ?</a>');
	$('.inscription').html(' Inscription :');
	$('.confirmPass').html('Confirmez votre mot de passe');
	$('.mail').html('E-mail');
	$('.CGU').html("J'accepte les ");
	$('#CGUinscri').html('<span class="hover"> CGU </span>');
	$('#CGUfoot').html('<span class="hover"> CGU </span>'); 
	$('.bouttonInscrip').html('<span class="hover"><img src="./img/bco.png" /></span>');
	$('.oblig').html("Les champs marqués d'une étoile (*) sont obligatoires.");
	$('.rules').html('<span class="hover">Règles du jeu</span>');
	$('.mention').html('<span class="hover">Mentions légales</span>');
	$('.Patchnotes').html('<span class="hover">Notes de version</span>');
	$.cookie('IGP', 'FR', { expires: 7, path: '/' });
