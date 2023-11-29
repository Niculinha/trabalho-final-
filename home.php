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

    // Verificar se a consulta foi bem-sucedida
    if ($result) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receitas Já</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css/styles.css">
  <link rel="stylesheet" href="home.js">
</head>
<body>
  <div class="background">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.HTML">
          <img src="imagens/logo.png.png" alt="Logo" width="100" height="100" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <div><a class="nav-link active special-link" aria-current="page" href="receitasalgadas.html">Receitas Salgadas</a></div>
            </li>
            <li class="nav-item">
              <div><a class="nav-link active special-link" aria-current="page" href="receitadoces.html">Receitas Doces</a></div>
            </li>
            <li class="nav-item">
              <div><a class="nav-link active special-link" aria-current="page" href="receitasveganas.html">Receitas Veganas</a></div>
            </li>
            <li class="nav-item">
              <div><a class="nav-link active special-link" aria-current="page" href="index.html">Sua Receita</a></div>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar receitas" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  <h1>Destaques da semana:</h1>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imagens/panqueca.png.webp" class="d-block w-100 img-carousel" alt="panqueca">
      </div>
      <div class="carousel-item">
        <img src="imagens/lasanha-do-ze-principal-1.png" class="d-block w-100 img-carousel" alt="lasanha">
      </div>
      <div class="carousel-item">
        <img src="imagens/strogonoff.webp" class="d-block w-100 img-carousel" alt="strogonoff">
      </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>

<div class="frase-centralizada">
  <h2> <em> "A gastronomia transforma alimentos em arte." </em> </h2>
  <h3>Chef Di Manno</h3>
</div>

<form action="home.php" method="POST" class="myForm">
  <fieldset>
    <div class="row">
      <div class="column">
        <div class="input-group">
          <label for="customer_name">Nome: </label>
          <input type="text" id="customer_name" name="Nome">
        </div>
      </div>
    </div>
  </fieldset>
  <!-- Adicione os atributos name nos outros campos do formulário -->
  <fieldset>
    <div class="input-group">
      <label for="phone_number">Telefone: </label>
      <input type="tel" id="phone_number" name="Telefone" placeholder="(dd) d dddd-dddd">
    </div>
  </fieldset>
  <fieldset>
    <div class="input-group">
      <label for="email_address">Email: </label>
      <input type="email" id="email_address" name="Email">
    </div>
  </fieldset>
  <fieldset>
    <div class="input-group">
      <label for="data_nasc">Data de nascimento:</label>
      <input type="date" id="data_nasc" name="datadenascimento">
    </div>
  </fieldset>
  <fieldset>
    <div class="input-group">
      <label for="campo_estado">Estado: </label>
      <input type="text" id="campo_estado" name="Estado">
    </div>
  </fieldset>
  <fieldset>
    <div class="input-group">
      <label for="campo_cidade">Cidade: </label>
      <input type="text" id="campo_cidade" name="Cidade">
    </div>
  </fieldset>
  <fieldset>
    <div class="input-group">
      <label id="campo_CEP">CEP:</label>
      <input type="text" id="cep" name="cep" placeholder="(dd) d dddd-dddd">
    </div>
  </fieldset>
  <fieldset>
    <div class="input-group">
      <label for="campo_endereco">Endereço: </label>
      <input type="text" id="campo_endereco" name="Endereço">
    </div>
  </fieldset>

  <input type="submit" name="submit" id="submit">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
      <h5 class="card-title">Lista de desejos</h5> 
      <img src="imagens/icon.svg" alt="lista"> 
      <p class="card-text">Escreva aqui as receitas que você gostaria de ver em nosso site</p>
      <a href="lista.html" class="btn btn-primary">Ir</a>
    </div>
    </div>
    
  </body>
</html>
