<?php

if(!empty($_GET['nom'])&& !empty($_GET['prenom'])){

    if(isset($_GET['nom']) && isset($_GET['prenom'])){
        echo $_GET['nom'].$_GET['prenom'] ;
    }else{
        echo " ces parametres n'existe pas";
    }

}    


?>



