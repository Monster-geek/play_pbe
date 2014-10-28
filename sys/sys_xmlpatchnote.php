<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15/08/14
 * Time: 13:33
 */

class sys_xmlpatchnote {

    function gen($patch,$lang){

        //on récupère les chaque truc
        $liste_ajout = $patch->getElementsByTagName('ajout');
        $liste_retrait = $patch->getElementsByTagName('retrait');
        $liste_maj = $patch->getElementsByTagName('maj');
        $liste_patch = $patch->getElementsByTagName('patch');
        $numero = $patch->getElementsByTagName('numéro');
        $plateforme = $patch->getElementsByTagName('plateforme');
        $date = $patch->getElementsByTagName('date_release');

        /*
         * Affichage
         */

        //variables
        $html_patch ="";
        $html_ajout ="";
        $html_retrait ="";
        $html_maj = "";

        if($lang == 'EN'){
            //VAR EN
            $balise_maj="UPDATE";
            $popup_title = "Patchnote";

        }
        elseif($lang == 'FR'){
            $balise_maj = "MAJ";
            $popup_title = "Notes de versions";
        }

        foreach($numero as $num){
            $num_version = $num->nodeValue."<br />";
        }

        foreach($plateforme as $plat){
            $type_plat = $plat->nodeValue."<br />";
        }

        foreach($date as $d){
            $date_release = $d->nodeValue."<br />";
        }

        foreach($liste_ajout as $ajout){
            $a = "<span class='PL_Ajout'>[+]</span>:".$ajout->nodeValue."<br />";

            $html_ajout = $html_ajout.$a;
        }

        foreach($liste_retrait as $retrait){
            $r = "<span class='PL_Removed'>[-]</span>:".$retrait->nodeValue."<br />";

            $html_retrait = $html_retrait.$r;
        }

        foreach($liste_maj as $maj){
            $m = "<span class='PL_MAJ'>[".$balise_maj."]</span>:".$maj->nodeValue."<br />";

            $html_maj=$html_maj.$m;
        }

        foreach($liste_patch as $patch){
            $p = "<span class='PL_Patch'>[PATCH]</span>:".$patch->nodeValue."<br />";

            $html_patch = $html_patch.$p;
        }





        /*
         * DEBUG || Le fichier sera include dans patchnote.php donc l'affichage sera calqué dessus .
         */

        echo '<center><b>Version : '.$num_version.' </b></center>';
        //echo "Date de déploiement : ";
        //echo $date_release;

        if ($html_ajout !=""){
            echo $html_ajout;
        }

        if ($html_retrait != ""){
            echo $html_retrait;
        }

        if($html_maj != ""){
            echo $html_maj;
        }

        if($html_patch != ""){
            echo $html_patch;
        }
    }

} 