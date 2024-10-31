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
        <tr>
          <th>Nome</th>
          <th>Email</th>
        </tr>
        <tr>
          <td><?php echo $integrantes[0]["nome"]?></td>
          <td><?php echo $integrantes[0]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[1]["nome"]?></td>
          <td><?php echo $integrantes[1]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[2]["nome"]?></td>
          <td><?php echo $integrantes[2]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[3]["nome"]?></td>
          <td><?php echo $integrantes[3]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[4]["nome"]?></td>
          <td><?php echo $integrantes[4]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[5]["nome"]?></td>
          <td><?php echo $integrantes[5]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[6]["nome"]?></td>
          <td><?php echo $integrantes[6]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[7]["nome"]?></td>
          <td><?php echo $integrantes[7]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[8]["nome"]?></td>
          <td><?php echo $integrantes[8]["email"]?></td>
        </tr>
        <tr>
          <td><?php echo $integrantes[9]["nome"]?></td>
          <td><?php echo $integrantes[9]["email"]?></td>
        </tr>
    </table>


    
</body>
</html>