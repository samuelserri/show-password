<?php

require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Filme.php";

$filmeModel = new Filme($conn);

$id = $_GET["id"];

$filme = $filmeModel->findById($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
</head>
<body>
<div class="card-visualizar">
        <!-- Título do filme -->
        <h1>Filme</h1>

        <!-- Card da imagem do filme -->
        <div class="card-image-container">
            <img src="<?php echo $filme->imagem_url; ?>" alt="<?php echo $filme->titulo; ?>" class="card-image">
        </div>

        <!-- Informações do filme -->
        <h3>Título: <?php echo $filme->titulo ?></h3>
        <p>Ano: <?php echo $filme->ano ?></p>
        <p>Descrição: <?php echo $filme->descricao ?></p>
        
        <!-- Botões com ícones e links -->
        <a href="javascript:history.back()" class="btn voltar"><i class="fas fa-arrow-left"></i> Voltar</a>
        <button class="btn favoritar">Favoritar</button>
       
    </div>
</body>
</html>