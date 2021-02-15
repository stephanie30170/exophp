
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

$sql = 'SELECT * FROM `info`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('fermer.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau</title>
</head>
<body>
<button><a href="acces.php">Accès médiathèque</a></button>
<table>
    <thead>
        <th>id</th>
        <th>le titre du film</th>
        <th>l'affiche</th>
        <th>les acteurs</th>
        <th>la date de sortie</th>
        <th>le synopsis</th>
        <th>le réalisateur</th>
    </thead>
    <tbody>
    <?php
        //boucle sur la variable
        foreach($result as $produit){
            ?>
            
            <tr>
                <td><?= $produit ['id'] ?></td>
                <td><?= $produit['titre'] ?></td>
                <td><?= $produit['affiche'] ?></td>
                <td><?= $produit['acteurs'] ?></td>
                <td><?= $produit['datesortiefilm'] ?></td>
                <td><?= $produit['synopsis'] ?></td>
                <td><?= $produit['realisateur']?></td>
                <td><a href="details.php?id=<?= $produit['id'] ?>">Voir</a>  
                <a href="modifier.php?id=<?= $produit['id'] ?>">Modifier</a>  
                <a href="supprimer.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
            </tr>
            
            <?php
        }
        ?>
    </tbody>
    </table>
    <button><a href="ajouter.php">Ajouter</a></button>
</table>
</body>
</html>