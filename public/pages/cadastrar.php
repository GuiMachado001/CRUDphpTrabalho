<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);



  require '../../App/Classes/Usuario.php';

  // $objUser = new Usuario();

  if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];


    $objUser = new Usuario();

    $objUser->nome = $nome;
    $objUser->senha = password_hash($senha, PASSWORD_DEFAULT);
    $objUser->email = $email;

    $res = $objUser->cadastrar();

    if($res){
      echo "<script>alert('Cadastrado com Sucesso') </script>";
    }else{
        echo "<script>alert('Erro ao cadastrar, por favor tente novamente.');</script>";

    }
  }

include '../includes/index/header.php';
include '../includes/index/background.php';
// include '../includes/cadastrar/cadastro.php';



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/login/style.css">
    <link rel="stylesheet" href="../css/cadastrar/style.css">

    <div class="containerDelimiterLogin">

    <div class="containerLogin">
        <form method="POST">
            
            <div class="containerNome">
                <label for="nome">Nome</label>
                <input type="text" class="inputSenha" name="nome">
            </div>
            
            <div class="containerEmail">
                <label for="email">Email</label>
                <input type="email" class="inputEmail" name="email">
            </div>
            
            <div class="containerSenha">
                <label for="senha">Senha</label>
                <input type="password" class="inputSenha" name="senha">
            </div>
            
            <div class="containerButton">
                <!-- <button type="reset" class="btnCancel">Cancelar</button> -->
                <button type="submit" class="btnLogin">Cadastrar</button>
            </div>
            <a href="public/pages/cadastrar.php" class="logar">Logar</a>
            
        </form>
    </div>
</div>


</body>
</html>