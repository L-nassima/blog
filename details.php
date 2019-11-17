<?php
session_start();

require('fonctions.php');
$id=$_GET['post_id'];
if(!isset($id) || !is_numeric($id)){
	header('Location: index.php');

}
else{
		if(!empty($_POST)){
				
			$pseudo = htmlspecialchars($_POST['pseudo']);	
			$commentaire = htmlspecialchars($_POST['commentaire']);

			$errores=array();
				if(empty($pseudo)){
					$errores['pseudo'] ='entrer un pseudo';
				}

				if(empty($commentaire)){
					$errores['commentaire'] ='entrer un commentaire';
				}

				if(count($errores)==0){

					addComment($id, $pseudo, $commentaire);
					$succes='votre commentaire à bien été ajouté !!';
					unset($pseudo);
					unset($commentaire);
				}
		}
	$post=detailsPosts($id);

	$comments=showComment($id);
	
}

if(isset($_SESSION['id'])){
	 	
	 	require('database.php');
		$req=$pdo->prepare('SELECT * FROM `users` WHERE `id_user`= ?');
		$req->execute(array($_SESSION['id']));
		$userInfo=$req->fetch();
	 }

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Mon premier Blog</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<header>
				<h1><i class="fas fa-microphone"></i>ENCORE UN BLOG ?!!</h1>
				<a href="logout.php" class="deconnect">Se déconnecter</a>
				<a href="admin.php" class="admin"><i class="fas fa-cogs"></i>Administration</a>
		</header>
		<main>
			<?php
			if(isset($userInfo)): ?>
				<div class="profil">
					<p> <strong>Bonjour</strong> <a href="profil.php"><?= $userInfo['name']; ?></a></p>
					
				</div>
				<?php endif; ?>

			<h2><i class="fas fa-sim-card"></i>Articles</h2>
			
			<section class="post">
				<?php foreach ($post as $key => $value) :?>
							
				<h3><?= $value['titre']?></h3>
				<article class="contenu"><?= $value['content'] ?></article>
				<small class="auteur"> Rédiger par :<?=$value['name'] ?>
				Le :<?= $value['date_publication'] ?></small>
							
				<?php endforeach; ?>
			</section>
					
				<hr>
			<?php foreach ($comments as $key => $value) :?>
			<p><i class="fas fa-comment"></i>Rédiger par <strong>:<?= htmlspecialchars($value['pseudo']);?></strong></p>
			<p><?=htmlspecialchars($value['contenu'])?></p>
			<p><?= htmlspecialchars($value['date_publication']) ?></p>

			<a href="deletComment.php?id=<?= $value['id_comments'] ?>"><i class="far fa-trash-alt"></i></a>

			<?php endforeach;?>

			<hr>

			<form method="POST" action="details.php?post_id=<?= $id ?>" class="form" >
				<fieldset class="block">
					<legend class="color"><i class="far fa-comment icon"></i>Nouveau commentaire</legend>
					
					<label for="pseudo">Pseudo :</label><br>
					<input type="text" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) echo $pseudo; ?>"> 
					<?php if(!empty($errores['pseudo'])):?>
										<div class='erreur'>
											<?= $errores['pseudo']; ?>
										</div>
						<?php endif; ?>
						<br>
						
					<label for="commentaire">Commentaire :</label><br>
					<textarea id="commentaire" name="commentaire" rows="10" cols="35"><?php if(isset($commentaire)) echo $commentaire; ?></textarea>
					<?php if(!empty($errores['commentaire'])):?>
										<div class='erreur'>
											<?= $errores['commentaire']; ?>
										</div>
						<?php endif; ?>

				<?php if(isset($succes) && count($errores)==0) : ?>
					 <p class='succes'>
							<?= $succes; ?>
					</p>
				<?php endif; ?>
						
					<button type="submit" name="submit"class="button button-primary">Ajouter</button>
					
				</fieldset>
			</form>
		
		</main>
		<footer>
            <h2>Le blog de Nassima Lounis</h2>

            <section>
                <div class="blog-footer">
                    <h3><i class="fas fa-address-book"></i> Contact</h3>
                    <ul>
                        <li>Nassima Lounis, Développeuse web</li>
                        <li>nassima.lounis13@gmail.com</li>
                    </ul>
                </div><!--

                --><div class="blog-footer">
                    <h3><i class="fas fa-blog"></i> Restons connecté</h3>
                    <a href="https://www.linkedin.com/feed/?trk=guest_homepage-basic_sign-in-submit"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>

                </div><!--

                --><div class="blog-footer">
                    <h3><i class="fas fa-handshake"></i> Partenaires</h3>
                    <ul>
                        <li>3wAcademy</li>
                        <li>Fnac</li>
                        <li>Darty</li>
                    </ul>
                </div><!--

                --><div class="blog-footer">
                    <h3><i class="fas fa-ad"></i> Publicités</h3>
                    <p>Aucune publicité sur ce site, aucune rémunération. Je garde le plaisir de partager mes écrits avec vous, simplement.</p>
                </div>
            </section>


            <small>
                <p>Copyright Ezoic 2019 © All Rights Reserved.</p>
            </small>

        </footer>	
	</body>
</html>



