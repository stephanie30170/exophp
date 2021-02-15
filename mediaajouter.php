
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

if(isset($_POST)){
    if(isset($_POST['date_sortie']) && !empty($_POST['date_sortie'])
        && isset($_POST['date_retour']) && !empty($_POST['date_retour'])){
            
            $sortie= strip_tags($_POST['date_sortie']);
            $retour = strip_tags($_POST['date_retour']);

            $sql = "INSERT INTO `date` (`date_sortie`, `date_retour`) VALUES (:date_sortie, :date_retour);";

            $query = $db->prepare($sql);

            $query->bindValue(':date_sortie', $titre, PDO::PARAM_STR);
            $query->bindValue(':date_retour', $affiche, PDO::PARAM_STR);
          
            $query->execute();

            $_SESSION['message'] = "date ajoutée avec succès !";
            
        }
}


require_once('fermer.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter</title>
</head>
<body>
    <h2>Ajouter une date<h2>
    <form method="post">
<p> 
    <label for="date_sortie">Date sortie du film</label>
    <input type="date" name="date_sortie" id="date_sortie">
</p>
<p> 
    <label for="date_retour">Date retour du film</label>
    <input type="date" name="date_retour" id="date_retour">
</p>


<button type="submit">Enregistrer</button>
<button><a href="acces.php">Retour</a></button>
   
</form>

</body>
</html>