<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'formulario-clientes');

$conexao = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conexao->connect_errno) {
    echo "Erro na conexão: " . $conexao->connect_error;
    exit(); // Adicionando exit para interromper a execução em caso de erro
}

$conexao->set_charset("utf8");

// O restante do seu código pode continuar aqui

?>