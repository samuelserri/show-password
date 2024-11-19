<?php
session_start();
require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Filme.php";

// Conexão com o banco de dados e instância do modelo
$filmeModel = new Filme($conn);

// Busca todos os filmes do banco de dados
$filmes = $filmeModel->findAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #141414; /* Fundo escuro */
            color: #fff;
            padding: 0;
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
            color: white;
            margin-top: 20px;
        }

        /* Estilo da mensagem de sucesso/erro */
        .message {
            padding: 15px;
            background-color: #333;
            color: #e74c3c;
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
            font-size: 1.2em;
        }

        .message.success {
            background-color: #2ecc71;
            color: #fff;
        }

        .message.error {
            background-color: #e74c3c;
            color: #fff;
        }

        /* Contêiner de filmes (grid de filmes) */
        .movies-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-items: center;
        }

        /* Estilo de cada item de filme */
        .movie-card {
            background-color: #333;
            padding: 15px;
            border-radius: 10px;
            width: 200px;
            transition: transform 0.3s ease-in-out;
        }

        .movie-card:hover {
            transform: scale(1.05);
        }

        .movie-card img {
            width: 100%;
            border-radius: 10px;
            height: 300px;
            object-fit: cover;
        }

        .movie-card h3 {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        .movie-card p {
            font-size: 0.9rem;
            color: #bbb;
            margin-bottom: 10px;
        }

        .movie-card .year {
            font-size: 1rem;
            color: #777;
        }

        /* Botões */
        .button {
            padding: 10px 20px;
            background-color: #e50914;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #f40612;
        }

        .button:focus {
            outline: none;
        }

        /* Estilo do botão de cadastrar novo filme */
        .add-movie-btn {
            margin-top: 20px;
            text-align: center;
        }

        .add-movie-btn a {
            text-decoration: none;
        }

        .add-movie-btn button {
            background-color: #2ecc71;
            font-size: 1.1rem;
            padding: 12px 25px;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .add-movie-btn button:hover {
            background-color: #27ae60;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            padding-top: 60px;
            text-align: center;
        }

        .modal-content {
            background-color: #222;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            color: #fff;
        }

        .close {
            color: #bbb;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #fff;
            text-decoration: none;
        }

    </style>
</head>
<body>

    <h1>Lista de Filmes</h1>

    <!-- Exibe mensagem de sucesso ou erro -->
    <?php if (isset($_SESSION['msg'])) { ?>
        <div class="message <?php echo strpos($_SESSION['msg'], 'sucesso') !== false ? 'success' : 'error'; ?>">
            <?php echo $_SESSION['msg']; ?>
        </div>
        <?php unset($_SESSION['msg']); ?>
    <?php } ?>

    <!-- Container de filmes -->
    <div class="movies-container">
        <!-- Loop pelos filmes -->
        <?php foreach ($filmes as $filme) { ?>
            <div class="movie-card">
                <img src="https://via.placeholder.com/200x300.png?text=<?php echo urlencode($filme->titulo); ?>" alt="<?php echo htmlspecialchars($filme->titulo, ENT_QUOTES, 'UTF-8'); ?>">
                <h3><?php echo htmlspecialchars($filme->titulo, ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars($filme->descricao, ENT_QUOTES, 'UTF-8'); ?></p>
                <p class="year"><?php echo htmlspecialchars($filme->ano, ENT_QUOTES, 'UTF-8'); ?></p>
                <div>
                    <!-- Formulário de exclusão do filme -->
                    <form action="ExcluirFilme.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                        <input type="hidden" name="id" value="<?php echo $filme->id; ?>">
                        <button type="submit" class="button">Excluir</button>
                    </form>
                    <!-- Botão de detalhes -->
                    <button onclick="openModal('<?php echo htmlspecialchars($filme->descricao, ENT_QUOTES, 'UTF-8'); ?>')" class="button">Detalhes</button>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Botão para cadastrar novo filme -->
    <div class="add-movie-btn">
        <a href="cadastro.php">
            <button>Cadastrar Novo Filme</button>
        </a>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Descrição do Filme</h2>
            <p id="descricaoFilme"></p>
        </div>
    </div>

    <!-- Script do Modal -->
    <script>
        // Função para abrir o modal de detalhes
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
