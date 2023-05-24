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
$pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

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

  <div class="search_profil">

  <form id="profil" action="pseudo.php">
    <textarea name="profil" id="textarea_profil" cols="30" rows="1" placeholder="Recherche"></textarea>
    <input type="submit" name="redirect">
  </form>

  <?php 

  //SI UN PSEUDO EST RECHERCHE DANS LA BARRE
  //REDIRECTION VERS LA PAGE DE L UTILISATEUR
  if(isset($_POST['redirect'])){
    $loc = $_POST['profil'];
    header('Location=pseudo.php?profil='.$loc.'');
  }


  
  ?>

</div>

<?php

//SI UN NOM D UTILISATEUR A ETE ENTREE
if(isset($_GET['profil'])){
  echo $_GET['profil'];

//RECUPERATION DE SES POSTS
$r = $pdo->query('SELECT * FROM user WHERE user_name = \''. $_GET['profil'].'\'');
      $user = [];
      while($mess = $r->fetch(PDO::FETCH_ASSOC)){
      array_push($user, $mess);
      }
}
?>

<!-- SI UN UTILISATEUR EST CHERCHE -> ON MONTRE SON PROFIL SINON CACHE -->
<div id="container_profil"  <?php if(isset($_GET['profil']) && ($user[0]['user_id'] !='')) {} else {echo 'class="hidden"';} ?>>

  <div id="container_header_profil">

    <img class="profile_picture" src=" <?php echo $user[0]['user_pp']; //RECUPERATION PP SUR PREMIER POST ?>" alt="user_pp">
    <p> User profile :</p>

  </div>

  <div class="container_info_profil">

    <p> Username : <?php echo $user[0]['user_name']; //RECUPERATION NOM SUR PREMIER POST ?> </p>

  </div>

</div>


<!-- SI UN UTILISATEUR EST CHERCHE -> ON MONTRE SES POSTS SINON CACHE -->
<div id="container_post_profil" <?php if(isset($_GET['profil']) && ($user[0]['user_id'] !='')) {} else {echo 'class="hidden"';} ?>>

    <p> 

      <?php 
      
      if($_GET['profil'] != ''){
        echo'Publication de '.$_GET['profil'].' :';
      }
      else{
        echo 'Cet utilisateur n\' a encore rien posté ou n\'existe pas';
      }
      
      ?>

      
    </p>

        <?php

        //SI UTILISATEUR RECHECHE
        if(isset($_GET['profil'])){

        //RECUPERATION DES POSTS DE L UTILISATEUR RECHERCHE
        $r = $pdo->query('SELECT * FROM post INNER JOIN user on post.post_user_id=user.user_id WHERE post_user_id = \''.$user[0]['user_id'].'\'');
        $array_post = [];
        while($mess = $r->fetch(PDO::FETCH_ASSOC)){
        array_push($array_post, $mess);
        }

        //AFFICHAGE DES POSTS
        foreach($array_post as $mess){
          echo
        '
        <div class="post">

          <div class="post_info">

          <div class="post_user_info">

            <img class="profile_picture" src="'.$mess['user_pp'].'" alt="photo de profil">
            <p class="username"> '.$mess['user_name'].' </p>
            <p class="date_post">'.$mess['post_time'].'</p>

          </div>

          <div class="post_bar">

          </div>

          <div class="post_content">

            <p> '.$mess['post_text'].' </p>

          </div>

          ';
          ?>

          <?php

          if($mess['post_file']){
          echo'
          <div class="container_img_post">

          <img class="imported_img" src="img/'.$mess['post_file'].'" alt="Image">

          </div>';
                }
          
          ?>

          <?php
          echo'

          <div class="post_end">

            <div class="tag_post '.$mess['post_tag'].'">

              '.$mess['post_tag'].'

            </div>

            ';
            if(isset($_SESSION['id']) && $_SESSION['id'] == $mess['user_id']){
              echo '<img class="poubelle" src="img/pbl.png" alt="poubelle" id="'.$mess['post_id'].'">';
            }
            echo '
            </div>

        </div>
        
          <div class="horizontal_bar"></div>

      </div>
      ';
        }
        }

        ?>

    </div>

  </div>

  <img id="mobile_menu" src="img/Hamburger_icon.svg.png" alt="sandwich menu">


  <img id="leave_mobile_menu" src="img/cross.png" alt="sandwich menu">

  <div id="right">

  </div>

  <script src="js/profil.js"></script>
</body>
</html>