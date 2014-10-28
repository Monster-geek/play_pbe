<html>
   <head>
<title>Session</title>
	<!-- LIB JQUERY -->
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./js/libs/jquery.min.js"><\/script>')</script>

    <!-- JQuery -->
    <script type="text/javascript" src="./js/main_session.js"></script>
    <script type="text/javascript" src="./js/libs/jquery.bpopup.min.js"></script>
    <script type="text/javascript" src="./js/libs/jquery.cookie.js"></script>
    <script type="text/javascript" src="./js/gestionLang.js"></script>


    <!-- Style -->
    <link rel="stylesheet" type="text/css" media="all" href="./style/style.css" />

</head>


<body>

<!-- Définition des pop-up -->
<div id="Popup">
    <div class="b-close"><img src="./img/close.png" /></div>
    <div id="contain"><!-- <div id="loading"><img src="/img/loading.gif" /> --></div></div>
</div>

<!-- Barre du haut-->
<div id="header">
    <ul id="menu_horizontal">
        <li id ="user_name">
            <?php echo 'Joueur : '.$username; ?>
        </li>
        <li id="ID_user_PBE">
            <?php echo 'ID User : '.$id_user; ?>
        </li>
        <li id="close_session">
            <form method="post" action="session.php"  >
                <input type="submit" name="destroysess" value="Fermer la session.">
            </form>
        </li>
    </ul>
</div>

<br />
<br />
 <?php
 // gestion des info users
 echo 'Votre empreinte de cookie est : '.$check_hash_cookie.'';
 ?>	
 <br />
 <?php
 echo 'Cette partie est toujours en construction...';
 ?>
 <br />
 <br />
<?php
echo 'Dernier messages des developpeurs : <br />';
 $api_dev = new api_dev();
 $msg = $api_dev->get_info_dev();
 echo $msg;
?>


<br />
<!-- ## FOOTER ##-->
<div id="footer">
    <ul id="menu_bas">
        <li><div id="CGU"><span id="CGUfoot">CGU</span></div></li>
        <li><div id="JqueryRegles"><span class="rules">Rules</span></div></li>
        <li><div id="JqueryMention"><span class="mention">Mentions</span></div></li>
        <li><div id="Version"><span class="Patchnotes">Patchlogs</span></div></li>
        <li><div id="JqueryCopy"><span class="hover">Copyright 2014 © InfiniTeam Gaming</span></div></li>
    </ul>
</div>


</body>
</html>