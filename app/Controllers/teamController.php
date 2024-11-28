<?php
namespace App\Controllers;

use App\Models\Api;

class TeamController
{
    public function index()
    {
        $nomeTime = $_GET['nomeTime'] ?? null;
        $timeInfo = [];

        if ($nomeTime) {
            $api = new Api('https://www.thesportsdb.com');
            $resultado = $api->buscarTimes($nomeTime);

            if (isset($resultado['teams']) && !empty($resultado['teams'])) {
                $timeInfo = $resultado['teams'][0];
            }
        }

        require_once __DIR__ . '/../../resources/views/team.php';
    }
}
