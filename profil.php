<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>

</head>
<body>

<?php

//debut de session

session_start(); 

?>

  <aside id="left">

    <div id="info_user">

    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    //MODIFICATION DU NOM D UTILISATEUR
    if(isset($_POST['new_username'])){
          $new_user = $_POST['new_username']; //RECUPERATION NOUVEAUX USERNAME
          $old_user = $_SESSION['pseudo']; //RECUPERATION ANCIEN USERNAME
          //CHANGEMENT DU NOM DANS LA DB
          $pdo->exec("UPDATE user SET user_name = '$_POST[new_username]' WHERE user_name = '$_SESSION[pseudo]';");
          $_SESSION['pseudo'] = $new_user; //UPDATE DE LA SESSION
    }

    //MODIFICATION DU MAIL
    if(isset($_POST['new_mail'])){
      $new_mail = $_POST['new_mail'];
      $old_mail = $_SESSION['mail'];
      $pdo->exec("UPDATE user SET user_mail = '$_POST[new_mail]' WHERE user_mail = '$_SESSION[mail]';");
      $_SESSION['mail'] = $new_mail;
    }

    //MODIFICATION DU MDP
    if(isset($_POST['new_password'])){
      $new_password = $_POST['new_password'];
      $old_password = $_SESSION['mdp'];
      $pdo->exec("UPDATE user SET user_password = '$_POST[new_password]' WHERE user_password = '$_SESSION[password]';");
      $_SESSION['mdp'] = $new_password;
    }

    //SI CONNECTE AFFICHAGE DES INFOS UTILISATEUR
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

    //SI CONNECTE -> ACCES AU PROFIL POSSIBLE
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

    <?php

    //SI CONNECTER -> DECONNECT SINON CONNECT
    if(isset($_SESSION['pseudo'])){
      echo'
      <a href="account.php?dc=True">
      <div class="left_button">
  
        deconnect
        
      </div>
      </a>
      ';
    }
    else{
      echo'
      <a href="account.php">
      <div class="left_button">
  
        connect
        
      </div>
      </a>';
    }

    ?>
    
    </aside>

  <div id="mid">

    <section id="container_profil">

      <sect id="container_header_profil">
      <img class="profile_picture" src=
      <?php 
      //DISPLAY PP UTILISATEUR IS CONNECTE
      if(isset($_SESSION['photo'])){
        echo $_SESSION['photo'];
      }
      else{
        echo 'img/icon user.png';
      } 
       ?> 
      alt="photo">
      <p>
        User profile :
      </p>
    </sect>

      <div class="container_info_profil">
        <p>

          Username :

          <?php

          //DISPLAY USERNAME SI CONNECTE + BOUTON MODIFICATION
          if(isset($_SESSION['pseudo'])){
            echo $_SESSION['pseudo'];
            echo'
            <div class="modify_username_button" id="name_modifier">
            <p>Modifier</p>
            </div>';
          }
          else{
            echo'connectez vous !';
          }

          ?>

        </p>
      </div>

      <div class="container_info_profil">
        <p>

          Email : 

          <?php

          //DISPLAY MAIL SI CONNECT + BOUTON MODIFICATION
          if(isset($_SESSION['mail'])){
            echo $_SESSION['mail'];
            echo'
            <div class="modify_mail_button" id="mail_modifier">
            <p>Modifier</p>
            </div>';
          }
          else{
            echo'connectez vous !';
          }

          ?>

        </p>
      </div>

      <div class="container_info_profil">
        <p>

          mdp : 

          <?php

          //DISPLAY ETOILE POUR MDP + BOUTON MODIFICATION
          if(isset($_SESSION['mdp'])){
            echo '**********';
            echo'
            <div class="modify_password_button" id="password_modifier">
            <p>Modifier</p>
            </div>';
          }
          else{
            echo'connectez vous !';
          }

          ?>

        </p>
      </div>
      

    </section>

    <div id="container_post_profil">

    <p> 

      <?php 
      
      if(isset($_SESSION['pseudo'])){
        echo'Publication de '.$_SESSION['pseudo'].' :';
      }
      else{
        echo 'connectez vous !';
      }
      
      ?>

      
    </p>

        <?php

        //DISPALY DES PUCLICATIONS DE L4UTILISATEUR SI CONNEXION
        if(isset($_SESSION['id'])){

        //RECUPERATION DES POSTS
        $r = $pdo->query('SELECT * FROM post INNER JOIN user on post.post_user_id=user.user_id WHERE post_user_id = \''.$_SESSION['id'].'\'');
        $array_post = [];
        while($mess = $r->fetch(PDO::FETCH_ASSOC)){
        array_push($array_post, $mess);
        }

        $array_post = array_reverse($array_post);

        //AFFICHAGE DES POSTS
        foreach($array_post as $mess){
          echo
        '
        <div class="post">

          <div class="post_info">

          <header class="post_user_info">

            <img class="profile_picture" src="'.$mess['user_pp'].'" alt="photo de profil">
            <p class="username"> '.$mess['user_name'].' </p>
            <p class="date_post">'.$mess['post_time'].'</p>

          </header>

          <div class="post_bar">

          </div>

          <article class="post_content">

            <p> '.$mess['post_text'].' </p>

          </article>

          ';
          ?>

          <?php

          if($mess['post_file']){
          echo'
          <section class="container_img_post">

          <img class="imported_img" src="img_post/'.$mess['post_file'].'" alt="Image">

          </section>';
                }
          
          ?>

          <?php
          echo'

          <footer class="post_end">

            <div class="tag_post '.$mess['post_tag'].'">

              '.$mess['post_tag'].'

            </div>

            ';
            if(isset($_SESSION['id']) && $_SESSION['id'] == $mess['user_id']){
              echo '<img class="poubelle" src="img/closed_bin.svg" alt="poubelle" id="'.$mess['post_id'].'">';
            }
            echo '
            </footer>

        </div>
        
          <div class="horizontal_bar"></div>

      </div>
      ';
        }
        }

        ?>

    </div>

    

      <img id="mobile_menu" src="img/Hamburger_icon.svg.png" alt="sandwich menu">

    

    

      <img id="leave_mobile_menu" src="img/cross.png" alt="sandwich menu">

    

  </div>

  <div id="right">

  </div>

  <!-- BOUTON DE MODIFICATION DU PROFIL -->

  <div class="container_modification" id="modify_name" style="visibility: hidden;">

        <form method="post">
          <input type="text" placeholder="new_username" name="new_username" id="new_username" cols="30" rows="1"></input>
          <input type="submit">
        </form>

  </div>

  <div class="container_modification" id="modify_mail" style="visibility: hidden;">

        <form method="post">
          <input type="email" placeholder="new_mail" name="new_mail" id="new_mail" cols="30" rows="1"></input>
          <input type="submit">
        </form>

  </div>

  <div class="container_modification" id="modify_password" style="visibility: hidden;">

        <form method="post">
          <input type="password" placeholder="new_password" name="new_password" id="new_password" cols="30" rows="1"></input>
          <input type="submit">
        </form>

  </div>


  <script src="js/settings.js"></script>
</body>
</html>