
<?php 
//fonction qui affiche les articles
function showPosts(){
	require('database.php');
	$req=$pdo->prepare('SELECT * FROM posts JOIN categories ON `posts`.`id_categories`= `categories`.`id_categories` JOIN users ON `posts`.`id_user`=`users`.`id_user` ORDER BY date_publication');
	$req->execute();
	$results = $req->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

//fonction qui affiche le detail d'un article
function detailsPosts($id) {

	require('database.php');
	$req=$pdo->prepare('SELECT * FROM `posts` JOIN `categories` ON `posts`.`id_categories` =  `categories`.`id_categories` JOIN `users` ON `users`.`id_user`=`posts`.`id_user` WHERE `posts`.`id_posts`= ?');
	
	$req->execute(array($id));
	$post= $req->fetchAll(PDO::FETCH_ASSOC);
	return $post;
}

//fonction qui ajoute les commentaires
function addComment($id_article, $pseudo, $contenu) {
	require('database.php');
	$req=$pdo->prepare('INSERT INTO comments(contenu, pseudo, id_article, date_publication) VALUES(?,?,?, NOW())');
	$req->execute(array($contenu, $pseudo, $id_article));
}

//fonction qui récupère les commentaires
function showComment($id){
 	require('database.php');
 	$req=$pdo->prepare('SELECT * FROM `comments` WHERE `id_article`=?');

 	$req->execute (array($id));

 	$comments=$req->fetchAll(PDO::FETCH_ASSOC);
 	return $comments;
}

function addUser($name,$mail,$password){
	require('database.php');
	$req=$pdo->prepare('INSERT INTO `users` (`name`,`email`,`password`, `date_inscription`)VALUES(?, ? , ?, NOW())');
			$req->execute(array($name, $mail, $password));
}

//fonction qui récupère les données de la table users
function infoUsers(){
	require('database.php');
	$req=$pdo->prepare('SELECT id_user, name FROM users');
	$req->execute();
	$users= $req->fetchAll(PDO::FETCH_ASSOC);
	return $users;

}
//fonction qui récupère les informations de l'utilisateur

function user($name, $email) {
	require('database.php');
	$req=$pdo->prepare('SELECT * FROM users WHERE  name =? AND email = ?');
	$req->execute(array($name, $email));
		$user= $req->fetchAll(PDO::FETCH_ASSOC);
		return $user;

}
//fonction qui récupère les données de la tables categories
function infoCategories(){
	require('database.php');
	$req=$pdo->prepare('SELECT id_categories, user_name FROM categories');
	$req->execute();
	$categories= $req->fetchAll(PDO::FETCH_ASSOC);
	return $categories;

}


//fonction qui ajoute un article
function addPost($titre, $content, $id_user, $id_categories)
{
    require('database.php');
    
    $req = $pdo->prepare('INSERT INTO posts(titre, content, date_publication, id_user, id_categories) VALUES (?, ?, NOW(), ?, ? )');
    $req->execute(array($titre, $content, $id_user, $id_categories));
     
    
}

//fonction qui édite un article
function editPost($id, $titre, $content){
	require('database.php');
	$req=$pdo->prepare('UPDATE `posts` SET `titre`=?,`content`=? WHERE id_posts=?');
	$req->execute(array($titre, $content, $id));

}

//fonction qui suprime un article
function deletPost($id){
	require('database.php');
	$req=$pdo->prepare('DELETE FROM `posts` WHERE `id_posts`=?');
	$req->execute(array($id));
}

//fonction qui suprime un commentaire
function deletComment($id){
	require('database.php');
	$req=$pdo->prepare('DELETE FROM `comments` WHERE `id_comments`=?');
	$req->execute(array($id));  
}

//fonction qui édite le profile d'un utilisateur
function editProfilUser($id){
	require('database.php');
	$req=$pdo->prepare('SELECT * FROM `users` WHERE `id_user`=?');
	$req->execute(array($id));
	$edit=$req->fetchAll(PDO::FETCH_ASSOC);
	return $edit;
}





