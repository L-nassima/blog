
<?php
session_start();
require('fonctions.php');
$results = showPosts();

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
				<a href="administration.php" class="admin"><i class="fas fa-cogs"></i>Administration</a>
		</header>

		<main>
			<h2><i class="fas fa-cogs"></i> Paneau d'administration</h2>

			<div class="profil">
					<p> <strong>Bonjour</strong> <a href="profil.php"><?= $_SESSION['name']; ?></a></p>
					
			</div>
			
			<nav>
				<a href="posts.php" class="write"><i class="fas fa-pen-alt"></i> Rédiger un nouvel article</a>
			</nav>

			<table class="table">
				<tr>
					<th>titre</th>
					<th>article</th>
					<th>Auteur</th>
					<th>Categorie</th>
				</tr>
		
				<?php foreach($results as $key=>$value) {
					echo '<tr>';
					echo "<td><a class='lien' href='details.php?post_id=".$value['id_posts']."'>".$value['titre'].'</a></td>';
					echo '<td>' . $value['content'] .'</td>';
					echo '<td>' . $value['name']. '</td>';

					echo '<td>' . $value['user_name'].'<a href="editPost.php?id='.$value['id_posts'].'"> <i class="fas fa-pen-alt"></i></a><a href="deletPost.php?id='.$value['id_posts'].'"><i class="fas fa-times"></i></a></td>';

					echo '</tr>';

				}
			
				?>
			</table>
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