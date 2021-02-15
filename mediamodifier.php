
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['date_sortie']) && !empty($_POST['date_sortie'])
        && isset($_POST['date_retour']) && !empty($_POST['date_retour'])){
            
            $id = strip_tags($_POST['id']);
            $date_sortie = strip_tags($_POST['date_sortie']);
            $date_retour = strip_tags($_POST['date_retour']);
        
           // $sql = 'UPDATE`date`SET `date_sortie`=:date_sortie, `date_retour`=:date_retour;';
            $sql = 'UPDATE`date`SET `date_retour`=:date_retour, `date_sortie`=:date_sortie WHERE `id`=:id;';
            

            $query = $db->prepare($sql);
            
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':date_sortie', $date_sortie, PDO::PARAM_STR);
            $query->bindValue(':date_retour', $date_retour, PDO::PARAM_STR);
            $query->execute();

            $_SESSION['message'] = "Date modifiée !";
            header('Location: acces.php');
        }
}
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    
    $sql = 'SELECT * FROM `date` WHERE `id`=:id;';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $date = $query->fetch();

    if(!$date){
        header('Location: acces.php');
    }
}else{
    header('Location: acces.php');
}

require_once('fermer.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modifier</title>
</head>
<body>
    <h1>Modifier les dates<h1>
    <form method="post">
<p>  
    <label for="date_sortie">Date de sortie</label>
    <input type="date" name="date_sortie" id="date_sortie" value="<?= $date['date_sortie']?>">
</p>
<p>  
    <label for="date_retour">Date de retour</label>
    <input type="date" name="date_retour" id="date_retour" value="<?= $date['date_retour']?>">
</p>
<input type="hidden" name="id" value="<?= $date['id'] ?>">    
    <button>Enregistrer</button>
    <button><a href="acces.php">Retour</a></button>
</form>

</body>
</html>

