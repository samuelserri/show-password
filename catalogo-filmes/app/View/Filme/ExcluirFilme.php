<?php
// Inicia a sessão para exibir mensagens de sucesso ou erro
session_start();

// Verifica se o ID foi passado via POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Verifica se o ID é válido
    if (!is_numeric($id)) {
        echo "ID inválido!";
        exit;
    }

    // Conexão com o banco de dados
    require __DIR__ . "\..\..\Config\Database.php";
    require __DIR__ . "\..\..\Model\Filme.php";

    // Instancia o modelo de Filme
    $filmeModel = new Filme($conn);

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

    // Redireciona para a lista de filmes após excluir
    header("Location: ../index.php"); // Aqui subimos um nível e acessamos o index.php
    exit;
} else {
    echo "ID não fornecido!";
    exit;
}
