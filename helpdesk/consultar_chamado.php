<?php

  require_once "valida_acesso.php";
  require_once "conexao_banco.php";

  $query = "SELECT * FROM chamados";

  $resultado = $conexao->query($query);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
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
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">
        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            <div class="card-body">
                  <?php
                      if (isset($_SESSION['delete']) && $_SESSION['delete']) {
                        echo '
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Registro deletado com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        ';
                        unset($_SESSION['delete']);
                      }
                      if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                          echo '
                            <div class="card mb-3 bg-light">
                              <div class="card-body">
                                <h5 class="card-title">' . $row['titulo'] . '</h5>
                                <h6 class="card-subtitle mb-2 text-muted">' . $row['categoria'] . '</h6>
                                <p class="card-text">' . $row['descricao'] . '</p>
                                <form action="excluir_chamado.php" method="post" onsubmit="return confirm(\'Confirma exclusão?\')">
                                  <input type="hidden" name="id" value= ' . $row['id'] . '>
                                  <button type="submit" class="btn btn-sm btn-primary">Excluir</button>
                                </form>
                              </div>
                            </div>
                          '; 
                        }
                      } else {
                        echo "<div class='text-primary'>Não há chamados a serem exibidos!</div>";
                      }
                  ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>