<?php

  phpinfo();
  exit;

  session_start();

  if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
    header('Location: home.php');
    exit();
  }

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="POST">
                <div class="form-group">
                  <input type="email" name= "email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                  <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                </div>
                <?php
                  if (isset($_SESSION['autenticado']) && !$_SESSION['autenticado']) {
                    echo '<div class="text-danger">Usuário ou senha inválido(s)</div>';
                    unset($_SESSION['autenticado']);
                  }
                  if (isset($_SESSION['acesso']) && !$_SESSION['acesso']) {
                    echo '<div class="text-warning">Página indispońível, faça o login!</div>';
                    unset($_SESSION['acesso']);
                  }
                ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>