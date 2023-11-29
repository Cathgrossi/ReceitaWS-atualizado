<?php
$host = "localhost:8111";
$user = "root";
$password = "";
$db = "cadastro";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection error");
}

$error_message = ""; // Variável para armazenar a mensagem de erro

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from usuarios where nome= '" . $username . "' AND  senha= '" . $password . "' ";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_array($result);

if ($row !== null) {
    if ($row["usertype"] == "user") {
        $_SESSION["username"] = $username;
        header("location:index-receita.php");
    } elseif ($row["usertype"] == "admin") {
        $_SESSION["username"] = $username;
        header("location:index.php");
    } else {
        $error_message = "Usuário ou senha incorretos";
    }
} else {
    $error_message = "Usuário ou senha incorretos";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login</title>
    <!-- Adicione o link para o Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Estilize a div "form" */
        .form {
            background-color: #d1daba;
            padding: 20px;
            border: 1px solid white;
            border-radius: 10px;
        }

        /* Estilize o label */
        label {
            font-family: 'Arial Rounded MT Bold', sans-serif;
            color: rgb(49, 49, 49); /* Cor lilás */
            font-weight: bold; /* Fonte mais grossa */
        }

        /* Estilize o input de texto */
        input[type="text"],
        input[type="password"] {
            border: 1px solid white;
            background-color: white;
            border-radius: 5px;
            margin: 5px 0;
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-weight: bold; /* Fonte mais grossa */
            color: #565656;
        }

        /* Estilize o botão de submit */
        input[type="submit"] {
            background-color: #9c6d3d; /* Cor lilás */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Estilize o h1 */
        h1 {
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-weight: bold;
            color: #9c6d3d; /* Cor lilás */
            margin-top: 20px; /* Espaço entre o topo da página e o h1 */
        }

        /* Centralize o container */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #fefae0;
        }

        a{
            color: #9c6d3d;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="#" method="POST">
                    <div class="form text-center">
                        <h1 class="text-center">Login</h1>
                        <!-- Adicione a mensagem de erro aqui -->
                        <?php if ($error_message !== "") { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>

                        <div class="form-group">
                            <label for "password">Senha</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                         <!-- Adicione o link "Fazer cadastro" aqui -->
                         <div class="form-group">
                            <p>Ainda não é logado?<a href="cadastro.php">Fazer cadastro</a></p>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Adicione o link para o Bootstrap JS e jQuery (opcional) se necessário -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
