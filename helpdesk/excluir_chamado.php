<?php

    require_once 'conexao_banco.php';
    require_once 'valida_acesso.php';

    if (isset($_POST['id']) && $_POST['id']) {

        $query = "DELETE FROM chamados WHERE id = $_POST[id]";

        $resultado = $conexao->query($query);

        if ($conexao -> affected_rows > 0) {
            $_SESSION['delete'] = true;
            header('Location: consultar_chamado.php');
        } else {
            echo "Ocorreu um erro!";
        }
    } else {
        echo 'Você não tem permissão para realizar esta ação!';
    }