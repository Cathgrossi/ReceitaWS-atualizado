<?php

require __DIR__.'/vendor/autoload.php';

use \App\WebService\ReceitaWS;

$obReceitaWS = new ReceitaWS;

$cnpj = '60746948000112';

$resultado = $obReceitaWS->consultarCNPJ($cnpj);

if(empty($resultado)) {
    die('Problemas ao consultar CNPJ');
}

if(isset($resultado['error'])) {
    die($resultado['error']);
}

echo "CNPJ: " .$cnpj."\n";
echo  "Razão Social: " .$resultado['nome']."\n";
echo  "Nome Fantasia: " .$resultado['fantasia']."\n";
echo  "Logradouro: " .$resultado['logradouro']."\n";
echo  "Numero: " .$resultado['numero']."\n";
echo  "CEP: " .$resultado['cep']."\n";
echo  "Telefone: " .$resultado['telefone']."\n";