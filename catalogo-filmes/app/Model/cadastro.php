<?php
// Iniciar a sessão (caso você queira fazer alguma verificação de login ou mensagens de erro)
session_start();

// Incluir o arquivo de conexão com o banco de dados (separado para melhor organização)
require_once 'Database.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Coletar os dados do formulário
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $ano = (int) $_POST['ano'];

    // Validar os dados (simples validação)
    if (empty($titulo) || empty($descricao) || empty($ano)) {
        $_SESSION['erro'] = 'Todos os campos são obrigatórios!';
        header('Location: cadastro.html');  // Voltar para o formulário em caso de erro
        exit;
    }

    try {
        // Configurar os parâmetros de conexão com o banco
        $database = new Database('localhost', 3306, 'root', '', 'filmesdb');
        $conn = $database->createConnection();

        // Preparar a consulta SQL para inserir os dados
        $sql = "INSERT INTO filmes (titulo, descricao, ano) VALUES (:titulo, :descricao, :ano)";
        $stmt = $conn->prepare($sql);

        // Vincular os parâmetros
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':ano', $ano);

        // Executar a consulta
        if ($stmt->execute()) {
            // Inserção bem-sucedida, redireciona para uma página de sucesso ou exibe mensagem
            $_SESSION['sucesso'] = 'Filme cadastrado com sucesso!';
            header('Location: cadastro.html');  // Ou você pode redirecionar para uma página de confirmação
            exit;
        } else {
            // Caso a execução falhe
            $_SESSION['erro'] = 'Erro ao cadastrar o filme. Tente novamente!';
            header('Location: cadastro.html');
            exit;
        }

    } catch (PDOException $e) {
        // Caso haja erro na conexão com o banco de dados
        $_SESSION['erro'] = 'Erro de conexão: ' . $e->getMessage();
        header('Location: cadastro.html');
        exit;
    }
}
?>
