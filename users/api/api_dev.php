<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13/07/14
 * Time: 02:33
 */


class api_dev{


    public function get_info_dev(){

        include './sys/database.php';
        $get_msg = "SELECT  `corps_msg` ,  `date_msg` FROM  `api_dev` WHERE  `last_msg` =  '1'";
        $get_msg_row = $mysqli->query($get_msg);
        $msg_row = $get_msg_row->fetch_array();

        $final_msg = $msg_row['corps_msg']." En date du : ".$msg_row['date_msg'];

        return $final_msg;
    }

    public function get_version(){

        //retourne les info sur le dernier patch en date.
		
		include './sys/database.php';
	
		
    }

    public function set_message($message,$date,$heure,$key_dev){

		//
		// TO DO : faire un systeme de controle de la clé dev pour l'update du message de l'état systeme
		//
		
		
        include './sys/database.php';
        //on passe l'ancien message à 0

        $update = "UPDATE  `pbeplay`.`api_dev` SET  `last_msg` =  '0' WHERE  `api_dev`.`last_msg` =1;";
        $mysqli->query($update);

        $new_msg = "INSERT INTO `pbeplay`.`api_dev` (`corps_msg`, `date_msg`, `last_msg`) VALUES ('".$message."', '".$date." à ".$heure."', '1');";
        $mysqli->query($new_msg);

    }

    public function set_version($version,$date_build,$date_release,$key_dev){

        //mettre a jour la version.

    }
}
?>