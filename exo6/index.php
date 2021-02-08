<?php



    if(isset($_GET['batiment']) && isset($_GET['salle'])){
        echo $_GET['batiment']." ".$_GET['salle'] ;
    }else{
        echo " ces parametres n'existe pas";
    }

  


?>


