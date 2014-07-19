<?php

//verification des includes essentiels
$inc_bd = @include_once './sys/database.php';
$inc_secu = @include_once './sys/class_secu.php';
$inc_apidev = @include_once './users/api/api_dev.php';
$inc_sys_session = @include_once './sys/sys_session.php';


if(!($inc_bd) || !($inc_secu) || !($inc_apidev) || !($inc_sys_session)){
    echo 'Fatal Error !!! ';
}
else{

    $session = new sys_session();

    if ((isset($_POST['destroysess'])) && ($_POST['destroysess'] = 'Fermer la session.'))
    {
        $session->logout();
    }

    if((isset($_COOKIE['IGP_user'])) && (isset($_COOKIE['IGP_parse']))){
        $id_user = $_COOKIE['IGP_user'];
        $hash_cookie = $_COOKIE['IGP_parse'];

        $check_cookie = 'SELECT `last_cookie` FROM `check_cookie` WHERE `id_user`= \''.$id_user.'\' AND `last_cookie` = \''.$hash_cookie.'\' ';
        $check_result = $mysqli->query($check_cookie);
        $check_row = $check_result->fetch_array();

        $check_id = 'SELECT `key_user` FROM `user` WHERE `key_user`=\''.$id_user.'\';';
        $check_id_result = $mysqli->query($check_id);
        $check_id_result = $check_id_result->fetch_array();

        $s = new secu();
        $ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR'];
        $check_hash_cookie = $s->cookie_hash($id_user,$ip);

            if($check_id_result != null){
                if(($hash_cookie != $check_hash_cookie)){

                    $error = "";
                    include_once './sys/error.php';

                   //$session->check_update_cookie();
                }
                else
                {
                $user_req = 'SELECT `username` FROM `user` WHERE `key_user` = \''.$id_user.'\' ';
                $user_result = $mysqli->query($user_req);
                $user_row = $user_result->fetch_array();

                $username = $user_row['username'];

                include './users/view_session.php';
                }
            }
            else
            {
                $session->kickout();
            }

    }
    else
    {
        $session->kickout();
    }

}
?>