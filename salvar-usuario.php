<?php

require_once("./config.php");

switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc, usertype) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}','user')";

        $res = $conn->query($sql);

        if ($res==true) {
            print "<script> alert('Cadastro realizado com sucesso'); </script>";
            print "<script> location.href='login.php'; </script>";
        } else{
            print "<script> alert('Não foi possivel cadastrar'); </script>";
            print "<script> location.href='cadastro.php'; </script>";
        }
        break;

        
        case 'cadastrar2':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"];
    
            $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";
    
            $res = $conn->query($sql);
    
            if ($res==true) {
                print "<script> alert('Cadastro realizado com sucesso'); </script>";
                print "<script> location.href='?page=listar'; </script>";
            } else{
                print "<script> alert('Não foi possivel cadastrar'); </script>";
                print "<script> location.href='cadastro.php'; </script>";
            }
            break;
    
            

    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET 
                    nome='{$nome}', 
                    email='{$email}', 
                    senha='{$senha}', 
                    data_nasc='{$data_nasc}' 
                WHERE 
                    id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res==true) {
            print "<script> alert('Editado com sucesso'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        } else{
            print "<script> alert('Não foi possivel editar'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res==true) {
            print "<script> alert('Excluido com sucesso'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        } else{
            print "<script> alert('Não foi possivel exclui'); </script>";
            print "<script> location.href='?page=listar'; </script>";
        }
        break;
}
