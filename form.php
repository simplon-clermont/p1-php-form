<?php
require_once('register.php');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Simplon - Formulaire d'inscription</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    <?php
    if(!empty($msg)){
    ?>
        <p><?php echo $msg; ?></p>
    <?php
    }

    
    if(empty($error) && !empty($msg)){
    ?>
        <a href="form.php" title="Retour à la page d'accueil">Retour à la page d'accueil</a>
    <?php
    }
    else{ 
    ?>
    <form method="post" action="form.php">
        <p>
            <label for="firstname">Votre prénom</label>
            <input type="text" id="firstname" name="firstname" value="<?php if(!empty($_POST['firstname'])) echo $_POST['firstname'];?>"/>
        </p>
        <p>
            <label for="name">Votre nom</label>
            <input type="text" id="name" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name'];?>"/>
        </p>
        <p>
            <label for="email">Votre email</label>
            <input type="text" id="email" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>"/>
        </p>
        <input type="submit" value="créer mon compte"/>
    </form>
    <?php
    }
    ?>
</body>
</html>