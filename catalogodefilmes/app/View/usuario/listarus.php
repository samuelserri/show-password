<?php 

require __DIR__ . "\..\model\usuario.php";

require __DIR__ . "\..\config\Database.php";

$usuarioModel = new Usuario($conn);
$usuario = $usuarioModel->findAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <style>
        .table {
            tr, td, th {
                border: 1px solid;
            }
        }
    </style>
</head>
<body>
    <table border="1">
        <tbody>
            <!-- percorre a lista de resultados -->
            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <!-- escreve na tabela cada item retornado -->
                    <td><?php echo $usuario->id ?></td>
                    <td><?php echo $usuario->nome ?></td>
                   
                    <td>
                        <form action="Visualizar.php" method="GET">
                            <input 
                            type="hidden" 
                            name="id" 
                            value= "<?php echo $usuarios->nome?>">
                            <button>Detalhes</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>