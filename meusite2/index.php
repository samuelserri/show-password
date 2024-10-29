
<?php

// variaveis
$nome = "jonatan";


$nome = "jonatan samuel";
var_dump($nome);


$inteiro = 10;
var_dump($inteiro);

$float = 10.99;
var_dump($float);

$boleando = TRUE;
var_dump($boleando);


// arrays

$produtos = [
    "controle",
    "mouse",
    "chave",
    1,
    30


];

var_dump($produtos);

$produtos[1] = "Fone";

// array associativo
$produtos2 = [
    "nome" => "controle",
    "preco" => "29.99",
    "descricao" => "Controle remoto de receptor skygato"
];


var_dump($produtos2);


// array multidimencional
$produtosdaloja = [

    [
        "nome" => "monitor full hd",
        "descricao"=> "muito legal e bonito",
        "preco" => "999.80"
    ],

    [
        "nome" => "teclado descolado",
        "descricao"=> "muito legal e bonito",
        "preco" => "299.90"
    ]
];
var_dump($produtosdaloja);





?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>


    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

    <h1>Olá VARIAVEL,<?php echo $nome?>  bem vindo</h1>

    <p>array indexado</p>
    <ul>
        <li>
            <li><?php echo $produtos[0]?></li>
            <li><?php echo $produtos[1]?></li>
            <li><?php echo $produtos[2]?></li>
        </li>
    </ul>

    <p>array associativo</p>
    <ul>
        <li>
            <p>Nome: <?php echo $produtos2['nome']?> </p>
            <p>Preço: <?php echo $produtos2['descricao']?></p>
            <p>Descrição: <?php echo $produtos2['preco']?></p>
        </li>
    </ul>

    <p>array multidimensional</p>
<ul>
    <li>
        <p>Nome: <?php echo $produtosdaloja[0]['nome']; ?></p>
        <p>Descrição: <?php echo $produtosdaloja[0]['descricao']; ?></p>
        <p>Preço: <?php echo $produtosdaloja[0]['preco']; ?></p>
    </li>
    <li>
        <p>Nome: <?php echo $produtosdaloja[1]['nome']; ?></p>
        <p>Descrição: <?php echo $produtosdaloja[1]['descricao']; ?></p>
        <p>Preço: <?php echo $produtosdaloja[1]['preco']; ?></p>
    </li>
</ul>





    
    
</body>
</html>