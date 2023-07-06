<?php

    require_once 'conexao_banco.php';

    session_start();

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $query = "INSERT INTO chamados (titulo, categoria, descricao) VALUES ('$titulo', '$categoria', '$descricao')";

    $resultado = $conexao -> query($query);

    if ($resultado) {
        $_SESSION['chamado'] = true;
    } else {
        $_SESSION['chamado'] = false;
    }

    header('Location: abrir_chamado.php');

?>