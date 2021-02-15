
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

if(isset($_POST)){
    if(isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['affiche']) && !empty($_POST['affiche'])
        && isset($_POST['acteurs']) && !empty($_POST['acteurs'])
        && isset($_POST['datesortiefilm']) && !empty($_POST['datesortiefilm'])  
        && isset($_POST['synopsis']) && !empty($_POST['synopsis'])
        && isset($_POST['realisateur']) && !empty($_POST['realisateur'])){
            
            $titre = strip_tags($_POST['titre']);
            $affiche = strip_tags($_POST['affiche']);
            $acteurs = strip_tags($_POST['acteurs']);
            $datessortiefilm = strip_tags($_POST['datesortiefilm']);
            $synopsis = strip_tags($_POST['synopsis']);
            $realisateur = strip_tags($_POST['realisateur']);



            $sql = "INSERT INTO `info` (`titre`, `affiche`, `acteurs`, `datesortiefilm`,`synopsis`,`realisateur`) VALUES (:titre, :affiche, :acteurs, :datesortiefilm, :synopsis, :realisateur);";

            $query = $db->prepare($sql);

            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':affiche', $affiche, PDO::PARAM_STR);
            $query->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
            $query->bindValue(':datesortiefilm', $datessortiefilm, PDO::PARAM_STR);
            $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $query->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);

            $query->execute();

            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: media.php');
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
    <h2>Ajouter un lien<h2>
    <form method="post">
 <p>   
     <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre">
</p>
<p> 
    <label for="affiche">URL de l'affiche</label>
    <input type="text" name="affiche" id="affiche">
</p>
<p> 
    <label for="acteurs">Acteurs</label>
    <input type="text" name="acteurs" id="acteurs">
</p>
<p> 
    <label for="datesortiefilm">Date sortie film</label>
    <input type="date" name="datesortiefilm" id="datesortiefilm">
</p>
<p> 
    <label for="synopsis">Synopsis</label>
    <input type="text" name="synopsis" id="synopsis">
</p>  
<p> 
    <label for="realisateur">Réalisateur</label>
    <input type="text" name="realisateur" id="realisateur">
</p>  

<button type="submit">Enregistrer</button>
<button><a href="media.php">Retour</a></button>
   
</form>

</body>
</html>