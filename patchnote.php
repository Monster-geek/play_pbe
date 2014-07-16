<?php
if(isset($_COOKIE['IGP'])){
	if($_COOKIE['IGP'] == 'FR'){
		echo '

		<div class="popup_title">Notes de versions</div>
		<div id="Conteneur"> 
			<center><b>Version 0.1 (PBE ONLY)</b></center><br /> 
			<b><u>Système :</u></b> <br />
			<span class="PL_Ajout">[+]</span>: Ajout du patchnote.<br />
			<span class="PL_Ajout">[+]</span>: Traduction en anglais des CGU , régles du jeu et des mentions légales.<br />
			<span class="PL_Removed">[-]</span>: Désactivation de la verification de la clé beta pour le PBE. <br />
			<span class="PL_MAJ">[MAJ]</span>: Mise à jour de Jquery en Version 2.1.0. <br/>
			<span class="PL_Patch">[PATCH]</span>: Correction d\'une faille mineure.<br />
		</div> 
		';
	}
	elseif($_COOKIE['IGP'] == 'EN'){
		echo '
		<div class="popup_title">Release Notes</div>
		<div id="Conteneur"> 
			<center><b>Version 0.1 (PBE ONLY)</b></center><br /> 
			<b><u>System :</u></b> <br />
			<span class="PL_Ajout">[+]</span>: Patchnote added .<br />
			<span class="PL_Ajout">[+]</span>: English translation of the TOS, rules of the game and legal.<br />
			<span class="PL_Removed">[-]</span>: Disabling the verification of the beta key for the PBE. <br />
			<span class="PL_MAJ">[MAJ]</span>: Updated Jquery in Version 2.1.0. <br/>
			<span class="PL_Patch">[PATCH]</span>: Fixed a minor flaw.<br />
		</div> 
		';
	}
}
else
{
echo 'Cookie Error !';
}
?>