<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>Consulta Receita WS</title>
    <style>
        body {
            background-color: #fefae0; 
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d1daba; padding: 15px 0;">
        <div class="container">
            <a class="navbar-brand" href="./index.php" style="color: #9c6d3d; font-size: 20px; margin-right: 20px; font-weight: bold; font-family: 'Arial Rounded MT Bold', sans-serif;">Receita WS</a>            
            <ul class="navbar-nav ml-auto" style="font-family: 'Arial Rounded MT Bold', sans-serif;">
                <li class="nav-item">
                    <a class="nav-link" href="https://developers.receitaws.com.br/#/" style="color: #9c6d3d; font-weight: bold; letter-spacing: 4px;">API</a>
                </li>
                <li class="nav-item" style="margin-left: 20px;"> 
                    <a class="nav-link" href="https://github.com/Cathgrossi" style="color: #9c6d3d; font-weight: bold; letter-spacing: 4px;">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: #9c6d3d; font-weight: bold; letter-spacing: 4px;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="d-flex justify-content-center align-items-center vh-100" style="margin-top: 160px; ">
    <div class="p-4 rounded" style="background-color: #c2c2ed; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); background-color: #d1daba">
        <h1 class="mb-4" style="font-size: 20px; font-weight: bold; font-family: 'Arial Rounded MT Bold', sans-serif; color: #9c6d3d;">Digite o número do CNPJ</h1>
        <form action="./validar.php" method="POST">
            <div class="mb-4">
                <input type="text" class="form-control" id="cnpj" name="cnpj">
            </div>
            <div class="mb-4">                
                <button type="submit" class="btn btn-outline-light rounded-pill" style="border-color: #d5d5f0; background-color: #9c6d3d; color: #FFFFFF; transition: background-color 0.3s;">
                    Gerar Documentos
                </button>
            </div>
        </form>
    </div>
</main>

<?php

session_start();

if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Adiciona um ouvinte de evento no formulário para executar o tratamento do CNPJ antes de enviar
        document.querySelector("form").addEventListener("submit", function(event) {
            // Obtém o valor do CNPJ do campo de entrada
            const cnpjInput = document.getElementById("cnpj");
            const cnpjValue = cnpjInput.value;

            // Remove caracteres não numéricos (pontos, traços e barras) do valor do CNPJ
            const cnpjNumerico = cnpjValue.replace(/[^0-9]/g, '');

            // Atualiza o valor do campo de entrada com o CNPJ tratado
            cnpjInput.value = cnpjNumerico;
        });
    });
    
</script>
</body>
</html>
