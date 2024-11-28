<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Time</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Busque informações do seu Time</h1>
        <form method="GET" action="index.php">
            <label for="nomeTime">Nome do Time:</label>
            <input type="text" id="nomeTime" name="nomeTime" placeholder="Digite o nome correto..." required>
            <button type="submit">Buscar</button>
        </form>

        <?php if (!empty($timeInfo)): ?>
            <div class="time-info">
                <h2>Informações do Time</h2>
                <p><strong>Nome do Time:</strong> <?= $timeInfo['strTeam'] ?? 'N/A'; ?></p>
                <p><strong>Ano de Fundação:</strong> <?= $timeInfo['intFormedYear'] ?? 'N/A'; ?></p>
                <p><strong>Estádio:</strong> <?= $timeInfo['strStadium'] ?? 'N/A'; ?></p>
                <p><strong>Capacidade do Estádio:</strong> <?= $timeInfo['intStadiumCapacity'] ?? 'N/A'; ?></p>
                <p><strong>Localização:</strong> <?= $timeInfo['strLocation'] ?? 'N/A'; ?></p>
                <p><strong>Site:</strong> <a href="<?= $timeInfo['strWebsite'] ?? '#'; ?>" target="_blank"><?= $timeInfo['strWebsite'] ?? 'N/A'; ?></a></p>
                <?php if (isset($timeInfo['strBadge'])): ?>
                    <p><strong>Escudo:</strong><br>
                        <img src="<?= $timeInfo['strBadge']; ?>" alt="<?= $timeInfo['strTeam']; ?>" style="max-width: 150px;">
                    </p>
                <?php else: ?>
                    <p>Escudo não encontrado para o time.</p>
                <?php endif; ?>
            </div>
        <?php elseif ($nomeTime): ?>
            <p>Nenhum time encontrado com o nome "<?= htmlspecialchars($nomeTime); ?>".</p>
        <?php endif; ?>
    </div>
</body>
</html>
