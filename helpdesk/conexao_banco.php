<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'curso';

$conexao = new mysqli('localhost', $username, $password, $database);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

?>