<?php

require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Usuario.php";

// Verifica se o ID foi passado na URL
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("ID inválido.");
}

$usuarioModel = new Usuario($conn);

// Recupera o ID da URL
$id = $_GET["id"];

// Busca o usuário pelo ID
$usuario = $usuarioModel->findById($id);

// Verifica se o usuário foi encontrado
if (!$usuario) {
    die("Usuário não encontrado.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>

    <style>
        .details {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            width: 400px;
            background-color: #f9f9f9;
        }
        .details h3 {
            margin-bottom: 10px;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <h1>Detalhes do Usuário</h1>

    <div class="details">
        <h3>Nome:</h3>
        <p><?php echo htmlspecialchars($usuario->nome, ENT_QUOTES, 'UTF-8'); ?></p>

    </div>

    <br>
    <a href="ListarUsuarios.php">Voltar à lista de usuários</a>

</body>
</html>