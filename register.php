<?php
if(!empty($_POST)){
  
   $msg = "";

    if(empty($_POST['firstname']) || strlen($_POST['firstname'])<1){
        $msg .= "- Veuillez saisir votre prénom.<br/>";
    }

    if(empty($_POST['name']) || strlen($_POST['name'])<2){
        $msg .= "- Veuillez saisir votre nom.<br/>";
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $msg .= "- Veuillez saisir votre email.<br/>";
    }

    if(!empty($msg)){
        $msg = "Erreur. Veuillez vérifier votre saisie :<br/>".$msg;
        $error = true;
    }
    else {

        $link = mysqli_connect("mysql", "root", "password", "sform");

        if (!$link) {
            echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
            echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
            echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        $req = "INSERT INTO user (
                name, 
                firstname, 
                email)
                VALUES (
                '".$_POST['name']."', 
                '".$_POST['firstname']."', 
                '".$_POST['email']."'
                )";
        
    
        $res = $link->query($req);

        if(!empty($res)){
            $msg = "Merci ".$_POST['firstname'].", votre inscription a bien été prise en compte";
            $error = false;
        }
        else {
            $msg = "Une erreur est survenue veuillez réessayer plus tard";
            $error = true;
        }
    }
}
