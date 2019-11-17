<?php

require('fonctions.php');

$titre=htmlspecialchars($_POST['titre']);
$contenu=htmlspecialchars($_POST['article']);
$auteur=htmlspecialchars($_POST['auteur']);
$categorie=htmlspecialchars($_POST['categorie']);

//var_dump($auteur);
//var_dump($categorie);

addPost($titre, $contenu, $auteur, $categorie);

header('Location: admin.php');
?>