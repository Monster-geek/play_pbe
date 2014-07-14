<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13/07/14
 * Time: 02:33
 */


class api_dev extends Mysqli{


    public function get_info_dev(){

        include './sys/database.php';
        $get_msg = "SELECT  `corps_msg` ,  `date_msg` FROM  `api_dev` WHERE  `last_msg` =  '1'";
        $get_msg_row = $this->query($get_msg);
        $msg_row = $get_msg_row->fetch_array();

        $final_msg = $msg_row['corps_msg']." ".$msg_row['date_msg'];

        return $final_msg;
    }

    public function get_version(){

        //retourne les info sur le dernier patch en date.

    }

    public function set_message($message,$date,$heure){

        include '../../sys/database.php';
        //on passe l'ancien message à 0

        $update = "UPDATE  `pbeplay`.`api_dev` SET  `last_msg` =  '0' WHERE  `api_dev`.`last_msg` =1;";
        $this->query($update);

        $new_msg = "INSERT INTO `pbeplay`.`api_dev` (`corps_msg`, `date_msg`, `last_msg`) VALUES ('".$message."', '".$date." à ".$heure."', '1');";
        $this->query($new_msg);

    }

    public function set_version($version){

        //mettre a jour la version.

    }
}


?>