<?php
require './App/Classes/Anotacoes.php';

if (!isset($_GET['id_anotacoes'])) {
    die('Anotação não encontrado.');
}

$id_anotacoes = $_GET['id_anotacoes'];

$anotacao = new Anotacoes();
$anotacoes_anot = $anotacao->buscar($id_anotacoes);

if (!$anotacoes_anot) {
    die('anotacao não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['descricao'];

    $anotacao->atualizar($id_anotacoes, $title, $desc);

    header('Location: anotacoes.php');
    exit();
}


?>
    <h1>Editar anotacao</h1>
<form class="formEditarAnotacoes" action="editar-anotacao.php?id_anotacoes=<?php echo $id_anotacoes; ?>" method="POST">
    <div class="containerEditarAnotacoes">
        <label>Nome: </label>
        <input class="inputEditarAnotacoes" type="text" name="title" value="<?php echo htmlspecialchars($anotacoes_anot['title']); ?>" required><br>
    </div>    
    <div class="containerEditarAnotacoes">
        <label>Descrição: </label>
        <input class="inputEditarAnotacoes" type="text" name="descricao" value="<?php echo htmlspecialchars($anotacoes_anot['descricao']); ?>" required><br>
    </div>    

    <button class="btnEditar" type="submit">Atualizar</button>
</form>
<br>
<a href="anotacoes.php" class="voltarLista">Voltar para a anotações</a>

