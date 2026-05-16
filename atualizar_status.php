<?php
session_start();
require 'db.php';

// Proteção extra: só atualiza se estiver logado
if (!isset($_SESSION['logado'])) {
    die("Acesso negado.");
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $novo_status = $_GET['status'];

    $sql = "UPDATE cidadao SET status = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$novo_status, $id]);
}

header("Location: dashboard.php");
exit;
?>