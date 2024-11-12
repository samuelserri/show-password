<?php

return header("Location: app/View/Filme/Listar.php");



// Inicia a sessão
session_start();

// Verifica se há mensagens na sessão
if (isset($_SESSION['msg'])) {
    echo "<p>" . $_SESSION['msg'] . "</p>"; // Exibe a mensagem
    unset($_SESSION['msg']); // Limpa a mensagem após exibir
}

// Código que lista os filmes (continua aqui)


?>