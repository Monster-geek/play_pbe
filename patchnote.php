<?php
if(isset($_COOKIE['IGP'])){

    include_once './sys/sys_xmlpatchnote.php';

    //on load le DOM
    $dom = new DomDocument;
    //on load le fichier
    $dom->load("./xml/patchnote.xml");
    //on load la classe de génération
    $gen_xml = new sys_xmlpatchnote;
    $i = 0;
    $patch ="";


	if($_COOKIE['IGP'] == 'FR'){
        echo '<div class="popup_title">Note de version</div>';
        echo '<div id="Conteneur">';
        while(true){
            $patch = $dom->getElementsByTagName('patchnote_fr')->item($i);
            if($patch == null){
                break;
            }
            else{
                $gen_xml->gen($patch,'FR');
                $i++;
            }
        }
        echo "</div>";
	}
	elseif($_COOKIE['IGP'] == 'EN'){

        echo '<div class="popup_title">Patchnote</div>';
        echo '<div id="Conteneur">';
        while(true){
            $patch = $dom->getElementsByTagName('patchnote_en')->item($i);
            if($patch == null){
                break;
            }
            else{
                $gen_xml->gen($patch,'EN');
                $i++;
            }
        }
        echo "</div>";
	}
}
else
{
echo 'Cookie Error !';
}
?>