<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<!-- LIB JQUERY -->
	<!-- <script type="text/javascript"  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="/js/libs/jquery.min.js"><\/script>')</script>
	
	<!-- FEUILLE DE STYLE -->
	<link rel="stylesheet" type="text/css" media="all" href="style.css" />
	
	<!-- SCRIPT JS/JQUERY -->
	<script type="text/javascript" src="/js/heureDate.js"></script>
	<script type="text/javascript" src="/js/libs/jquery.bpopup.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/libs/jquery.cookie.js"></script>
	<script type="text/javascript" src="/js/gestionLang.js"></script>
	<!-- DIVERS -->
	<title>Lindsey Crunch - BETA</title>
	
</head>

<body>


<!-- Definition des popup pour Jquery -->
<div id="Popup">
	<div class="b-close"><img src="/img/close.png" /></div>
	<div id="contain"><!--<div id="loading"><img src="/img/loading.gif" />--></div></div>
</div>


<!-- BARRE DE HAUT -->
<div id="header">
	<ul id="menu_horizontal">
	<li><span id="JqueryLangFR"></span> | <span id="JqueryLangEN"></span> </li>
	<li><a href="http://infiniteam-gaming.org/">Site principal</a></li>
	<li><span id="date_heure"></span><script type="text/javascript">window.onload = date_heure('date_heure');</script></li>
	</ul>
</div>

<!-- BLOC DE CONNECTION / INSCRIPTION -->
<div id="connection">
<form action="" method="post">
	<div class="menu_titre"><span class="connexion"></span></div>
	<div class="menu">
	<ul class="menu_gauche">
	<li><span class="Pseudo"></span> : <br /> <input type="text" name="login" id="username" ><br /></li>
	<li><span class="pass"></span> : <br /> <input type="password" name="pass" id="pass" ><br /></li>
	<li><br /><span class="bouttonCo"></span></li>
	<div id="erreur"></div>
	<li><span class="recorvery"></span> </li>
	</ul>
	</div>
	<br />
</form>
<form action="" method="post">
	<div class="menu_titre"><span class="inscription"></span></div>
	<div class="menu">
	<ul class="menu_gauche">
	<li><span class="Pseudo"></span>* :<br /> <input type="text" name="newPseudo" id="NewPseudo"><span id="HelpUserName"><img src="./img/help.png" /></span><span id="msgbox-name"></span></li><br/>
	<li><span class="pass"></span>* :<br /> <input type="password" name="newPass" id="NewPass"><span id="HelpPass"><img src="./img/help.png" /></span><span id="msgbox-mdp"></span></li><br/>
	<li><span class="confirmPass"></span>* :<br /> <input type="password" name="confirmPass" id="confirmPass"></li><br/>
	<li><span class="mail"></span>* :<br /> <input type="text" name="mail" id="mail"></li><br/>
	<li><span class="CGU"></span><span id="CGUinscri"></span>*<input type="checkbox" name="CGU" id="CGUJquery"></li><br/>
	<li><span class="bouttonInscrip"></span></li><br/>
	<li><span class="oblig"></span> </li><br/>
	</ul>
	</div>
</div>


<!-- BARRE DE BAS -->
<div id="footer">
<ul id="menu_bas">
	<li><div id="CGU"><span id="CGUfoot"></span></div></li>
	<li><div id="JqueryRegles"><span class="rules"></span></div></li>
	<li><div id="JqueryMention"><span class="mention"></span></div></li>
	<li><div id="Version"><span class="Patchnotes"></span></div></li>
	<li><div id="JqueryCopy"><span class="hover">Copyright 2013 © InfiniTeam Gaming</span></div></li>
</ul>
</div>

<!-- FIN -->
</body>
</html>