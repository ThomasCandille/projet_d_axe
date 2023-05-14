<?php

$pdo = new PDO('mysql:host=localhost;dbname=projet_d_axe','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$pdo->exec("INSERT INTO post(post_pseudo, post_text, post_like, post_pp, post_tag, post_tag_class, post_file, post_user_id) VALUES ('RasperyPico <3','Bip bip boup','0','https://fastly.picsum.photos/id/149/200/200.jpg?hmac=ykhZe9T_HysK0voTz01NVBW7C8XlLYYT2EinqAhTA-0','Misc','Misc','','7')");

header("Refresh:0; url:index.php");
?>