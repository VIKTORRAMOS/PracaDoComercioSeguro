<?php
// 1. Inclui a conexão segura que você configurou para o InfinityFree
require 'db.php'; 

try {
    // 2. Busca os registros do banco de dados (Ordenando pelo ID mais recente)
    // O PDO é usado aqui para manter a consistência com o dashboard.php
    $stmt = $pdo->query("SELECT * FROM cidadao ORDER BY id DESC");
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Ocorrências - Visualização Simples</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; background-color: #f4f4f4; }
        .registro { background: white; padding: 15px; margin-bottom: 10px; border-radius: 8px; border-left: 5px solid #1e3a8a; shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .btn-check { text-decoration: none; font-size: 1.2rem; margin-left: 10px; }
        .status-badge { font-weight: bold; color: #475569; }
    </style>
</head>
<body>

    <h1>Relatórios Recebidos</h1>

    <?php if (count($resultados) > 0): ?>
        <?php foreach ($resultados as $row): ?>
            <div class="registro">
                <strong>ID:</strong> <?= $row['id'] ?> | 
                <strong>Nome:</strong> <?= htmlspecialchars($row['nome']) ?> <br>
                <strong>Descrição:</strong> <?= htmlspecialchars($row['descricao']) ?> <br>
                <span class="status-badge">Status Atual: <?= $row['status'] ?></span>
                
                <a href="atualizar_status.php?id=<?= $row['id'] ?>&status=Resolvido" title="Marcar como Resolvido" class="btn-check">✔️</a>
                <a href="atualizar_status.php?id=<?= $row['id'] ?>&status=Pendente" title="Marcar como Pendente" class="btn-check">❌</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma ocorrência encontrada.</p>
    <?php endif; ?>

    <p><a href="dashboard.php">Voltar para o Painel Principal</a></p>

</body>
</html><?php
// 1. Inclui a conexão segura que você configurou para o InfinityFree
/* Importação de Dependência: Estabelece a comunicação com a base de dados através do objeto $pdo, 
   permitindo a execução de consultas estruturadas nos blocos subsequentes. */
require 'db.php'; 

try {
    // 2. Busca os registros do banco de dados (Ordenando pelo ID mais recente)
    // O PDO é usado aqui para manter a consistência com o dashboard.php
    /* Consulta com Ordenação Inversa: Executa a leitura de todos os dados da tabela 'cidadao'.
       O modificador 'ORDER BY id DESC' garante que os relatos mais recentes apareçam no topo da lista. */
    $stmt = $pdo->query("SELECT * FROM cidadao ORDER BY id DESC");
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    /* Tratamento Crítico de Exceções: Aborta o carregamento do restante do layout HTML caso 
       ocorra uma falha física de infraestrutura ou perda de conexão com o banco de dados. */
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Ocorrências - Visualização Simples</title>
    <style>
        /* Estilização Simplificada: Foco no consumo rápido de dados sem sobrecarga visual */
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; background-color: #f4f4f4; }
        /* Card de Registro: Utiliza uma borda esquerda colorida para demarcar visualmente o início de cada item */
        .registro { background: white; padding: 15px; margin-bottom: 10px; border-radius: 8px; border-left: 5px solid #1e3a8a; shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .btn-check { text-decoration: none; font-size: 1.2rem; margin-left: 10px; }
        .status-badge { font-weight: bold; color: #475569; }
    </style>
</head>
<body>

    <h1>Relatórios Recebidos</h1>

    <?php if (count($resultados) > 0): ?>
        <?php foreach ($resultados as $row): ?>
            <div class="registro">
                <strong>ID:</strong> <?= $row['id'] ?> | 
                <strong>Nome:</strong> <?= htmlspecialchars($row['nome']) ?> <br>
                <strong>Descrição:</strong> <?= htmlspecialchars($row['descricao']) ?> <br>
                <span class="status-badge">Status Atual: <?= $row['status'] ?></span>
                
                <a href="atualizar_status.php?id=<?= $row['id'] ?>&status=Resolvido" title="Marcar como Resolvido" class="btn-check">✔️</a>
                <a href="atualizar_status.php?id=<?= $row['id'] ?>&status=Pendente" title="Marcar como Pendente" class="btn-check">❌</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma ocorrência encontrada.</p>
    <?php endif; ?>

    <p><a href="dashboard.php">Voltar para o Painel Principal</a></p>

</body>
</html>
