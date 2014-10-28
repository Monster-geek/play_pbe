<?php

//verification des includes essentiels
$inc_bd = @include_once './sys/database.php';
$inc_secu = @include_once './sys/class_secu.php';
$inc_apidev = @include_once './users/api/api_dev.php';
$inc_sys_session = @include_once './sys/sys_session.php';
$inc_sys_error = @include_once './sys/sys_error.php';

if(!($inc_bd) || !($inc_secu) || !($inc_apidev) || !($inc_sys_session) || !($inc_sys_error)){
    echo 'Fatal Error !!! ';

    // TODO : Faire affichage correcte pour les erreurs. Eventuellement un systeme de bug report.

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
                   // Fonction à finir ! TODO :  A finir et optimisé dans sys_session.php
                   //$session->check_update_cookie();


                    // PAS SECURE !!! TODO : A retirer quand le système sera fonctionnel. Ne pas mettre ça en prod !
                    echo "Empreinte invalide ! <br />";
                    echo "Mise à jour auto de l'empreinte...<br />";
                    $session->ok_update_cookie($check_hash_cookie,$id_user,$mysqli);
                    echo "Mise à jour effectué. Rechargez la page. <br />";


                }
                else
                {
                $user_req = 'SELECT `username` FROM `user` WHERE `key_user` = \''.$id_user.'\' ';
                $user_result = $mysqli->query($user_req);
                $user_row = $user_result->fetch_array();

                $username = $user_row['username'];

                $api_dev = new api_dev();
                $msg_api = $api_dev->get_info_dev();

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