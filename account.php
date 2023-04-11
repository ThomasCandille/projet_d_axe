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

  <div id="left">

    <div id="info_user">
      
      <img id="icon_pp" src="img/pp_un.png" alt="pp">
      <p id="user_username">xXUserXx</p>
      
    </div>

    <div>

    </div>

    <a href="index.html">

    <div class="left_button">

      Home Page
      
    </div>
  
    </a>

    <div id="left_make_a_post" class="left_button">

      New Post
      
    </div>

    <a href="settings.html">
      
      <div class="left_button">

      Settings
      
    </div>
  
    </a>
    

    <div>

    </div>

    <a href="account.html">
    <div class="left_button">

      connect
      
    </div>
    </a>
    
  </div>

  

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

    <div id="form_connect" class="form_style hidden">

    <div class="container">
      <p> Log In</p>
      <form class="form-horizontal">

        <div class="form-group space_form">

          <label class="control-label col-sm-2 space_form" for="mail1"> Mail</label>
          <div class="col-sm-8 offset-sm-2">

            <input type="email" class="form-control" id="mail1" placeholder="adresse mail">

          </div>

        </div>

        <div class="form-group space_form">

          <label class="control-label col-sm-2 space_form" for="password1"> mot de passe</label>
          <div class="col-sm-8 offset-sm-2">

            <input type="password" class="form-control" id="password1" placeholder="mot de passe">


          </div>

        </div>

        <div class="form-group">

          <div class="offset-sm-2 col-sm-8">
            <button type="submit" class="btn btn-primary">Envoyer</button>

          </div>

        </div>

      </form>

    </div>

    </div>

    <div id="form_subscribe" class="form_style hidden">

      <div class="container">
        <p> Subscribe</p>
        <form class="form-horizontal">
  
          <div class="form-group space_form">
  
            <label class="control-label col-sm-2 space_form" for="mail2"> Mail</label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="email" class="form-control" id="mail2" placeholder="adresse mail">
  
            </div>
  
          </div>
  
          <div class="form-group space_form">
  
            <label class="control-label col-sm-2 space_form" for="password2"> mot de passe</label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="password" class="form-control" id="password2" placeholder="mot de passe">
  
  
            </div>

            </div>

            <div class="form-group space_form">
  
            <label class="control-label col-sm-2 space_form" for="password2verif"> mot de passe</label>
            <div class="col-sm-8 offset-sm-2">
  
              <input type="password" class="form-control" id="password2verif" placeholder="mot de passe">
  
  
            </div>
  
          </div>
  
          <div class="form-group">
  
            <div class="offset-sm-2 col-sm-8">
              <button type="submit" class="btn btn-primary">Envoyer</button>
  
            </div>
  
          </div>
  
        </form>
  
      </div>
  
      </div>

  </div>

  <div id="right">

  </div>

  <script src="js/settings.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>