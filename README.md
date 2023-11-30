# Back-end-trabalho-final

Bom, na parte back-end decidimos utilizar a linguagem PHP, que faz a interação com o banco de dados que usamos chamado MySql Workbench.
Nesse banco de dados armazenamos todos os cadastros do formulario do nosso site. (com o uso do XAMPP)

Codigo usado na parte back-end : 

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


?>
####
Agora, php junto com a home do site html: 

<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    // Verificar a conexão
    if (!$conexao) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $customer_name = $_POST['Nome'];
    $email_address = $_POST['Email'];
    $phone_number = $_POST['Telefone'];
    $campo_CEP = $_POST['cep'];
    $data_nasc = $_POST['datadenascimento'];
    $campo_cidade = $_POST['Cidade'];
    $campo_estado = $_POST['Estado'];
    $campo_endereco = $_POST['Endereço'];

    $customer_name = mysqli_real_escape_string($conexao, $customer_name);
    $email_address = mysqli_real_escape_string($conexao, $email_address);
    $phone_number = mysqli_real_escape_string($conexao, $phone_number);
    $campo_CEP = mysqli_real_escape_string($conexao, $campo_CEP);
    $data_nasc = mysqli_real_escape_string($conexao, $data_nasc);
    $campo_cidade = mysqli_real_escape_string($conexao, $campo_cidade);
    $campo_estado = mysqli_real_escape_string($conexao, $campo_estado);
    $campo_endereco = mysqli_real_escape_string($conexao, $campo_endereco);

    
    $query = "INSERT INTO cliente (nome, email, telefone, cep, data_nasc, cidade, estado, Endereco) 
              VALUES ('$customer_name', '$email_address', '$phone_number', '$campo_CEP', '$data_nasc', '$campo_cidade', '$campo_estado', '$campo_endereco')";

    // Executar a consulta
    $result = mysqli_query($conexao, $query);

    // Verificar se a consulta foi bem sucedida
    if ($result) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
