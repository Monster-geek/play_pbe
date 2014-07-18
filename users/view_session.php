<html>
   <head>
<title>Session</title>
	<!-- LIB JQUERY -->
	<!-- <script type="text/javascript"  src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="/js/libs/jquery.min.js"><\/script>')</script>


</head>
<body>

<!-- ## HEADER ##-->


<br />
 <?php
 // gestion des info users
 echo 'Bienvenu '.$username.' . Votre ID User est : '.$id_user.'';
 ?>	
 <br />
 <?php
 echo 'Cette partie est toujours en construction...';
 ?>
 <br />
<?php
echo 'Dernier messages des developpeurs : <br />';
echo "Bug sur l'API. Elle est désactivé pour le moment. ";
 /*include '/api/api_dev.php';
 $api_dev = new api_dev();
 $msg = $api_dev->get_info_dev();
 echo $msg;
*/?>
<form method="post" action="session.php"  >
<input type="submit" name="destroysess" value="Fermer la session."></form>
<!-- ## /HEADER ##-->

<br />
<!-- ## FOOTER ##-->
<div id="footer"><a href="patchnote.php" target="blank"> Notes de mises � jours. </a></div>
<!-- ## /FOOTER ##-->
</body>
</html>