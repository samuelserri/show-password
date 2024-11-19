<?php

// Inclui a conexão com o banco e o modelo Filme
require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Filme.php";

// Cria uma instância do modelo de Filme
$filmeModel = new Filme($conn);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];

    try {
        // Prepara a consulta SQL para inserir os dados no banco
        $query = "INSERT INTO filme (titulo, descricao, ano) VALUES (:titulo, :descricao, :ano)";
        $stmt = $conn->prepare($query);

        // Vincula os parâmetros
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':ano', $ano);

        // Executa a consulta
        if ($stmt->execute()) {
            // Redireciona para a página listar.php após o sucesso
            header('Location: listar.php');
            exit;
        } else {
            // Exibe uma mensagem de erro se a inserção falhar
            echo "Erro ao cadastrar o filme!";
        }
    } catch (Exception $e) {
        // Exibe a mensagem de erro caso haja algum problema na execução
        echo "Erro: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filme</title>
    <style>
        /* Estilos gerais do formulário */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #141414;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h4 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        main {
            width: 100%;
            max-width: 500px;
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        }

        .form-content {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
            font-weight: normal;
            color: #ddd;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            background-color: #333;
            color: white;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            box-sizing: border-box;
        }

        .action {
            width: 100%;
            padding: 12px;
            background-color: #e50914;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action:hover {
            background-color: #f40612;
        }
    </style>
</head>
<body>
    <main>
        <form class="form-header" action="cadastro.php" method="post">
            <div class="form-content">
                <h4>Cadastrar Filme</h4>
            </div>

            <div class="form-conteudo">
                <div>
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Informe o nome do filme" required>
                </div>

                <div>
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" placeholder="Informe a descrição do filme" required></textarea>
                </div>

                <div>
                    <label for="ano">Ano</label>
                    <input type="number" name="ano" id="ano" placeholder="Ano do filme" required>
                </div>
            </div>   

            <div>
                <button class="action" type="submit">Salvar</button>
            </div>
        </form>
    </main>
</body>
</html>
