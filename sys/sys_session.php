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

    /*
     * Cette fonction génère une page pour confirmer le changement d'empreinte
     */
    public function check_update_cookie(){

    }

    public function ok_update_cookie($hash_cookie , $id_user , $mysqli){

        $this->update_cookie($hash_cookie,$id_user, $mysqli );
    }

    private function update_cookie($check_hash_cookie , $id_user, $mysqli){

        $update_rq = "UPDATE `check_cookie` SET  `last_cookie` =  '".$check_hash_cookie."' WHERE `id_user` =  '".$id_user."'";
        $result_update = $mysqli->query($update_rq);

        setcookie("IGP_parse",$check_hash_cookie,time() + (24*3600), '/');

    }

} 