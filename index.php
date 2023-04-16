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


    <div id="mid_action_container">

      <div id="home_page_button" class="mid_action">

        Home Page

      </div>

      <div id="mid_action_post_maker" class="mid_action">

        Make A Post

      </div>
    
    </div>

    <form id="post_maker" class="hidden" method="post" enctype="multipart/form-data"> 

      <div id="container_post_txt">

        <textarea placeholder="Ecrire ici" name="post" id="post_txt" cols="30" rows="50"></textarea>
        
      </div>

      <div id="container_input_file">

        <input id="input_file" type="file" name="input_file" >

        </div>

      <div class="post_actions_container">

        <div>

          <select name="tag_selector" id="tag_selector">

            <option value=""> Select a tag</option>
            <option class="HTML" value="HTML"> HTML </option>
            <option class="CSS" value="CSS"> CSS </option>
            <option class="JS" value="JS"> JS </option>
            <option class="VsCode" value="VsCode"> VsCode </option>
            <option class="PhP" value="PhP"> PhP </option>
            <option class="MySQL" value="MySQL"> MySQL </option>
            <option class="Ruby" value="Ruby"> Ruby </option>
            <option class="Python" value="Python"> Python </option>
            <option class="Memes" value="Memes"> Memes </option>
            <option class="Misc" value="Misc"> Misc </option>

          </select>

        </div> 

        <div id="annuler">

          annuler

        </div>

        <input id="input_post" type="submit" name="post_made" value="Post !">

      </div>

    </form>

    <div class="horizontal_bar"></div>

      <div id="post_container">

      <?php 

      $pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
      
      

      if(isset($_POST['post_made']) && isset($_SESSION['pseudo'])){
        $message = addslashes($_POST['post']);
        $like = 0;
        $tag = $_POST['tag_selector'];

        if(isset($_FILES['input_file'])){
          $files = $_FILES["input_file"];
          $file_name = $files['name'];
          $file_tmp = $files['tmp_name'];
          $file_size = $files['size'];
          

          $possible_ext = ["jpg","jpeg","png","gif"];
          $file_name_part = explode('.', $file_name);
          $file_ext = strtolower(end($file_name_part));
          if(!in_array($file_ext, $possible_ext)){
            $files = null;
          }

          if($file_size >= 2000000){
            $files = null;
          }

          move_uploaded_file($file_tmp, "img/".$file_name);
        }
        else{
          $files = null;
        }
        


        $pdo->exec("INSERT INTO post(post_pseudo, post_text, post_like, post_pp, post_tag, post_tag_class, post_file) VALUES ('$_SESSION[pseudo]','$message','$like','$_SESSION[photo]','$tag','$tag','$file_name')");
      }

      ?>
      

      <?php

      //SUPPRIMER UN POST
      if(isset($_POST['delete'])){
        $id = $_POST['id_post'];
        $pdo->exec("DELETE FROM post WHERE post_id=$id");
      }
      //SUPPRIMER UN POST

      //RECUPERE LES POST DANS LA TABLE
      $r = $pdo->query('SELECT * FROM post');
      $array_post = [];
      while($mess = $r->fetch(PDO::FETCH_ASSOC)){
      array_push($array_post, $mess);
      }
      //RECUPERE LES POST DANS LA TABLE

      $array_post = array_reverse($array_post);

      //PUBLIER UN POST
      foreach($array_post as $mess){
        echo
        '
        <div class="post">

          <div class="post_info">

          <div class="post_user_info">

            <img class="profile_picture" src="'.$mess['post_pp'].'" alt="photo de profil">
            <p class="username"> '.$mess['post_pseudo'].' </p>
            <p class="date_post">'.$mess['post_time'].'</p>

          </div>

          <div class="post_bar">

          </div>

          <div class="post_content">

            <p> '.$mess['post_text'].' </p>

          </div>

          <div class="container_img_post">

          <img class="imported_img" src="img/'.$mess['post_file'].'" alt="Image">

          </div>

          <div class="post_end">

            <div class="tag_post '.$mess['post_tag'].'">

              '.$mess['post_tag'].'

            </div>

            ';
            if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == $mess['post_pseudo']){
              echo '<img class="poubelle" src="img/pbl.png" alt="poubelle" id="'.$mess['post_id'].'">';
            }
            echo '
            </div>

        </div>
        
          <div class="horizontal_bar"></div>

      </div>
      ';
      }
      //PUBLIER UN POST

      ?>

    </div>

    

      <img id="post_button" src="img/make_a_post.png" alt="fait un post">
  

      <img id="mobile_menu" src="img/Hamburger_icon.svg.png" alt="sandwich menu">


      <img id="leave_mobile_menu" src="img/cross.png" alt="sandwich menu">


      <img id="hashtag_mobile"  src="img/hashtag.svg" alt="hashtag">


      <img id="leave_hashtag" src="img/cross.png" alt="leave hashtag">

    

    <div id="verif_suppr" class="hidden">

      <p> Supprimer ?</p>

      <div id="verif_suppr_proposition">

        <div id="suppr_oui">

          <form method="post">
            <textarea name="id_post" id="suppr_oui_get_id" style="display: none;"></textarea>
            <input type="submit" name="delete" id="delete" >
          </form>

        </div>

        <div id="suppr_non">

          Non

        </div>
        
      </div>

    </div>

  </div>

  <div id="right">

    <div class="tag_name">
      Tag
    </div>

    <div class="between_tag_bar"></div>

    <div class="HTML tag">
      HTML
    </div>

    <div class="between_tag_bar"></div>

    <div class="CSS tag">
      CSS
    </div>

    <div class="between_tag_bar"></div>

    <div class="JS tag">
      JavaScript
    </div>

    <div class="between_tag_bar"></div>

    <div class="VsCode tag">
      VsCode
    </div>

    <div class="between_tag_bar"></div>

    <div class="PhP tag">
      PhP
    </div>

    <div class="between_tag_bar"></div>

    <div class="MySQL tag">
      MySQL
    </div>

    <div class="between_tag_bar"></div>

    <div class="Ruby tag">
      Ruby
    </div>

    <div class="between_tag_bar"></div>

    <div class="Python tag">
      Python
    </div>

    <div class="between_tag_bar"></div>

    <div class="Memes tag">
      Memes
    </div>

    <div class="between_tag_bar"></div>

    <div class="Misc tag">
      Misc
    </div>

    <div class="between_tag_bar"></div>

    <div id="all_tag">
      Clear All
    </div>

  </div>

  <div id="connect_toi" class="hidden">

<p id="connect_toi_content" style="visibility: hidden;">  

<?php

if(isset($_SESSION['pseudo'])){
  echo $_SESSION['pseudo'];
}
else{
  echo 'no_connect';
}

?>

<div id="connect_toi_txt">
<p>
  Tu veux voir plus de contenu ?<br>

  Créer to compte ou connecte toi pour continuer
</p>
</div>

<a href="account.php">
<div class="left_button">

  connect
  
</div>
</a>

</p>



</div>

  <script src="js/script.js"></script>
</body>
</html>