<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Document</title>

</head>
<body>
<?php

//debut de session

session_start();


//SI DECO -> UNSET LES ELEMENTS DE LA SESSION
if(isset($_GET['dc'])){
  unset($_SESSION['id']);
  unset($_SESSION['pseudo']);
  unset($_SESSION['mdp']);
  unset($_SESSION['mail']);
  unset($_SESSION['photo']);
}

?>

  <div id="left">

    <div id="info_user">

      <?php

      //SI CONNECT DISPLAY DES INFOS
      if(isset($_SESSION['pseudo'])){
        echo'
        <img id="icon_pp" src="'.$_SESSION['photo'].'" alt="pp">
        <p id="user_username">'.$_SESSION['pseudo'].'</p>
        ';
      }
      else{
        echo'
        <img id="icon_pp" src="img/icon user.png" alt="pp">
        <p id="user_username">no user</p>
        '; 
      }

      ?>

    </div>

    <div>

    </div>

    <a href="index.php">

    <div class="left_button">

      Home Page
      
    </div>
  
    </a>

    <div id="left_make_a_post" class="left_button">

      New Post
      
    </div>

    <?php

    if(isset($_SESSION['pseudo'])){

      echo
      '
      <a href="profil.php">
      
      <div class="left_button">

      Profil
      
      </div>
  
      </a>
      ';
    }

    ?>

    <a href="pseudo.php">

    <div class="left_button">

    Pseudo

    </div>

    </a>
    

    <div>

    </div>

    <a href="account.php">
    <div class="left_button">

      connect
      
    </div>
    </a>
    
  </div>


  <?php 

  $pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  //SI FORMULAIRE REMPLI
  if($_POST){

    //SI FORMULAIRE INSCRIPTION
    if(isset($_POST['submit_subscribe'])){

    //HASH DU MDP
    $hash = password_hash($_POST['mdp_subscribe'],PASSWORD_DEFAULT);

    //RECUPERATION DES INFOS DU FORMULAIRE
    $username = $_POST['pseudo_subscribe'];
    $mail = $_POST['mail_subscribe'];
    $pp = $_POST['pp_subscribe'];

    //RECCUPERATION TOUS LES USER
    $li_username = $pdo->query('SELECT user_name FROM user');
    $array_username = [];
    while($user = $li_username->fetch(PDO::FETCH_ASSOC)){
      array_push($array_username, $user['user_name']);
    }

    //RECUEPRATION TOUS LES MAILS
    $li_mail = $pdo->query('SELECT user_mail FROM user');
    $array_mail = [];
    while($user = $li_mail->fetch(PDO::FETCH_ASSOC)){
      array_push($array_mail, $user['user_mail']);
    }

    //SI USERNAME DEJA DANS LA DB -> PAS D INSCRIPTION
    if(in_array($_POST['pseudo_subscribe'], $array_username)){
      //TROUVER UN TRUC A FAIRE ICI
      //
      //
      //
    }

    //SI MAIL DEJA DANS LA DB -> PAS D INSCRIPTION
    else if(in_array($_POST['mail_subscribe'], $array_mail)){
      //TROUVER UN TRUC A FAIRE ICI
      //
      //
      //
    }

    //INSERTION DES INFOS DANS LA DB
    else{
    $pdo->exec("INSERT INTO user(user_name, user_password, user_mail, user_pp) VALUES ('$username','$hash','$mail','$pp')");
    header("Location:account.php");
    }
  }

    //SI FORMULAIRE DE CONNEXION
    if(isset($_POST['submit_connect'])){

      //RECUPERATION DES INFO
      $mail = $_POST['mail_connect'];
      $mdp = $_POST['mdp_connect'];

      //RECUPERATION DES MAIL + MDP DE LA DB
      $li_mail_mdp = $pdo->query('SELECT user_mail, user_password FROM user');
      $array_mail_mdp = []; //ENSEMBLE DES MAIL/MDP DE LA DB
      while($info = $li_mail_mdp->fetch(PDO::FETCH_ASSOC)){
        array_push($array_mail_mdp, $info);
      }

      foreach($array_mail_mdp as $indice => $duo){
        //DUO = MAIL/MDP -> SI MAIL DANS LA DB & MDP ASSOCIER BON
        if($duo['user_mail'] == $mail && password_verify($mdp, $duo['user_password'])){

          //RECUPERATION DES INFOS GRACE AU MAIL DE CONNEXION
          $actual_user = $pdo->query('SELECT * FROM user WHERE user_mail = "'.$mail.'"');
          $user_actual = $actual_user->fetch(PDO::FETCH_ASSOC);

          //INFORMATION DONNEES A LA SESSION
          $_SESSION['id'] = $user_actual['user_id'];
          $_SESSION['pseudo'] = $user_actual['user_name'];
          $_SESSION['mdp'] = $user_actual['user_password'];
          $_SESSION['mail'] = $user_actual['user_mail'];
          $_SESSION['photo'] = $user_actual['user_pp'];
          
          //RETROUR A LA PAGE DE BASE
          header("Location:index.php");

          //CONNEXION A AMELIORER ( - SI PAS LES BONS IDENTIFIANTS / - VERIFIER POUR SESSION DANS INDEX)

        }
      }
    }
  }

  ?>

  <div id="mid">

    <div id="connection_page">

      <p>
         Avez vous deja un compte ?
      </p>

      <div id="button_container">
        
        <div id="connect_button" class="button_subscribe_page">
          Se connecter
        </div>

        <div id="subscribe_button" class="button_subscribe_page">
          S'inscrire
        </div>

      </div>

    </div>

    <div id="form_connect" class="container row justify-content-center hidden bootstrap_text">

    <div id="container_form_connect" class="col-10 hidden bootstrap_position mt-5">

      <p> Log In</p>

      <form class="form-horizontal" method="post">

        <div class="form-group">

          <label class="control-label col-sm-2" for="mail1"> Mail</label>
          <div class="col-sm-8 offset-sm-2">

            <input type="email" name="mail_connect" class="form-control" id="mail1" placeholder="adresse mail" required>

          </div>

        </div>

        <div class="form-group">

          <label class="control-label col-sm-2 " for="password1"> mot de passe</label>
          <div class="col-sm-8 offset-sm-2">

            <input type="password" name="mdp_connect" class="form-control" id="password1" placeholder="mot de passe" required>


          </div>

        </div>

        <div class="form-group">

          <div class="offset-sm-2 col-sm-8 center_bootstrap_element">
            <button type="submit" name="submit_connect" class="btn btn-primary">Envoyer</button>

          </div>

        </div>

      </form>

    </div>

    </div>

    <div id="form_subscribe" class="container row justify-content-center hidden bootstrap_text" style="margin: 0;">

      <div id="container_form_subscribe" class="col-10 hidden bootstrap_position mt-5">
        <p> Subscribe</p>
        <form class="form-horizontal" method="post">
  
          <div class="form-group">
  
            <label class="control-label col-sm-6" for="pseudo2" style="margin: 0;"> Pseudo</label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="text" name="pseudo_subscribe" class="form-control" id="pseudo2" placeholder="Pseudo" required>
  
            </div>
  
          </div>
  
          <div class="form-group">
  
            <label class="control-label col-sm-6" for="mail2" style="margin: 0;"> mail </label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="email" name="mail_subscribe" class="form-control" id="mail2" placeholder="mail" required>
  
  
            </div>

            </div>

            <div class="form-group">
  
            <label class="control-label col-sm-6" for="password2" style="margin: 0;"> mot de passe</label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="password" name="mdp_subscribe" class="form-control" id="password2" placeholder="mot de passe" required>
  
  
            </div>
  
          </div>

          <div class="form-group">
  
            <label class="control-label col-sm-6" for="pp2" style="margin: 0;"> lien lorem picsum</label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="text" name="pp_subscribe" class="form-control" id="pp2" placeholder="lien lorem picsum" required>
  
  
            </div>
  
          </div>
  
          <div class="form-group">
  
            <div class="offset-sm-2 col-sm-8 center_bootstrap_element">
              <button type="submit" name="submit_subscribe" class="btn btn-primary">Envoyer</button>
  
            </div>
  
          </div>
  
        </form>
  
      </div>
  
      </div>

  </div>

  

      <img id="mobile_menu" src="img/Hamburger_icon.svg.png" alt="sandwich menu">

    

    

      <img id="leave_mobile_menu" src="img/cross.png" alt="sandwich menu">

    

  <div id="right">

  </div>

  <script src="js/account.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>