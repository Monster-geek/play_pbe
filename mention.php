<?php 
if(isset($_COOKIE['IGP'])){
	if($_COOKIE['IGP'] == 'FR'){
		echo '
		<div class="popup_title">Mentions Légales</div>
		<div id="Conteneur">
		Même si toutes les précautions ont été prises, InfiniTeam Gaming ne pourra être tenu responsable du contenu des liens externes. Si vous découvrez des contenus condamnables, nous vous prions de nous en informer.<br /> <br /> 
		Tous les droits sur les codes sources, les textes, les graphismes et tout autre contenu légalement protégé appartiennent à InfiniTeam Gaming et autres personnes cité dans les mentions de copyrights. 
		</div>'; 
	}
	elseif($_COOKIE['IGP'] == 'EN')
	{
	echo '
		<div class="popup_title">Imprint</div>
		<div id="Conteneur">
		While every precaution has been taken InfiniTeam Gaming can not be held responsible for the content of external links. If you find reprehensible content, please inform us.<br /> <br />
		All rights to the source code, text, graphics and other content belong to legally protected InfiniTeam Gaming and other persons mentioned in the copyright notices.
		</div>';
	
	}
}
else
{
echo 'Cookie Error !';
}
?>