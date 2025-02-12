<?php
require './App/Classes/Anotacoes.php';

$anotacoes = new Anotacoes();
$anotacoesListadas = $anotacoes->listar();


include './public/include/header2.php';
// include 'public/include/anotacoes/anotacoes.php';
?>


<div class="containerCards">
    <div class="containerCadastrarAnotacoes">
        <a href="./cadastrar-anotacao.php" class="novaAnotacao">Nova Anotação <i class="fa-solid fa-file"></i></a>
    </div>
    <div class="tituloAnotacoes">
        <h2>Minhas Anotações</h2>
    </div>

    <div class="mainCard">
        <?php foreach ($anotacoesListadas as $anotacao) { ?>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $anotacao['title']; ?></h2> 
                    <p class="card-text"><?php echo $anotacao['descricao']; ?></p> 
                    
                    <a href="editar-produto.php?id_produto=<?php echo $produtos['id_descricao']; ?>">Editar</a>
                    <a href="deletar-produto.php?id_produto=<?php echo $produtos['id_descricao']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>