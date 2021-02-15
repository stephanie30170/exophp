
<?php
session_start();

// On inclut la connexion à la base
require_once('connection.php');

$sql = 'SELECT * FROM `dates`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('fermer.php');
?>
