
<?php 
session_start();
require('fonctions.php');

$users=infoUsers();
$categories=infoCategories();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
				<h1><i class="fas fa-microphone"></i>ENCORE UN BLOG ?!!</h1>
				<a href="logout.php" class="deconnect">Deconnexion</a>
				<a href="admin.php" class="admin"><i class="fas fa-cogs"></i>Administration</a>
		</header>

		<main>

			<h2>Rédiger un nouvel article</h2>
			<h3>Bonjour <?= $_SESSION['name'] ?></h3>

			<form  method="POST" action="addPosts.php">
				<fieldset class="formArticle">
					<legend class="legende"><i class="fas fa-sim-card"></i>nouvel article</legend>
					<label for="titre">Titre</label><br/>
					<input type="text" id="titre" name="titre"><br>
					<label for="article">Article</label><br/>
					<textarea  id="article" name="article" rows="15" cols="50"></textarea><br>
					<label for="titre">Auteur</label><br/>
					<select id=auteur name="auteur">
					<?php foreach( $users as $key=> $value)
					echo '<option value="'.$value['id_user'].'">'.$value['name'].'</option>';?>
					 
					
					</select><br>

					<label for="titre">categorie</label><br/>
					<select id='categorie' name="categorie">
					<?php foreach($categories as $key=> $value)
					echo  '<option value= "'.$value['id_categories'].'"">'.$value['user_name'].'</option>'?>
					
					</select><br>

					<button type='submit' name="submit" class="button button-primary">Enregistrer</button>
					<button type='reset' name="reset" class="button button-cancel">Annuler</button>
					
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
                </div>

                <div class="blog-footer">
                    <h3><i class="fas fa-blog"></i> Restons connecté</h3>
                    <a href="https://www.linkedin.com/feed/?trk=guest_homepage-basic_sign-in-submit"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>

                </div>

                <div class="blog-footer">
                    <h3><i class="fas fa-handshake"></i> Partenaires</h3>
                    <ul>
                        <li>3wAcademy</li>
                        <li>Fnac</li>
                        <li>Darty</li>
                    </ul>
                </div>

                <div class="blog-footer">
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