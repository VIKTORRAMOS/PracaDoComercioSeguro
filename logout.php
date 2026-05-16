<?php
session_start();
session_unset();
session_destroy();

// Redireciona diretamente para o formulário
header("Location: index.php");
exit;
?>