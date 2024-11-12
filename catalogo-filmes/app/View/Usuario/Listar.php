<?php

require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Usuario.php";

// Cria uma instância do modelo de Usuario
$usuarioModel = new Usuario($conn);

// Busca todos os usuários
$usuarios = $usuarioModel->findAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Cor de fundo da página e fonte */
        body {
            background-color: #222;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #e74c3c;
            margin: 20px 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        /* Estilo da tabela */
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 1.1em;
        }

        th {
            background-color: #e74c3c;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        td {
            background-color: #444;
            color: #f5f5f5;
            border-bottom: 1px solid #555;
        }

        tr:nth-child(even) td {
            background-color: #555;
        }

        tr:hover td {
            background-color: #e74c3c;
            color: #fff;
            cursor: pointer;
        }

        /* Estilo dos botões */
        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c0392b;
        }

        /* Mensagem de confirmação ou erro */
        .message {
            padding: 10px;
            background-color: #f39c12;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            margin: 20px auto;
            width: 80%;
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Estilo do formulário e campos de entrada */
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #444;
            color: white;
            border: 1px solid #555;
            border-radius: 5px;
        }

        /* Ajustes responsivos */
        @media (max-width: 768px) {
            table {
                width: 95%;
            }

            h1 {
                font-size: 2em;
            }

            td, th {
                padding: 12px;
            }
        }
    </style>
</head>
<body>

    <h1>Lista de Usuários</h1>

    <!-- Caso tenha uma mensagem de sucesso/erro -->
    <?php if (isset($_SESSION['msg'])) { ?>
        <div class="message"><?php echo $_SESSION['msg']; ?></div>
        <?php unset($_SESSION['msg']); ?>
    <?php } ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- Percorre a lista de usuários -->
            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <!-- Exibe os dados do usuário -->
                    <td><?php echo htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($usuario->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($usuario->email, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
