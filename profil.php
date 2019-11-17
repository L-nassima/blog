<i class="fas fa-address-book"></i> <?php
session_start(); 


require('fonctions.php'); 

if(!isset($_SESSION['id'])){ 

  header('Location: index.php'); 

  exit; 

}

  require('database.php');
	$req=$pdo->prepare('SELECT * FROM `users` WHERE  `id_user` = ?');
    $req->execute(array($_SESSION['id']));
   
      $profilUser = $req->fetch();
            $_SESSION["id"] = $profilUser["id_user"];
            $_SESSION["name"] = $profilUser["name"];
            $_SESSION["email"] = $profilUser["email"];
            $_SESSION["password"] = $profilUser["password"];
            $_SESSION["date_inscription"] = $profilUser["date_inscription"];

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

    ﻿         <h2>Voici Votre profil <?= $_SESSION['name']; ?></h2>
      
              <table class="table">
                <thead>
                  <td class="detailProfil">Quelques informations sur vous</td>
                </thead>
                <tr>
        ﻿           <td>Votre Id est : <?= $_SESSION['id']; ?></td>
                </tr>
                <tr>
                    <td>Votre Email est : <?= $_SESSION['email']; ?></td>
                </tr>
                <tr>
          ﻿         <td>Votre Compte a été crée le : <?= $_SESSION['date_inscription']; ?>         </td>
                </tr>
            </table>
           

            <div>
                <h2><a href="editProfil.php" class="editProfil"><i class="fas fa-pen-alt"></i> Editer votre profil</a></h2>
               
          </div>
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

  ﻿</body>

</html>