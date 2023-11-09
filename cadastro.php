<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Novo Usuário</title>
    <style>
        /* Estilize a fonte com uma letra mais redonda */
        body {
            font-family: 'Arial Rounded MT Bold', sans-serif;
            background-color: #fefae0;
        }

        /* Centralize a div na horizontal e na vertical */
        .center-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #d1daba;
        }
    </style>
</head>
<body>
    <div class="center-div">
        <h1 style="color:#9c6d3d">Novo Usuário</h1>
        <form action="salvar-usuario.php" method="POST">
            <input type="hidden" name="acao" value="cadastrar2">
            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="mb-3">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>
            <div class="mb-3">
                <label>Data de Nascimento</label>
                <input type="date" name="data_nasc" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" style="background-color: #9c6d3d">Enviar</button>
                <button type="button" class="btn" style="background-color: rgb(156, 109, 61); color: #fefae0" onclick="limparInputs()"> Limpar Campos</button>
                <a href="login.php"><button type="button" class="btn btn-secondary" style="background-color: rgb(156, 109, 61)">voltar</button></a>
            </div>
        </form>
    </div>

    <script>
        function limparInputs() {
            var inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="date"]');
            
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }
        }
    </script>
</body>
</html>
