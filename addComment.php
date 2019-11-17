<?php

require('fonctions.php');

$id=htmlspecialchars($_GET['post_id']);


if(isset($_POST['pseudo'], $_POST['commentaire']) and !empty($_POST['pseudo']) and !empty($_POST['commentaire'])) {

	$pseudo =htmlspecialchars($_POST['pseudo']);
	$commentaire=htmlspecialchars($_POST['commentaire']);
	
	addComment($id, $pseudo, $commentaire);

}

else {

	echo"veuillez remplir tous les champs";	
}

header('Location: details.php?post_id=' . $id );
