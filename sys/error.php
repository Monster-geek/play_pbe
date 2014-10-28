<html>
<head>
<link rel="stylesheet" type="text/css" media="all" href="/sys/error.css" />
</head>

<body>
<div id="titre"><center> Oups... Y a un truc qui va pas... </center></div>
<br/>
<div id="err"><center> <?php if($error != null){ echo $error; } ?> </center></div>
<div id="container_form"><center><?php if($form != null){ echo $form; } ?></center></div>
</body>

</html>