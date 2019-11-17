<?php
session_start();
require('fonctions.php');
$results=showPosts();

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
				<h1><a href="index.php"><i class="fas fa-microphone"></i>ENCORE UN BLOG ?!!</a></h1>
				<nav>
					<a href="logout.php" class="deconnect"> Se déconnecter</a>
					<a href="admin.php" class="admin"><i class="fas fa-cogs"></i>Administration</a>
				</nav>
		</header>
			 
		<main class="main">

			<?php
				if(isset($userInfo)): ?>
				<div class="profil">
					<p> <strong>Bonjour</strong> <a href="profil.php"><?= $userInfo['name']; ?></a></p>
					
				</div>
				<?php endif; ?>

				<h2><i class="fas fa-house-damage"></i>Accueil</h2>

				
					

					
					<?php
					foreach ($results as $key => $value) {
						echo '<section class="article">';
						echo "<h3 class='titre'><i class='far fa-hand-point-right'></i><a class='color' href='details.php?post_id=".intval($value['id_posts'])."'>".htmlspecialchars($value['titre'])."</a></h3>";
						echo '<p class="titre">'.substr(htmlspecialchars($value['content']),0, 100).'&nbsp;[...]</p>';
						echo '<p class="auteur"> Rédiger par: '.htmlspecialchars($value['name']).'</p>';
						echo  '<p> Le :'.htmlspecialchars($value['date_publication']).'</p>';
						echo '</section>';
					}
					?>
				
		</main>

		<footer>
            <h2>Le blog de Nassima Lounis</h2>

            <section>
                <div class="blog-footer">
                    <h3><i class="fas fa-address-book"></i> Contact</h3>
                    <p>Nassima Lounis, Développeuse web</p>
                    <p>nassima.lounis13@gmail.com</p>
                    
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


