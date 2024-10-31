<?php

$integrantes = [

    ["nome" => "jonatan",
    "email" => "timao@gmail.com"],

    ["nome" => "carlos",
    "email" => "carlos@gmail.com"],

    ["nome" => "jose",
    "email" => "jose@gmail.com"],

    ["nome" => "rodrigo",
    "email" => "rodrigo@gmail.com"],

    ["nome" => "henrique",
    "email" => "henriqueo@gmail.com"],

    ["nome" => "xavier",
    "email" => "xavier@gmail.com"],

    ["nome" => "mateus",
    "email" => "mateus@gmail.com"],

    ["nome" => "sambegara",
    "email" => "sambegara@gmail.com"],

    ["nome" => "lucas",
    "email" => "lucas@gmail.com"],

    ["nome" => "thiago",
    "email" => "thiago@gmail.com"]


];


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alunos do Curso</title>
    
</head>
<body>
    <h1>Integrantes da Turma 146</h1>

    <table>
    <table>
    <?php foreach ($integrantes as $integrante) { ?>
    <tr>
          <td><?php echo $integrante["nome"]?></td>
          <td><?php echo $integrante["email"]?></td>
    
    </tr>
    <?php } ?>



    </table>


    
</body>
</html>