<?php

$nome = "Samuel Serri";
echo "<br><br>";

echo "Bem vindo ao PHP, $nome";

echo "<br><br>";

echo "Estamos na primeira aula de PHP!";

$anoNascimento = 1996;
$anoatual = 2024;
$idade = $anoatual - $anoNascimento;
echo "<br><br>";

echo "voce tem $idade anos de idade";
echo "<br><br>";

var_dump($nome);
echo "<br><br>";
var_dump($idade);


$valorlogico = true;
echo "<br><br>";

var_dump($valorlogico);
echo $valorlogico;
echo "<br><br>";

$num1 = 10;
$num2 = 7;

echo "soma = " . $num1 + $num2;
echo "<br><br>";
echo "subtração = " . $num1 - $num2;
echo "<br><br>";
echo "multiplicação = " . $num1 * $num2;
echo "<br><br>";

echo "divisão = " . $num1 / $num2;


?>