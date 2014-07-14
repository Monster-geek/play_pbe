<?php 
if(isset($_COOKIE['IGP'])){
	if($_COOKIE['IGP'] == 'FR'){
		echo ' 
		<div class="popup_title">Règle de Jeu</div>
		<div id="Conteneur">  Les règles de jeu seront définis pour l\'Open Beta . 
		</div> ';
	}
	elseif ($_COOKIE['IGP'] == 'EN'){
		echo ' 
		<div class="popup_title">Game\'s rules</div>
		<div id="Conteneur">The game\'s rules will be defined for the Open Beta. 
		</div> ';
	}
}
else
{
echo 'Cookie Error !';
}
?>