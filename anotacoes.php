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
                    
                    <a class="editar-card" href="editar-anotacao.php?id_anotacoes=<?php echo $anotacao['id_anotacoes']; ?>">Editar</a>
                    <a class="excluir-card" href="deletar-anotacoes.php?id_anotacoes=<?php echo $anotacao['id_anotacoes']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>