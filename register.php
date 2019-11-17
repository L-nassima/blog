<?php
require('database.php');
require('fonctions.php');
if(!empty($_POST) && isset($_POST)){
    $name=htmlspecialchars($_POST['lastName']);
    $mail=htmlspecialchars($_POST['mail']);
    $mail2=htmlspecialchars($_POST['mail2']);
    $password=sha1($_POST['mdp1']);
    $password2=sha1($_POST['mdp2']);
    $errors=array();
          
        if(empty($name)){
            $errors['lastName']='entrez votre Prénom!!';
        }
        
        if(empty($mail)){
            $errors['email']='entrez votre Email !!';
        }

        if(empty($password)){
            $errors['mdp1']='entrez votre mot de passe !!';
        }

        if($mail == $mail2){
            if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
                    
                    $req=$pdo->prepare('SELECT `email` FROM `users` WHERE `email`=?');
                    $req->execute(array($mail));
                
                    $mailExist = $req->rowCount();
                    
                        if($mailExist == 0){
                            if($password == $password2){
                                
                                if(count($errors) == 0){
                                    $success='Votre compte à bien étais créer !!<a href="login.php">Me connecter </a>';
                                    addUser($name,$mail,$password);
                                    unset($name);
                                    unset($email);
                                    unset($password);
                                }
                            
                            }
                            else{$errors['mdp2']='vos mots de passe ne correspendent pas !!';}
                        }
                        else{$errors['mail2']="Mail déja utiliser !!";}
                        
            }
             else{$errors['mail2']="Votre mail n'est pas valide !!";}
        }
        else{$errors['mail2']='Vos mails ne correspendent pas !!';}
        
	
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>blog</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>

        <header>
                <h1><a href="index.php"><i class="fas fa-microphone"></i>ENCORE UN BLOG ?!!</a></h1>
        </header>
             
        <main class="main">

            <div class="user">
                <h2>Bienvenue sur mon Blog</h2>
                <p>Vous ête membre de notre blog !!</p>
                <a href="login.php">Connectez-Vous </a>
            </div>
            <form method="POST" action="register.php" class="form">
                <fieldset>
                    <legend class="legendUser"><i class="fas fa-registered icon"></i>Inscription</legend>
            
                    <div>
                        <label for="lastName">Prénom :</label>
                        <input type='text' name='lastName' id='lastName' value='<?php if(isset($name)) echo $name; ?>' placeholder="Votre Prénom *"      required="required">
                            <?php if(!empty($errors['lastName'])):?>
    							<div  class='erreur'>
    								<?= $errors['lastName']; ?>
    							</div>
    					   <?php endif; ?>
                    </div>
                    
                    <div>
                        <label for="email">Email :</label>
                        <input type='text' name='mail' id='email' value='<?php if(isset($mail)) echo $mail; ?>' placeholder="Votre Email *" required="    required">
                            <?php if(!empty( $errors['mail'])):?>
    							<div  class='erreur'>
    								<?= $errors['mail']; ?>
    							</div>
    						<?php endif; ?>
                    </div>

                    <div>
                        <label for="mail2">Confirmez votre Email :</label>
                        <input type='text' name='mail2' id='mail2' placeholder="confirmez votre mail *" required="required">
                            <?php if(!empty($errors['mail2'])):?>
    							<div  class='erreur'>
    								<?= $errors['mail2']; ?>
    							</div>
    						<?php endif; ?>
                    </div>

                    <div>
                        <label for="password">Choisissez un mot de passe :</label>
                        <input type='password' name='mdp1' id='password' placeholder="Votre mot de passe *" required="required">
                            <?php if(!empty($errors['mdp1'])):?>
    							<div  class='erreur'>
    								<?= $errors['mdp1']; ?>
    							</div>
    						<?php endif; ?>
                     </div>

                     <div>
                        <label for="mdp2">Confirmez votre mot de passe :</label>
                        <input type='password' name='mdp2' id='mdp2' placeholder="confirmez votre mot de passe *" required="required">
                            <?php if(!empty($errors['mdp2'])):?>
    							<div  class='erreur'>
    								<?= $errors['mdp2']; ?>
    							</div>
    						<?php endif; ?>
                     </div>  

                    <button type="submit" name="submit" class="button button-primary">Je m'inscris</button>
                    <button type="reset" name="reset"  class="button button-cancel"><a href="blog.php">Annuler</a></button>
                   
                </fieldset>
            </form>
            
            <?php if(isset($errors) && count($errors)==0) : ?>
    			<p class='success'>
    				<?= $success; ?>
    			</p>
    		<?php endif; ?>
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