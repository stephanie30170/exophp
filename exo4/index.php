<?php

 if(isset($_GET['langage']) && isset($_GET['serveur'])){
        echo $_GET['langage']." ".$_GET['serveur'] ;
    }else{
        echo " ces parametres n'existe pas";
    }


?>
