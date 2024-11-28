<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TeamController;

// Roteamento simples
$controller = new TeamController();
$controller->index();
