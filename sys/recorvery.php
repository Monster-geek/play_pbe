<?php 

if(isset($_POST['pseudo']) && isset($_POST['mail']))
{
	include 'sys_recorvery.php';
}
if(isset($_GET['token']) && isset($_GET['mail_user']))
{
	include 'sys_recorvery.php';
}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" media="all" href="error.css" />
<link rel="stylesheet" type="text/css" media="all" href="../style/style.css">
</head>

<body>
<?php
if(isset($_COOKIE['IGP'])){
	if($_COOKIE['IGP'] == 'FR'){
		echo '
		<div id="titre"><center> Mot de passe perdu ? </center></div>
		<div class="menu_titre"><span class="connexion">Saisir vos informations</span></div>
		<div class="menu">
		<ul class="menu_gauche">
		<form action="recorvery.php" method="post">
		<li><span class="Pseudo">Pseudo</span> : <br /> <input type="text" name="pseudo" id="pseudo" ><br /></li>
		<li><span class="pass">Email</span> : <br /> <input type="text" name="mail" id="mail" ><br /></li>
		<li><input type="submit" value="Envoyer" /></li>
		<div id="erreur"></div>
		</form>
		</ul>
		</div>';
	}
	elseif($_COOKIE['IGP'] == 'EN'){
		echo '
		<div id="titre"><center> Lost your password ? </center></div>
		<div class="menu_titre"><span class="connexion">Enter your informations </span></div>
		<div class="menu">
		<ul class="menu_gauche">
		<form action="recorvery.php" method="post">
		<li><span class="Pseudo">Pseudo</span> : <br /> <input type="text" name="pseudo" id="pseudo" ><br /></li>
		<li><span class="pass">Email</span> : <br /> <input type="text" name="mail" id="mail" ><br /></li>
		<li><br /><span class="bouttonCo"><span class="hover"><img src="../img/bco.png"></span></span></li>
		<li><input type="submit" value="Send" /></li>
		<div id="erreur"></div>
		</form>
		</ul>
		</div>'
		;
	}
}
?>
<br/>
</body>

</html>