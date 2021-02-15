<!DOCTYPE html>
<html>
    <head>
        <title>médiatheque</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Médiatheque</h1>  
        <?php
            $servername = 'localhost';
            $username = 'stephanie';
            $password = 'fif30170simplon!!!';
            $bdname = 'mediatheque';


try{
    // Connexion à la bdd
    $db = new PDO("mysql:host=$servername;dbname=$bdname", $username, $password);
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}

?>