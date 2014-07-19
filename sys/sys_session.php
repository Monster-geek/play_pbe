<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19/07/14
 * Time: 04:32
 */

class sys_session {

    public function kickout(){
        header('Location: index.php');
    }

    public function logout(){
            setcookie ("IGP_user", "", time() - (24*3600));
            setcookie ("IGP_parse", "", time() - (24*3600));
            $this->kickout();
    }

    public function check_update_cookie(){
        //
        // Pop-up pour saisir le mot de passe pour valider le changement de cookie.
        //
        //if(motdepasse == ok){
        $update_rq = "UPDATE `check_cookie` SET  `last_cookie` =  '".$check_hash_cookie."' WHERE `id_user` =  '".$id_user."'";
        $result_update = $mysqli->query($update_rq);

        //else {
        //    $this->kickout();
        //}
    }

} 