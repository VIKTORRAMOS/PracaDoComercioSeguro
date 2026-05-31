<?php
// Gerenciamento de Sessão: Inicializa ou recupera a sessão ativa do usuário no servidor
session_start();
// Importação de Dependência: Conecta ao banco de dados e disponibiliza a instância do objeto $pdo
require 'db.php';

// Proteção extra: só atualiza se estiver logado
/* Controle de Autenticação: Verifica se a variável de sessão 'logado' não foi definida.
   Caso o usuário não esteja autenticado, a execução é interrompida imediatamente por segurança. */
if (!isset($_SESSION['logado'])) {
    die("Acesso negado.");
}

/* Validação dos Parâmetros GET: Verifica se os identificadores obrigatórios ('id' e 'status') 
   foram passados na URL antes de iniciar qualquer operação de modificação no banco de dados. */
if (isset($_GET['id']) && isset($_GET['status'])) {
    // Atribuição de Variáveis: Armazena os dados vindos da requisição URL HTTP GET
    $id = $_GET['id'];
    $novo_status = $_GET['status'];

    /* Prevenção de SQL Injection: Utiliza Prepared Statements com placeholders (?) para que o motor
       do MySQL trate os parâmetros puramente como valores, e nunca como comandos executáveis. */
    $sql = "UPDATE cidadao SET status = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    // Execução da Query: Vincula as variáveis recebidas aos placeholders e atualiza o registro
    $stmt->execute([$novo_status, $id]);
}

/* Redirecionamento de Fluxo: Envia um cabeçalho HTTP para o navegador do usuário, 
   forçando-o a retornar para a tela do painel de controle (dashboard.php). */
header("Location: dashboard.php");
/* Encerramento do Script: Boa prática que interrompe o processamento do PHP após o comando 
   de redirecionamento, impedindo o carregamento desnecessário de linhas de código subsequentes. */
exit;
?>
