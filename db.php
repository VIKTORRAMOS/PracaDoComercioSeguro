<?php
// Configurações do banco de dados (InfinityFree.)
/* Diretrizes de Conexão: Define as credenciais de acesso ao servidor MySQL hospedado no InfinityFree.
   Nota de Segurança: Recomenda-se mover esses dados para um arquivo .env em ambientes produtivos. 
$host = "sql302.infinityfree.com";
$dbname = "if0_41819443_cadastro";
$username = "if0_41819443"; 
$password = "23c8HHEhHhf1"; */

// Configurações do banco de dados local (WampServer)
$host = "localhost";
$dbname = "cadastro";
$username = "root"; 
$password = ""; 

try {
    // Cria a conexão usando PDO
    /* Instanciação do Objeto PDO: Define o Data Source Name (DSN) especificando o driver (mysql), 
       o endereço do servidor, o nome do banco de dados e a codificação de caracteres UTF-8. */
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erro (ótimo para debugar)
    /* Modo de Erros (ERRMODE_EXCEPTION): Altera o comportamento padrão do PDO para que ele jogue 
       exceções (PDOException) capturáveis pelo bloco try/catch em vez de falhar silenciosamente. */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Se a conexão falhar, exibe o erro e para a execução
    /* Tratamento Crítico de Erros: Interrompe imediatamente o script PHP por meio da função die().
       Exibe a mensagem de falha gerada pela API do banco de dados para auxiliar no diagnóstico. */
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>
