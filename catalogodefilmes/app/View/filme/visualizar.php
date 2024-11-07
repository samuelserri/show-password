<?php 

require __DIR__ . "\..\model\Filme.php";
require __DIR__ . "\..\config\Database.php";

$id = $_GET["id"];

$filmeModel = new Filme($conn);
$filme = $filmeModel->findById($id);

$filmeModel = new Filme($id);

//print_r($filmes);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
</head>
<body>
    <h1>Filme</h1>

    <h3>Título: <?php echo $filme->titulo ?></h3>
    <p>Ano: <?php echo $filme->ano ?></p>
    <p>Descrição: <?php echo $filme->descricao ?></p>
</body>
</html>