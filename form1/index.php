<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- exercice 1-->

<form action="user.php" method="get">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="submit">
</form>


<!-- exercice 2-->

<form action="user.php" method="post">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="submit">
</form>


<!-- exercice 3-->


<!-- exercice 5-->


<!-- exercice 6-->

<?php
if(isset($_POST['civilite']) && isset($_POST['prenom'])){
    echo $_POST['civilite']. " ".$_POST['prenom'];
}else{
    echo "   
    <form action='index.php' method='post'>
        <label for='civilite'>Civilite</label>
        <select name='civilite' id='civilite'>
            <option value='Mr'>Monsieur</option>
            <option value='Mme'>Madame</option>
        </select>
        <input type='text'name='prenom' placeholder='prenom'>
        <input type='submit'>
    </form>";
};
?>

<!-- exercice 7-->
<form action='index.php' method='post' enctype="multipart/form-data">
        <label for='civilite'>Civilite</label>
        <select name='civilite' id='civilite'>
            <option value='Mr'>Monsieur</option>
            <option value='Mme'>Madame</option>
        </select>
        <input type='text'name='prenom' placeholder='prenom'>
        <input type="file" name="fichier">

        <input type='submit'>
    </form>

<?php


$fichier = $_FILES['fichier']["name"];
$ext = pathinfo($fichier, PATHINFO_EXTENSION);

/* echo $_FILES['fichier']['name']." Extension : ".$ext ; */
/*  var_dump($_FILES['fichier']);  */
 

/* echo $ext ; */

if($ext==="pdf"){
    echo'ok';
}else{
    echo ' pas pdf ';
}

?>


</body>
</html>