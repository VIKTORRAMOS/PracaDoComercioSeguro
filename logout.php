<?php
// Gerenciamento de Sessão: Inicializa ou recupera a sessão ativa do usuário no servidor
session_start();
// Limpeza de Variáveis: Remove todas as variáveis globais de sessão atualmente registradas na memória
session_unset();
// Destruição do Arquivo de Sessão: Elimina definitivamente os dados associados à sessão no servidor
session_destroy();

// Redireciona diretamente para o formulário
/* Redirecionamento HTTP: Envia um cabeçalho de resposta para o navegador, 
   forçando o usuário a retornar à página principal (index.php) após sair do painel. */
header("Location: index.php");
/* Encerramento do Script: Interrompe imediatamente o processamento do PHP, 
   garantindo que nenhuma instrução adicional seja executada após o redirecionamento. */
exit;
?>
