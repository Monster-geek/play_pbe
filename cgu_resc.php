<?php
if(isset($_COOKIE['IGP'])){
	if($_COOKIE['IGP'] == 'FR'){ 
		echo '
		<div class="popup_title">CGU</div>
		<div id="Conteneur">
		<center><i><b>1. Sécurité des données:</i></b></center> <br/>
		Toutes les données collectées sont : <br />
		-Votre IP publique . <br />
		-Votre e-mail . <br />
		-Et votre pseudo . <br /><br/>
		Ces données sont stockées de façons sécurisé sur nos serveurs et ont pour but unique de vous protéger du vol de compte et de protéger l\'infractucture InfiniTeam Gaming contre les attaques automatisées.<br/>
		Ces données sont prélevées et encryptées à sens unique lors des opérations suivantes: <br />
		-Tentatives d\'inscriptions réussie ou échouée.<br />
		-Tentatives de connection réussie ou échouée.<br />
		-Tentatives d\'accès non autorisée à des fichiers systèmes.<br /><br />
		Les données concernant les adresses IP sont supprimées automatiquement selon un délai compris entre 5 minutes et 2 heures selon la nature du système de sécurité concerné.<br /> 
		</div>';
	}
	elseif($_COOKIE['IGP'] == 'EN'){
		echo '
		<div class="popup_title">TOS</div>
		<div id="Conteneur">
		<center><i><b>1. Data Security:</i></b></center> <br/>
		All data collected are : <br />
		-Your public IP . <br />
		-Your e-mail . <br />
		-And your nickname . <br /><br/>
		These data are stored on our secure servers and ways for the sole purpose to protect yourself from account theft and protect the InfiniTeam Gaming\'s network against automated attacks..<br/>
		These data are collected and encrypted one-way during the following operations : <br />
		-Attempt succeeded or failed registration.<br />
		-Attempts succeeded or failed connection.<br />
		-Unauthorized attempts to access to system files.<br /><br />
		Data on IP addresses are automatically removed in a period between 5 minutes and 2 hours depending on the nature of the security system concerned.<br /> 
		</div>';
	}
}
else
{
echo 'Cookie Error !';
}
?>