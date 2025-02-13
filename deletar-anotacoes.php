<?php
require './App/Classes/Anotacoes.php';
// require './App/DB/Database.php';

if (!isset($_GET['id_anotacoes'])) {
    die('Anotação não encontrado.');
}

$id_anotacoes = $_GET['id_anotacoes'];

// Verifica se o id do produto é válido antes de tentar deletar
if (is_numeric($id_anotacoes)) {
    $anotacao = new Anotacoes();
    $anotacao->deletar($id_anotacoes);

    // Redireciona de volta à área privada ou à página de listagem
    header('Location: anotacoes.php');
    exit();
} else {
    die('ID inválido.');
}
