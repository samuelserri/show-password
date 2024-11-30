<?php
// Incluir configurações e o modelo Filme
require_once '../../config/Database.php';
require_once '../../model/Filme.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Instancia o modelo de Filme
    $filmeModel = new Filme($conn);

    // Carrega os dados do filme com base no ID
    $filme = $filmeModel->findById($id);

    // Verifica se o filme foi encontrado
    if (!$filme) {
        // Caso não encontre o filme, redireciona para a lista de filmes com uma mensagem de erro
        header("Location: listar.php?mensagem=erro");
        exit;
    }
} else {
    // Se o ID não foi passado, redireciona para a lista de filmes com uma mensagem de erro
    header("Location: listar.php?mensagem=erro");
    exit;
}

// Verifica se o formulário foi enviado para atualizar o filme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    var_dump($_POST); // Para verificar se os dados estão sendo enviados corretamente

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // Atualiza os dados no modelo Filme
    $filmeModel->id = $_POST['id'];
    $filmeModel->titulo = $titulo;
    $filmeModel->descricao = $descricao;

    // Parte de imagem:
    // $imagem_url = $_POST['imagem_url'];  // imagem_url pode ser alterada, mas não será visível ao usuário
    // $filmeModel->imagem_url = $imagem_url; // Caso queira permitir a alteração da imagem, descomente essas linhas

    // Realiza a atualização no banco de dados
    if ($filmeModel->atualizar()) {
        echo "Filme atualizado com sucesso!";
        // Você pode redirecionar para a lista ou para a página do filme editado
        header("Location: listar.php?mensagem=sucesso");
        exit;
    } else {
        echo "Erro ao atualizar filme. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Estilos globais */
body {
    font-family: 'Arial', sans-serif;
    background-color: #141414; /* Cor de fundo escura, como a Netflix */
    color: #fff; /* Texto em branco para contraste */
    margin: 0;
    padding: 0;
}

/* Estilo do cabeçalho */
h1 {
    text-align: center;
    font-size: 2.5rem;
    color: #fff;
    margin-top: 30px;
    margin-bottom: 20px;
}

/* Estilo do formulário de edição */
form {
    background-color: #333; /* Fundo escuro para o formulário */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    margin: 0 auto;
    max-width: 500px;
}

label {
    font-size: 1.1rem;
    margin-bottom: 10px;
    display: block;
    color: #ddd;
}

input, textarea {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #444;
    border-radius: 6px;
    background-color: #222;
    color: #fff;
    font-size: 1rem;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #e50914; /* Cor de foco (vermelho) para seguir o estilo da Netflix */
}

button {
    padding: 12px 25px;
    background-color: #e50914; /* Cor vermelha característica da Netflix */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #f40612; /* Cor vermelha mais forte para o hover */
}

/* Estilo do link "Voltar para a Lista" */
.home-link {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    color: #fff;
    font-size: 1.1rem;
    margin-top: 20px;
    transition: color 0.3s ease;
}

.home-link:hover {
    color: #e50914; /* Cor de hover no link */
}

.home-link i {
    margin-right: 8px; /* Espaçamento entre o ícone e o texto */
}

/* Estilo do input e textarea quando estiverem desabilitados */
input:disabled, textarea:disabled {
    background-color: #444;
    color: #888;
}

/* Estilo das mensagens de erro ou sucesso */
.message {
    margin-top: 20px;
    padding: 15px;
    text-align: center;
    font-size: 1.2rem;
    border-radius: 8px;
}

.message.success {
    background-color: #2ecc71; /* Verde para sucesso */
    color: white;
}

.message.error {
    background-color: #e74c3c; /* Vermelho para erro */
    color: white;
}

    </style>
</head>
<body>

    <h1>Editar Filme</h1>
    

    <!-- Formulário de edição  obs: aqui eu to puxando apenas titulo e descricao nao exibindo o id pois define o tipo como hidden -->
    <form method="POST" action="Editar.php">
        <input type="hidden" name="id" value="<?php echo $filme->id; ?>"> <!-- hidden deixa o Campo invisível  -->

        <label for="titulo">Título do Filme:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $filme->titulo; ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" required><?php echo $filme->descricao; ?></textarea>

        <!-- Parte de imagem ( reativar):
        <label for="imagem_url">URL da Imagem:</label>
        <input type="text" id="imagem_url" name="imagem_url" value="<?php echo $filme->imagem_url; ?>" required>
        -->
        
        <button type="submit">Atualizar Filme</button>

        <!-- Link para voltar à lista de filmes -->
        <a href="listar.php" class="home-link">
            <i class="bi bi-house-door"></i> Voltar para a Lista
        </a>
    </form>

</body>
</html>
