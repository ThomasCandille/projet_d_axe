<?php

$pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$pdo->exec("INSERT INTO post(post_text, post_like,post_tag,post_user_id) VALUES ('Bip bip boup','0','Misc','7')");

header("Refresh:0; url:index.php");
?>