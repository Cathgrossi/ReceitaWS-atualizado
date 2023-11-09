<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <title>Cadastro</title>

    <style>
        body {
            background-color: #fefae0; 
        }
    </style>
  </head>
  <body>

    <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #d1daba">
            <a class="navbar-brand" style="color: rgb(49, 49, 49)" href="index-receita.php">Receita<span style="color: #9c6d3d " >WS</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=novo">Novo usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=listar">Listar usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="barra" style="background-color: #fff7c1">
            <p>Você está na página de Administrador</p>
        </div>


    <!-- php -->

    <div class="container">
        <div class="row">
            <div class="col mt-5">
            <?php

            session_start();

            if(!isset($_SESSION["username"]))
            {
                header("location:login.php");
            }

            include("config.php");
             switch(@$_REQUEST ["page"]){
                case "novo":
                    include("novo-usuario.php");
                break;
                case "listar":
                    include("listar-usuario.php");
                break;
                case "salvar":
                    include ("salvar-usuario.php");
                break;
                case "editar":
                    include ("editar-usuario.php");
                break;
        }

             ?>

            </div>
        </div>
    </div>

        <!-- carrosel -->



    

    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>