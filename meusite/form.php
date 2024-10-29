<?php


$nome = $_POST['nome'];
$descricao = $_POST["descricao"];
$preco =(float) $_POST["preco"];
$valido = TRUE;


var_dump($preco < 10);

if ($preco < 10) {
    $valido = FALSE;

}

if (!$valido) {
    echo "<h2 style=\"color: red;\">Produto invalido</h2>";
    exit;
}




?>

<h1>produto</h1>



<div style="color: red;">

<p>
    Nome do produto; <?php echo $nome ?>
</p>

<p>
    Descrição do produto; <?php echo $descricao ?>

</p>

<p>
    Preço do produto; <?php echo "R$" . $preco ?>
</p>
</div>