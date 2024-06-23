<?php

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
            $url .= '?' . http_build_query($params);//transforma o parametro em query string 
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //retorna como string antes de exibila

        $resposta = curl_exec($ch); //executa a requisicao cURL
        if (curl_errno($ch)) {
            throw new Exception('Erro no cURL: ' . curl_error($ch));
        }

        curl_close($ch); // fecha a sessao liberando os recursos da requisicao

        return json_decode($resposta, true); //retorna como array associativo
    }

    public function buscarTimes($nomeTime)
    {
        $endpoint = '/api/v1/json/3/searchteams.php'; //endipoit onde esta os times
        $params = ['t' => $nomeTime]; //passando como parametro o time que eu quero buscalo 
        
        return $this->enviarRequisicao($endpoint, $params); // chamo o metodo enviar requisicao 
    }
}

?>
