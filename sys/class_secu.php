<?php
 class secu {

 
	// création de l'id_user
	public function hash_id_user($nom_user, $pass){
		$id_user = md5('salt 1').md5($nom_user).md5($pass).md5('salt 2'); //4*32=128
		$id_user = sha1('salt 3').sha1($id_user).sha1('salt 4');//3*40=120
		$id_user = md5($id_user);//32
			
		return $id_user;
	}

	//Broyeur de variable pour la recette des cookies	
	public function cookie_hash($id_user, $ip){
		
		$cookie = $id_user.md5('200.158.16'.md5($ip));
		$cookie = sha1($cookie);
			
		return $cookie;
	}
		
	//Broyeur de password
	public function pwd_hash($pass){
		$hash_pass = md5(sha1($pass));
		
		return $hash_pass;
	}
	
	//ici on fabrique les cookie on les emballe plus tard :p
	public function cookie_parse($cookie , $id_user){
		$expire = time()+3600;
		setcookie('IGP_user', $id_user , $expire);
		setcookie('IGP_parse', $cookie , $expire);
	}
	
	//Fonction pour se simplifier la lecture d'un fichier :D
	public function read_file($file) {
		$file = fopen($file, 'r');
		$buf = "";
		while($line = fgets($file)) {
			$buf.=$line;
		}
		fclose($file);
		return $buf;
	}
	
	//Fonction pour simplifier l'écriture dans un fichier
	public function write_file($file, $text) {
		file_exists($file) ? unlink($file): $ret=1;
		$file = fopen($file, 'a');
		fputs($file, $text);
		fclose($file);
		return TRUE;
	}
	
	public function write_user_ins($rep,$donnees){
		if(!is_dir($rep))
			mkdir($rep);
		
		$ip =(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR'];
		$file =$rep."/".$ip;
		
		if(file_exists($file)){ //On vérifie que il n'y ai pas déja un token sinon on va avoir un sale conflit...
			unlink($file);//On destroy purement et simplement !
			$this->write_file($file,$donnees."%".time());
		}
		else
		{
			$this->write_file($file,$donnees."%".time()); //structure : pseudo%mdp_hashé%mail%heure
		}												  //           $tmp[0]% $tmp[1] % $tmp[2] % tmp[3]
	}
	
	//Vérificateur de clé beta
	public function beta_key_check($beta_key){
	
		if (preg_match("/^[-+.\w]{30,34}$/i", $beta_key)){
			$beta_key = trim($beta_key);
			$key_32 = strlen($beta_key);
			if ($key_32 == 32){
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	//LA fonction ultime de sécurité ^^ Elle créer le token avec le code ^^ (la plus part des variable et procedure sont décrite dans la fonction juste en-dessous... Programmeur Fénéant !!!
	/*public function store_token_captcha($rep,$code){ //parametres : $rep = Repertoire de stockage des fichier , $code = code du captcha
		if(!is_dir($rep))
			mkdir($rep);
		
		$ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR']; 
		$file =$rep."/".$ip;
		
		if(file_exists($file)){ //On vérifie que il n'y ai pas déja un token sinon on va avoir un sale conflit...
			unlink($file);//On destroy purement et simplement !
			// et on oublie pas d'un recreer un nan mais ho !
			$this->write_file($file, $code."-".time());
		}
		else //Ben sinon c'est cool on va créer notre token :p
		{
			$this->write_file($file, $code."-".time()); //hé ben voila c'était pas si dur :o
		}
	}
	*/
	//Une fonction simple pour check notre token
	/*public function check_token_captcha($rep,$code){
		if(!is_dir($rep))
			mkdir($rep);
	
		$ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR']; 
		$file =$rep."/".$ip; //j'aurai pu faire une fonction pour ça au lieu de copier coller comme un cochon mais trop d'objet, tue l'objet...
	
		if(file_exists($file)){ // si notre token est la...
		
			$tmp = $this->read_file($file); //Php lis le fichier avec ses petit yeux o_o
			$tmp = explode("-", $tmp); //Il fais son petit tri...
			$i = $tmp[0]; $time = $tmp[1];
			//voila monsieur est pret a bossé... ENFIN !
			
			if($i == $code){ //ben la c'est simple le code correspond on laisse passé gentiment
				unlink($file); // on eclate la gueule du token on s'enfout on a plus besoin !
				return TRUE; //Ben on lui ok c'est bon fais ce que tu a faire :D 
			}
			else //ha ben la c'est moins cool...Le mec c'est planté dans son truc...
			{
				unlink($file);// on eclate le token, on va en refaire un au prochain try...
				return FALSE; // et on dit non c'est pas cool 
			}
		}
		else // ca c'est genre le mec est partie pisser et la CRONTAB a dégagé le token expiré (et oui 5 min les enfants...)
		{
			return FALSE; // on y va pas par quatres chemins, on dit que c'est pas cool et c'est tout !
		}
	}
	*/
	// le meilleur pour la fin :D l'anti-bruteforce :p
	public function anti_brute($rep, $lim) {
		if(!is_dir($rep))			
			mkdir($rep);
		// On récupère l'ip de l'utilisateur pour trier les tentatives de connexion
		$ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR']; // Ici on stocke dans $ip l'adresse publique du client, même si il passe par un proxy.
		$file=$rep."/".$ip;
		
		if(file_exists($file)) {
			// Si le fichier existes ( c'est à dire que l'utilisateur avec l'ip $ip s'est déjà trompé.
			$tmp = $this->read_file($file); // On lit le fichier
			$tmp = explode("-", $tmp); // On l'explose pour récupérer d'un coté le nombre de tentatives, et le timestamp de la dernière
			$i = $tmp[0]; $time = $tmp[1];
			
			// Si la dernière tentative était il y a 1h, on remet le compteur à 0
			if($time <= (time()-(3600))) {
				unlink($file);
				$this->anti_brute($rep, $lim);
			}
			
			// Si le nombre de tentative est en dessous de la limite, on incrémente le compteur et on met à jour le fichier
			if($i < $lim) {
				$this->write_file($file, ($i+1)."-".time());
			// Si la limite est atteinte, on tue le script.
			} else if($i >= $lim) {
				$this->write_file($file, ($i+1)."-".time());
				die("Security error | Limit: ".$lim." reached");
			}
		} 
		else 
		{ // Première erreur, on met à jour le fichier
			$this->write_file($file, "1-".time());
		}
		
		return TRUE;
	}
	
	public function gen_token()
	{
		$characts    = 'abcdefghijklmnopqrstuvwxyz';	
		$characts   .= '1234567890'; 
		$token       = ''; 

		for($i=0;$i < 20;$i++)    
		{ 
			$token  .= substr($characts,rand()%(strlen($characts)),1); 
		}
		
		return $token; 
	
	}
}
?>