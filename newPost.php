<?php

$pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$r = $pdo->query('SELECT * FROM post INNER JOIN user on post.post_user_id=user.user_id');
      $array_post = [];
      while($mess = $r->fetch(PDO::FETCH_ASSOC)){
      array_push($array_post, $mess);
      }
      $array_post = array_reverse($array_post);
      echo json_encode($array_post[0]["post_tag"]);
?>