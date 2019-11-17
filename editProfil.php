
<?php
session_start();
require('fonctions.php');
if(isset($_SESSION['id'])) {
  
    $editUsers=editProfilUser($_SESSION['id']);
    $editUser = $editUsers[0];
}
if(isset($_POST['newName']) && !empty($_POST['newName']) && $_POST['newName'] != $editUser['name'] 
    && isset($_POST['newEmail']) && !empty($_POST['newEmail']) && $_POST['newEmail'] != $editUser['email']
    
    && isset($_POST['newPassword']) && !empty($_POST['newPassword']) && $_POST['newPassword'] != $editUser['password']){
        $newName=htmlspecialchars($_POST['newName']);
        $newEmail=htmlspecialchars($_POST['newEmail']);
        $newPassword=sha1($_POST['newPassword']);
        require('database.php');
        $req=$pdo->prepare('UPDATE `users` SET `name`=?, `email`=?, `password`=? WHERE id_user=?');
        $req->execute(array($newName, $newEmail, $newPassword, $_SESSION['id']));
        header('Location:profil.php?id='.$_SESSION['id']);
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

            <h2>Modification de profil utilisateur</h2>

           <form method="POST">
                <fieldset>
                    <legend class="legendUser"><i class="fas fa-pen-alt"></i> Editer votre profil</legend>
                
                    <div>
                        <label for="newName">Prénom :</label>
                        <input type='text' name='newName' id='newName' value="<?php echo $editUser['name']; ?>" placeholder="Votre Nouveau Nom">
                      
                    </div>
                   
                    <div>
                        <label for="newMail">E-mail :</label>
                        <input type='mail' name='newEmail' id='newEmail' value="<?php echo $editUser['email']; ?>" placeholder="Votre Nouveau Email">
                       
                    </div>
                    <div>
                        <label for="newPassword">Choisissez un mot de passe :</label>
                        <input type='password' name='newPassword' id='newPassword' placeholder="Votre Nouveau mot de passe">
                        
                     </div>  
                   
                    <button type="submit" name="submit" class="button button-primary">Mise à jour de profil</button>
                    <button type="reset" name="reset"  class="button button-cancel"><a href="index.php?id="<?php $_SESSION['id']; ?>>Annuler</a> </button>


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