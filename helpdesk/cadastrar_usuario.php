<?php

    session_start();

    require_once "conexao_banco.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $querySelect = "SELECT * FROM usuarios WHERE usuario = '$email'";
    $resultadoSelect = $conexao -> query($querySelect);

    if ($resultadoSelect->num_rows > 0) {
        $_SESSION['cadastroExiste'] = true;
    } else {
        $queryInsert = "INSERT INTO usuarios (usuario, senha) VALUES ('$email', '$senha')";
        $resultadoInsert = $conexao -> query($queryInsert);

        if ($resultadoInsert) {
            $_SESSION['cadastro'] = true;
        } else {
            $_SESSION['cadastro'] = false;
        }
    }
    header('Location: pagina_cadastro.php');