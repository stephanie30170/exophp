
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');



$sql2 = 'SELECT * FROM `info`';
$query = $db->prepare($sql2);
$query->execute();
$resultatinfo = $query->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau</title>
</head>
<body>
<button><a href="media.php">Retour</a></button>
<table>
    <thead>

        <th>id du film </th>
        <th>le titre du film</th>
        <th>id date </th>
        <th>date sortie</th>
        <th>date retour</th>
    </thead>
    <tbody>
    <?php
        //boucle sur la variable
        function dateFr($date){
            return strftime('%d-%m-%Y',strtotime($date));
            }
        foreach($resultatinfo as $info){
            $idfilm = $info['id'];
            $titrefilm = $info['titre'];
            ?>
            <tr> 
                <td><?= $idfilm ?></td>
                <td><?= $titrefilm ?></td>
     <?php 
             
    $sql = "SELECT * FROM `date` WHERE `index_info` = $idfilm";
    $query = $db->prepare($sql);
    $query->execute();
    $resultatdate = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach($resultatdate as $date){
            ?>
                <td><?= $date['id'];?></td>
                <td><?= dateFr($date['date_sortie']);?></td>
                <td><?= dateFr($date['date_retour']); ?></td>
                <td><a href="mediamodifier.php?id=<?= $date['id'] ?>">Modifier</a></td>
            </tr>
            
            <?php
            }
        }
        
    require_once ('fermer.php');
    ?>
    <button><a href="mediaajouter.php">Ajouter</a></button>

    </tbody>
    </table>
    
