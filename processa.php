<?php
// Importação de Dependência: Carrega o arquivo de conexão com o banco de dados ($pdo)
require 'db.php';

// Início do HTML para manter o estilo mesmo em caso de erro
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando Relato - Comércio Seguro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Estilização Base: Centralização absoluta do card de resposta na tela */
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        /* Container de Resposta: Apresentação compacta e elegante do feedback (Sucesso ou Erro) */
        .card { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; max-width: 400px; width: 100%; border-top: 8px solid #10b981; }
        .icon-success { font-size: 4rem; color: #10b981; margin-bottom: 20px; }
        .icon-error { font-size: 4rem; color: #ef4444; margin-bottom: 20px; }
        h2 { color: #1e3a8a; margin-bottom: 10px; }
        p { color: #64748b; margin-bottom: 30px; line-height: 1.5; }
        /* Componente de Botão: Efeito hover suave e transição de elevação ao passar o mouse */
        .btn { display: inline-block; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: 0.3s; margin: 5px; }
        .btn-primary { background: #1e3a8a; color: white; }
        .btn-secondary { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
        .btn:hover { opacity: 0.9; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="card">
<?php
// Filtro de Entrada: Garante que o script só processe dados enviados através de requisições POST do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Coleta de Dados: Captura as variáveis enviadas pelo corpo da requisição HTTP POST.
       Nota de Segurança: Para produção, recomenda-se o uso de funções de sanitização (ex: filter_input). */
    $nome      = $_POST['nome'];
    $cpf       = $_POST['cpf'];
    $contato   = $_POST['contato'];
    $problema  = $_POST['problema'];
    $descricao = $_POST['descricao'];

    try {
        /* Segurança contra SQL Injection: Utiliza Prepared Statements com placeholders (?)
           para garantir que os dados do usuário nunca sejam executados como código SQL */
        $sql = "INSERT INTO cidadao (nome, cpf, contato, problema, descricao) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $cpf, $contato, $problema, $descricao]);
        
        // Versão Estilizada do Sucesso: Renderiza as mensagens e botões caso a inserção ocorra sem falhas
        echo '<i class="fas fa-check-circle icon-success"></i>';
        echo '<h2>Relato Enviado!</h2>';
        echo '<p>Obrigado por colaborar com o <strong>Comércio Seguro</strong>. Sua ocorrência foi registrada e será analisada.</p>';
        echo '<a href="index.php" class="btn btn-primary">Novo Relato</a>';
        echo '<a href="dashboard.php" class="btn btn-secondary">Ir para Painel</a>';
        
    } catch (PDOException $e) {
        // Tratamento de Exceções: Captura falhas de banco de dados sem quebrar o layout da página
        echo '<i class="fas fa-exclamation-triangle icon-error"></i>';
        /* Código de Erro 23000: Corresponde a violações de constraint de integridade.
           Indica que o CPF tentado já existe em uma coluna configurada como UNIQUE no banco */
        if ($e->getCode() == 23000) {
            echo '<h2>CPF já Cadastrado</h2>';
            echo '<p>Este CPF já possui um registro em nosso systema.</p>';
        } else {
            // Erro Genérico: Captura qualquer outra falha crítica de infraestrutura ou conexão
            echo '<h2>Erro no Sistema</h2>';
            echo '<p>Não foi possível salvar seu relato agora. Tente novamente mais tarde.</p>';
        }
        echo '<a href="index.php" class="btn btn-primary">Tentar Novamente</a>';
    }
} else {
    // Proteção de Acesso Direto: Se alguém tentar acessar a URL via GET, é redirecionado para a home automaticamente
    header("Location: index.php");
}
?>
</div>

</body>
</html>
