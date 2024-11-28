<?php
namespace App\Models;

use Exception;

class Api
{
    private $urlBase;

    public function __construct($urlBase)
    {
        $this->urlBase = $urlBase;
    }

    private function enviarRequisicao($endpoint, $params = [])
    {
        $url = $this->urlBase . $endpoint;

        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resposta = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception('Erro no cURL: ' . curl_error($ch));
        }

        curl_close($ch);

        return json_decode($resposta, true);
    }

    public function buscarTimes($nomeTime)
    {
        $endpoint = '/api/v1/json/3/searchteams.php';
        $params = ['t' => $nomeTime];

        return $this->enviarRequisicao($endpoint, $params);
    }
}
