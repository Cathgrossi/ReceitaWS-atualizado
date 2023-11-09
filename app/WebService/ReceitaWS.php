<?php

namespace App\WebService;

class ReceitaWS{

    /**
     * 
     * @var string
     */
    const URL_BASE = 'https://receitaws.com.br';


    /**
     * @param string 
     * @return array
     */
    public function consultarCNPJ($cnpj) {
        return $this->get('/v1/cnpj/'.$cnpj);
    }


    /**
     * @param string
     * @return array 
     */
    public function get($resource) {
        $endpoint = self::URL_BASE.$resource;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $responseArray = json_decode($response, true);

        return is_array($responseArray) ? $responseArray : [];
    }
}