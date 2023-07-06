<?php

    session_start();

    if (!isset($_SESSION['autenticado']) && !$_SESSION['autenticado']) {
        $_SESSION['acesso'] = false;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['acesso'] = true;
    }

?>