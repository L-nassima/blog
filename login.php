
<?php
session_start();
require('fonctions.php');

if(!empty($_POST) && isset($_POST)){
    
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password=sha1($_POST['password']);
 
    
    if(!empty($name) AND !empty($email) AND !empty($password)){
        
        require('database.php');
       
        $req = $pdo->prepare("SELECT * FROM `users` WHERE `name` = ? AND `email` = ? AND `password` = ?");
        $req->execute(array($name, $email, $password));
        $userExist=$req->rowCount();
            if($userExist==1){
            $userinfo = $req->fetch();
            $_SESSION["id"] = $userinfo["id_user"];
            $_SESSION["name"] = $userinfo["name"];
            $_SESSION["email"] = $userinfo["email"];
            $_SESSION["password"] = $userinfo["password"];

            header('location:index.php?id='.$_SESSION["id"]);

            }
            else {
                 $erreur = "mot de passe ou email incorrect !";
                 
            }
               
    }
     else {
         $erreur ="Tous les champs doivent être complétés !!"; 
    }
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
                
        </header>
             
        <main class="main">
            <div class= "user">
            <h2>Bienvenue sur mon Blog</h2>
            <p>Vous n'avez pas de compte !!</p>
            <a href="register.php">Inscrivez-vous</a>
        </div>
           
            <form method="POST" name ="formconnect" class="form">
                <fieldset>
                    <legend class="legendUser"><i class="fas fa-wifi icon"></i>Connexion</legend>
                   
                    <div>
                        <label for="name">Prénom :</label><br>
                        <input type="text" name="name" id="name" placeholder="Votre prénom *" required="required" value="<?php if(isset($name)) echo $name; ?>"> 
                    
                    </div>

                    <div>   
                        <label for="email">Email :</label><br>
                        <input id="email" name="email" placeholder="Votre Email *" required="required"  value="<?php if(isset($email)) echo $email; ?>">
                    </div> 
                    
                    <div>
                        <label for="password">Mot de passe :</label><br>
                        <input type="password" name="password" id="password" placeholder="Votre mot de passe *" required="required" value="<?php if(isset($password)) echo $password; ?>"> 
                    
                    </div>    
                    
                        <?php if(isset($erreur)) : ?>
                            <p class="erreur"><?= $erreur; ?></p>
                        <?php endif; ?>
                    

                    <button type="submit" name="submit" class="button button-primary">Se connecter</button>
                    <button type="reset" name="reset"  class="button button-cancel"><a href="blog.php">Annuler</a></button>
                       
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