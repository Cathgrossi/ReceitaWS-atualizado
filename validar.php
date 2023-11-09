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
        .main-container {
            background-color: #c2c2ed; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); 
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d1daba; padding: 15px 0;">
        <div class="container">
            <a class="navbar-brand" href="index-receita.php" style="color: #9c6d3d; font-size: 20px; margin-right: 20px; font-weight: bold; font-family: 'Arial Rounded MT Bold', sans-serif;">Receita WS</a>            
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

<main class="my-4">
    <div class="container main-container" style="margin-top: 100px; background-color: #d1daba;">
        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                <?php

                class CNPJ {

                /**
                 * @param string %cnpj
                 * @return boolean
                 */

                public static function validar($cnpj) {
                     $cnpj = preg_replace('/\D/', '', $cnpj);

                     if(strlen($cnpj) != 14) {
                        return false;
                    }
                }
            }
            

                require __DIR__.'/vendor/autoload.php';

                    use \App\WebService\ReceitaWS;

                    $obReceitaWS = new ReceitaWS;

                    $resultado = array(
                        'cnpj' => '',
                        'nome' => '',
                        'fantasia' => '',
                        'status' => '',
                        'logradouro' => '',
                        'numero' => '',
                        'cep' => '',
                        'telefone' => '',
                    );

                    $cnpj = ''; 

                    if(isset($_POST['cnpj'])) {
                        $cnpj = $_POST['cnpj'];

                        $consulta = $obReceitaWS->consultarCNPJ($cnpj);

                        if(isset($consulta['error'])) {
                            die($consulta['error']);
                        }

                        if(!empty($consulta)) {
                            $resultado = $consulta;
                        } else {
                            echo '<div class="alert alert-danger" role="alert">CNPJ não encontrado.</div>';
                        }
                    }

                    
                ?>

                    <div class="mb-4">
                        <label for="cnpj" class="form-label font-weight-bold" style="color: #9c6d3d;">CNPJ:</label>
                        <input style="background-color:  #fefae0;" type="text" class="form-control" id="cnpj" aria-describedby="cnpjHelp" name="cnpj" value="<?php echo $cnpj; ?>">
                    </div>
                    <div class="mb-4">
                        <label for="razaoSocial" class="form-label font-weight-bold" style="color: #9c6d3d;">Razão Social:</label>
                        <input style="background-color:  #fefae0;" type="text" class="form-control" id="razaoSocial" name="nome" value="<?php echo $resultado['nome']; ?>">
                    </div>
                    <div class="mb-4">
                        <label for="nomeFantasia" class="form-label font-weight-bold" style="color: #9c6d3d;">Nome Fantasia:</label>
                        <input style="background-color:  #fefae0;" type="text" class="form-control" id="nomeFantasia" name="fantasia" value="<?php echo $resultado['fantasia']; ?>">
                    </div>
                    <div class="mb-4">
                        <label for="statusEmpresa" class="form-label font-weight-bold" style="color: #9c6d3d;">Status da Empresa:</label>
                        <input style="background-color:  #fefae0;" type="text" class="form-control" id="statusEmpresa" name="status" value="<?php echo $resultado['status']; ?>">
                    </div>
                    <div class="mb-4">
                        <label for="logradouro" class="form-label font-weight-bold" style="color: #9c6d3d;">Logradouro:</label>
                        <input style="background-color:  #fefae0;" type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo $resultado['logradouro']; ?>">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label for="numero" class="form-label font-weight-bold" style="color: #9c6d3d;">Número:</label>
                    <input style="background-color:  #fefae0;" type="text" class="form-control" id="numero" name="numero" value="<?php echo $resultado['numero']; ?>">
                </div>
                <div class="mb-4">
                    <label for="cep" class="form-label font-weight-bold" style="color: #9c6d3d;">CEP:</label>
                    <input style="background-color:  #fefae0;" type="text" class="form-control" id="cep" name="cep" value="<?php echo $resultado['cep']; ?>">
                </div>
                <div class="mb-4">
                    <label for="telefone" class="form-label font-weight-bold" style="color: #9c6d3d;">Telefone:</label>
                    <input style="background-color:  #fefae0;" type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $resultado['telefone']; ?>">
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
