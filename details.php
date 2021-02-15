<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `info` WHERE `id`=:id';

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
    <title>Liste des produits</title>
</head>
<body>
    <h2>Titre : <?= $produit['titre']?></h2>
    <p>ID : <?= $produit['id'] ?></p>
    <p>Synopsis : <?= $produit['synopsis'] ?> </p>
    <p>url de l'affiche : <?= $produit['affiche'] ?></p>
    <p>Date sortie de film : <?= $produit['datesortiefilm'] ?></p>
    <p>Le réalisateur: <?= $produit['realisateur'] ?></p>
    <p><button><a href="modifier.php?id=<?= $produit['id'] ?>">Modifier</a></button> 
    <button><a href="supprimer.php?id=<?= $produit['id'] ?>">Supprimer</a></button>
    <button><a href="media.php">Retour</a></button></p>
</body>
</html>
