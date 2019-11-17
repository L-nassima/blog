
<?php
session_start();
require('fonctions.php');

$id = $_GET['id'];
$results=detailsPosts($id);
$result=$results[0];
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Edition</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>

		<header>
				<h1><i class="fas fa-microphone"></i>ENCORE UN BLOG ?!!</h1>
				<a href="logout.php" class="deconnect">Deconnexion</a>
				<a href="admin.php" class="admin"><i class="fas fa-cogs"></i>Administration</a>
		</header>

		<main>

			<h2>Editer un article</h2>
			<h3>Bonjour <?= $_SESSION['name'] ?></h3>

			<form method="POST" action="edition.php">
					<input type="hidden" name="id_article" value="<?= $_GET['id'] ?>">
					<fieldset class="block">
						
						<legend class="color"><i class="far fa-comment"></i>Article</legend>

						<label for="titre">titre:</label><br>
						<input type="text" name="titre" value="<?= $result['titre'] ?>"><br>

						<label for="article">Article :</label><br>
						<textarea id="article" name="article" rows="10" cols="35"><?= $result['content'] ?></textarea>

						<button type="submit" name="submit"  class="button button-primary">Mettre à jour</button>
						<button type="reset" name="reset"  class="button button-cancel"><a href="admin.php">Annuler</a></button>

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