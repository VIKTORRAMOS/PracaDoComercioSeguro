<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Comércio Seguro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* ==================== ESTILIZAÇÃO CSS ==================== */
        :root {
            /* Variáveis Globais de Cores: Centraliza a paleta de cores para facilitar manutenção e consistência */
            --primary-color: #1e3a8a; /* Azul Marinho Segurança: Identidade visual principal */
            --secondary-color: #2563eb;
            --accent-color: #10b981; /* Verde Sucesso: Usado para ações positivas (botão enviar) */
            --bg-color: #f1f5f9;
            --text-dark: #1e293b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            /* Efeito de Fundo: Cria um padrão sutil de pontos (grid) usando gradiente radial */
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 20px 20px;
            /* Alinhamento Central: Flexbox garante o formulário perfeitamente centralizado na tela */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* Linha Temática Superior: Reforça a cor principal do sistema no topo do card */
            border-top: 8px solid var(--primary-color);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 24px;
            color: var(--primary-color);
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header p {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 14px;
        }

        /* Container de Input com Ícone: Permite o posicionamento absoluto do ícone dentro do campo */
        .input-wrapper {
            position: relative;
        }

        /* Posicionamento do Ícone: Fixado à esquerda, centralizado verticalmente no campo */
        .input-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        /* Estilização Geral dos Campos: padding-left de 40px evita que o texto sobreponha o ícone */
        input, select, textarea {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            box-sizing: border-box;
            font-family: inherit;
        }

        /* Ajuste do Campo de Texto Longo: Remove a necessidade do ícone lateral esquerdo */
        textarea {
            padding-left: 15px;
            resize: vertical;
            min-height: 100px;
        }

        /* Feedback Visual de Foco: Realça o campo ativo mudando a cor da borda e aplicando sombra suave */
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Botões de Ação */
        .btn-submit {
            width: 100%;
            background-color: var(--accent-color);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background-color: #059669;
        }

        .admin-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-admin {
            background-color: #64748b;
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-admin:hover {
            background-color: var(--text-dark);
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <i class="fas fa-shield-halved"></i>
        <h1>Comércio Seguro</h1>
        <p>Relate ocorrências e ajude a proteger nossa região</p>
    </div>

    <form action="processa.php" method="POST">
        <div class="form-group">
            <label>Nome Completo:</label>
            <div class="input-wrapper">
                <i class="fas fa-user"></i>
                <input type="text" name="nome" placeholder="Ex: João Silva" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="form-group">
                <label>CPF:</label>
                <div class="input-wrapper">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="cpf" placeholder="000.000.000-00" required>
                </div>
            </div>
            <div class="form-group">
                <label>Contato:</label>
                <div class="input-wrapper">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="contato" placeholder="(99) 99999-9999" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Tipo de Ocorrência:</label>
            <div class="input-wrapper">
                <i class="fas fa-triangle-exclamation"></i>
                <select name="problema" required>
                    <option value="" disabled selected>Selecione o tipo...</option>
                    <option value="F">🚨 Furto / Roubo</option>
                    <option value="L">💡 Problemas com Iluminação</option>
                    <option value="O">⚠️ Outras Ocorrências</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Descrição Detalhada:</label>
            <textarea name="descricao" placeholder="Descreva o que aconteceu com o máximo de detalhes possível..."></textarea>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-paper-plane"></i> Enviar Relato
        </button>
    </form>

    <div class="admin-link">
        <a href="dashboard.php" class="btn-admin">
            <i class="fas fa-lock"></i> Acesso Restrito (Admin)
        </a>
    </div>

    <p class="footer-text">&copy; 2026 Portal Comércio Seguro - Vigilância Colaborativa</p>
</div>

</body>
</html>
