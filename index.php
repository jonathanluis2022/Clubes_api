<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Time</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Busque informações do seu Time</h1>
        <form method="GET" action="">
            <label for="nomeTime">Nome do Time:</label>
            <input type="text" id="nomeTime" name="nomeTime" placeholder="digite o nome correto.." required>
            <button type="submit">Buscar</button>
        </form>

        <?php
        // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nomeTime'])) {
            // Incluir sua classe Api e criar uma instância
            require_once 'api.php';
            $urlBase = 'https://www.thesportsdb.com';
            $clienteApi = new Api($urlBase);

            // Nome do time a ser pesquisado
            $nomeTime = $_GET['nomeTime'];

            // Buscar informações sobre o time
            $resultado = $clienteApi->buscarTimes($nomeTime);

            // Verifica se encontrou resultados
            if (isset($resultado['teams']) && !empty($resultado['teams'])) {
                $time = $resultado['teams'][0];
                ?>
                <div class="time-info">
                    <h2>Informações do Time</h2>
                    <p><strong>Nome do Time:</strong> <?php echo $time['strTeam']; ?></p>
                    <p><strong>Ano de Fundação:</strong> <?php echo $time['intFormedYear']; ?></p>
                    <p><strong>Estádio:</strong> <?php echo $time['strStadium']; ?></p>
                    <p><strong>Capacidade do Estádio:</strong> <?php echo $time['intStadiumCapacity']; ?></p>
                    <p><strong>Localização:</strong> <?php echo $time['strLocation']; ?></p>
                    <p><strong>Site:</strong> <a href="<?php echo $time['strWebsite']; ?>" target="_blank"><?php echo $time['strWebsite']; ?></a></p>
                    <?php
                    if (isset($time['strBadge'])) {
                        echo '<p><strong>Escudo</strong><br><img src="' . $time['strBadge'] . '" alt="' . $time['strTeam'] . '" style="max-width: 150px;"></p>';
                    } else {
                        echo '<p>Escudo não encontrado para o time.</p>';
                    }
                    ?>
                </div>
                <?php
            } else {
                echo '<p>Nenhum time encontrado com o nome "' . $nomeTime . '".</p>';
            }
        }
        ?>
    </div>
</body>
</html>

