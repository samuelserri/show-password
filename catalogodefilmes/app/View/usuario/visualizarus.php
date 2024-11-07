<?php 

require __DIR__ . "\..\model\usuario.php";
require __DIR__ . "\..\config\Database.php";

$id = $_GET["id"];

$usuarioModel = new Usuario($conn);
$usuario = $usuarioModel->findById($id);

$usuarioModel = new Usuario($id);

//print_r($filmes);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuario</h1>

    <h3>Título: <?php echo $usuario->id ?></h3>
    <p>Ano: <?php echo $usuario->nome ?></p>
 
</body>
</html>