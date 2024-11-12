<?php

// Inicia a sessão para exibir mensagens de sucesso ou erro
session_start();

// Conexão com o banco de dados e inclusão do modelo de Filme
require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Filme.php";

// Instancia o modelo de Filme
$filmeModel = new Filme($conn);

// Verifica se foi enviado um pedido de exclusão
if (isset($_POST['excluir_id'])) {
    $id = $_POST['excluir_id'];

    // Verifica se o ID é válido
    if (!is_numeric($id)) {
        echo "ID inválido!";
        exit;
    }

    // Tenta excluir o filme
    try {
        // Prepara a consulta para excluir o filme
        $stmt = $conn->prepare("DELETE FROM filme WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a exclusão
        $stmt->execute();

        // Verifica se o filme foi excluído
        if ($stmt->rowCount() > 0) {
            $_SESSION['msg'] = 'Filme excluído com sucesso!';
        } else {
            $_SESSION['msg'] = 'Nenhum filme encontrado com o ID fornecido.';
        }

    } catch (Exception $e) {
        $_SESSION['msg'] = 'Erro ao excluir filme: ' . $e->getMessage();
    }
}

// Busca todos os filmes
$filmes = $filmeModel->findAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .message {
            padding: 10px;
            background-color: #e0f7fa;
            color: #00796b;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #00796b;
            font-size: 1.1em;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-radius: 5px;
        }

        th {
            background-color: #3498db;
            color: white;
            font-size: 1.1em;
        }

        td {
            background-color: #ffffff;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        /* Efeito hover nas linhas da tabela */
        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        /* Caixa de mensagens */
        .alert {
            padding: 10px;
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #d6e9c6;
            text-align: center;
        }

        /* Alinhamento do formulário */
        form {
            display: inline-block;
        }

        /* Estilo para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
            text-align: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        /* Ajuste para telas menores */
        @media (max-width: 768px) {
            table {
                font-size: 0.9em;
            }

            th, td {
                padding: 10px;
            }

            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>

    <h1>Lista de Filmes</h1>

    <!-- Exibe mensagem de sucesso ou erro -->
    <?php if (isset($_SESSION['msg'])) { ?>
        <div class="message"><?php echo $_SESSION['msg']; ?></div>
        <?php unset($_SESSION['msg']); // Limpa a mensagem após exibir ?>
    <?php } ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ano</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <!-- Percorre a lista de filmes e exibe cada um -->
            <?php foreach ($filmes as $filme) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($filme->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($filme->titulo, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($filme->ano, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($filme->descricao, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <!-- Formulário para excluir o filme -->
                        <form action="listar.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                            <input type="hidden" name="excluir_id" value="<?php echo $filme->id; ?>">
                            <button type="submit">Excluir</button>
                        </form>
                        <!-- Botão para abrir o modal de detalhes -->
                        <button onclick="openModal('<?php echo htmlspecialchars($filme->descricao, ENT_QUOTES, 'UTF-8'); ?>')">Detalhes</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Descrição do Filme</h2>
            <p id="descricaoFilme"></p>
        </div>
    </div>

    <script>
        // Função para abrir o modal e preencher a descrição do filme
        function openModal(descricao) {
            document.getElementById("descricaoFilme").innerText = descricao;
            document.getElementById("myModal").style.display = "block";
        }

        // Fechar o modal
        document.querySelector(".close").onclick = function() {
            document.getElementById("myModal").style.display = "none";
        }

        // Fechar o modal se o usuário clicar fora da janela
        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                document.getElementById("myModal").style.display = "none";
            }
        }
    </script>

</body>
</html>
