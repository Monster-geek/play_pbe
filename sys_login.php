<?php
// on teste si le visiteur a soumis le formulaire de connexion
	if ((isset($_POST['Connexion']) && $_POST['Connexion'] == 'Connexion')||(isset($_POST['Connection'])&& $_POST['Connection']=='Connexion')) {
	  if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['login']) && !empty($_POST['pass']))) {
			
			//rajouté les grains de sel
			
			
			
			
				// on teste si une entree de la base contient ce couple login / pass (ATTENTION PENSER A GERER AVEC LA SURENCRYPTION)
				$sql = 'SELECT count(*) FROM user WHERE username="'.mysql_escape_string($_POST['login']).'" AND password="'.mysql_escape_string(md5($_POST['pass'])).'"';
				$result = $mysqli->query($sql);
				$data = $result->fetch_array();
				$result->free();
				
				// si on obtient une reponse, alors l'utilisateur est un membre
				if ($data[0] == 1) {
				

							session_start();
							$_SESSION['login'] = $_POST['login'] ;
							header('Location: session.php');
							exit();
						
				}
				// si on ne trouve aucune reponse, le visiteur s'est trompe soit dans son login, soit dans son mot de passe
				elseif ($data[0] == 0) {
				  $erreur = 'Compte non reconnu ou mot de passe errone.';
					}
				// sinon, alors la, il y a un gros probleme :)
				else {
				  $erreur = 'Probleme dans la base de donnees : plusieurs membres ont les memes identifiants de connexion.';
					}
		}	
		else {
			$erreur = 'Au moins un des champs est vide.';
		}
	}
?>