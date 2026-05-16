<?php
// Configurações do banco de dados local (WampServer)
$host = "sql302.infinityfree.com";
$dbname = "if0_41819443_cadastro";
$username = "if0_41819443"; 
$password = "23c8HHEhHhf1"; 

try {
    // Cria a conexão usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erro (ótimo para debugar)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Se a conexão falhar, exibe o erro e para a execução
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>