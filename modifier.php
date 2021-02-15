modifier.php
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['affiche']) && !empty($_POST['affiche'])
        && isset($_POST['acteurs']) && !empty($_POST['acteurs'])
        && isset($_POST['datesortiefilm']) && !empty($_POST['datesortiefilm'])  
        && isset($_POST['synopsis']) && !empty($_POST['synopsis'])
        && isset($_POST['realisateur']) && !empty($_POST['realisateur'])){
            
            $id = strip_tags($_POST['id']);
            $titre = strip_tags($_POST['titre']);
            $affiche = strip_tags($_POST['affiche']);
            $acteurs= strip_tags($_POST['acteurs']);
            $datesortiefilm = strip_tags($_POST['datesortiefilm']);
            $synopsis = strip_tags($_POST['synopsis']);
            $realisateur= strip_tags($_POST['realisateur']);
        
            $sql = 'UPDATE`info`SET `titre`=:titre, `affiche`=:affiche, `acteurs`=:acteurs, `datesortiefilm`=:datesortiefilm,`synopsis`=:synopsis, `realisateur`=:realisateur WHERE `id`=:id;';


            $query = $db->prepare($sql);

            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':affiche', $affiche, PDO::PARAM_STR);
            $query->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
            $query->bindValue(':datesortiefilm', $datesortiefilm, PDO::PARAM_STR);
            $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $query->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);


            $query->execute();

            $_SESSION['message'] = "Produit modifié !";
            header('Location: media.php');
        }
}
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `info` WHERE `id`=:id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    if(!$produit){
        header('Location: media.php');
    }
}else{
    header('Location: media.php');
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
    <h1>Modifier un lien<h1>
    <form method="post">
<p>
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="<?= $produit['titre']?>">
</p>
<p>
    <label for="affiche">URL Affiche</label>
    <input type="text" name="affiche" id="affiche" value="<?= $produit['affiche']?>">
</p>
<p>
    <label for="acteurs">Acteurs</label>
    <input type="text" name="acteurs" id="acteurs"value="<?= $produit['acteurs']?>">
</p>
<p>  
    <label for="datesortiefilm">Date</label>
    <input type="text" name="datesortiefilm" id="datesortiefilm" value="<?= $produit['datesortiefilm']?>">
</p>
<p>
    <label for="synopsis">Synopsis</label>
    <input type="text" name="synopsis" id="synopsis"value="<?= $produit['synopsis']?>">
</p>
<p>
    <label for="realisateur">Réalisateur</label>
    <input type="text" name="realisateur" id="realisateur" value="<?= $produit['realisateur']?>">
</p>

<input type="hidden" name="id" value="<?= $produit['id'] ?>">    
    <button>Enregistrer</button>
    <button><a href="media.php">Retour</a></button>
    
  
</form>

</body>
</html>

