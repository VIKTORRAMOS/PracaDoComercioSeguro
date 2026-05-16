<?php
// 1. MOSTRAR ERROS (Para resolver a tela branca)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. CONEXÃO (Ajustado para o nome do seu arquivo)
require 'db.php'; 

$senha_correta = "203";

// 3. LÓGICA DE LOGIN
if (!isset($_SESSION['logado'])) {
    if (isset($_POST['senha']) && $_POST['senha'] == $senha_correta) {
        $_SESSION['logado'] = true;
    } else {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acesso Restrito - Comércio Seguro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; width: 100%; max-width: 350px; border-top: 6px solid #1e3a8a; }
        .login-card i { font-size: 3rem; color: #1e3a8a; margin-bottom: 15px; }
        h2 { color: #1e3a8a; margin-bottom: 20px; font-size: 20px; }
        input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1.5px solid #e2e8f0; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #1e3a8a; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: 0.3s; }
        button:hover { background: #2563eb; }
    </style>
</head>
<body>
    <div class="login-card">
        <i class="fas fa-lock"></i>
        <h2>Painel Administrativo</h2>
        <form method="POST">
            <input type="password" name="senha" placeholder="Digite a senha de acesso" required autofocus>
            <button type="submit">Acessar Painel</button>
        </form>
    </div>
</body>
</html>
<?php
        exit;
    }
}

// 4. BUSCA OS DADOS (Ordem crescente por ID)
$stmt = $pdo->query("SELECT * FROM cidadao ORDER BY id ASC");
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Comércio Seguro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; margin: 0; padding: 20px; color: #1e293b; }
        .header { display: flex; justify-content: space-between; align-items: center; background: #1e3a8a; color: white; padding: 20px 30px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .header h1 { margin: 0; font-size: 22px; display: flex; align-items: center; gap: 10px; }
        .btn-sair { background: #ef4444; color: white; text-decoration: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; font-size: 14px; transition: 0.3s; }
        .btn-sair:hover { background: #dc2626; }
        
        .table-container { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f1f5f9; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 12px; padding: 15px; text-align: left; }
        td { padding: 15px; border-top: 1px solid #f1f5f9; font-size: 14px; }
        tr:hover { background: #f8fafc; }
        
        .badge { padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 700; text-transform: uppercase; }
        .status-pendente { background: #fef3c7; color: #92400e; }
        .status-resolvido { background: #dcfce7; color: #166534; }
        .status-erro { background: #fee2e2; color: #991b1b; }

        .btn-acao { text-decoration: none; font-size: 12px; font-weight: 600; padding: 6px 12px; border-radius: 6px; transition: 0.2s; margin-right: 5px; }
        .res { background: #dcfce7; color: #166534; border: 1px solid #166534; }
        .n-res { background: #fee2e2; color: #991b1b; border: 1px solid #991b1b; }
        .res:hover { background: #166534; color: white; }
        .n-res:hover { background: #991b1b; color: white; }
    </style>
</head>
<body>

<div class="header">
    <h1><i class="fas fa-shield-halved"></i> Painel Comércio Seguro</h1>
    <a href="logout.php" class="btn-sair"><i class="fas fa-right-from-bracket"></i> Encerrar Sessão</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cidadão</th>
                <th>CPF / Contato</th>
                <th>Ocorrência</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $row): ?>
            <tr>
                <td><strong>#<?= $row['id'] ?></strong></td>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td style="font-size: 12px; color: #64748b;">
                    <i class="fas fa-id-card"></i> <?= htmlspecialchars($row['cpf']) ?><br>
                    <i class="fas fa-phone"></i> <?= htmlspecialchars($row['contato']) ?>
                </td>
                <td>
                    <?php 
                        // Lógica corrigida para mostrar "Outros"
                        if($row['problema'] == 'F') echo '🚨 Furto';
                        elseif($row['problema'] == 'L') echo '💡 Iluminação';
                        elseif($row['problema'] == 'O') echo '⚠️ Outros';
                        else echo '❓ Indefinido';
                    ?>
                </td>
                <td style="max-width: 300px; color: #475569; font-size: 13px;"><?= nl2br(htmlspecialchars($row['descricao'])) ?></td>
                <td>
                    <?php 
                        $class = $row['status'] == 'Resolvido' ? 'status-resolvido' : ($row['status'] == 'Não Resolvido' ? 'status-erro' : 'status-pendente');
                    ?>
                    <span class="badge <?= $class ?>"><?= $row['status'] ?></span>
                </td>
                <td>
                    <a href="atualizar_status.php?id=<?= $row['id'] ?>&status=Resolvido" class="btn-acao res">Resolvido</a>
                    <a href="atualizar_status.php?id=<?= $row['id'] ?>&status=Não Resolvido" class="btn-acao n-res">Não Resolvido</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>