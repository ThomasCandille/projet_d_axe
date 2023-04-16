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

  <div id="left">

    <div id="info_user">

    <?php

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
      <a href="settings.php">
      
      <div class="left_button">

      Profil
      
      </div>
  
      </a>
      ';
    }

    ?>

    <a href="profil.php">

    <div class="left_button">

    Profil

    </div>

    </a>
    

    <div>

    </div>

    <?php

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
    
    </div>

  <div id="mid">

    <div id="container_profil">

      <div id="container_header_profil">
      <img class="profile_picture" src=
      <?php 
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
    </div>

      <div class="container_info_profil">
        <p>

          Username :

          <?php

          if(isset($_SESSION['pseudo'])){
            echo $_SESSION['pseudo'];
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

          if(isset($_SESSION['mail'])){
            echo $_SESSION['mail'];
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

          if(isset($_SESSION['mdp'])){
            echo '**********';
          }
          else{
            echo'connectez vous !';
          }

          ?>

        </p>
      </div>
      

    </div>

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

        $pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        if(isset($_SESSION['pseudo'])){

        $r = $pdo->query('SELECT * FROM post WHERE post_pseudo = \''.$_SESSION['pseudo'].'\'');
        $array_post = [];
        while($mess = $r->fetch(PDO::FETCH_ASSOC)){
        array_push($array_post, $mess);
        }

        foreach($array_post as $mess){
          echo
          '
          <div class="post">
  
            <div class="post_info">
  
            <div class="post_user_info">
  
              <img class="profile_picture" src="'.$mess['post_pp'].'" alt="photo de profil">
              <p class="username"> '.$mess['post_pseudo'].' </p>
  
            </div>
  
            <div class="post_bar">
  
            </div>
  
            <div class="post_content">
  
              <p> '.$mess['post_text'].' </p>
  
            </div>
  
            <div class="post_end">
  
              <div class="tag_post '.$mess['post_tag'].'">
  
                '.$mess['post_tag'].'
  
              </div>
  
              <img class="poubelle" src="img/pbl.png" alt="poubelle" id="'.$mess['post_id'].'">
            </div>
  
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


  <script src="js/settings.js"></script>
</body>
</html>