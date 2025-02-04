<?php
  require '../../App/Classes/Usuario.php';

  // $objUser = new Usuario();

  if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $perfil = $_POST['perfil'];


    $objUser = new Usuario();

    $objUser->nome = $nome;
    $objUser->cpf = $cpf;
    $objUser->senha = password_hash($senha, PASSWORD_DEFAULT);
    $objUser->email = $email;
    $objUser->id_perfil = $perfil;

    $res = $objUser->cadastrar();

    if($res){
      echo "<script>alert('Cadastrado com Sucesso') </script>";
    }else{
      echo "<script>alert('Erro ao Cadastrar') </script>";
    }
  }

// include '../includes/cadastrar/cadastro.php';



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parzival's</title>

    <link rel="stylesheet" href="../css/cadastrar/style.css">
    <link rel="stylesheet" href="../css/login/background.css">
    <link rel="stylesheet" href="../css/login/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <i class="fa-solid fa-shop"> Parzival's Supermarket</i>
        
        <nav class="nav-bar">
            <ul class="nav-list">
                <li class="navItem active"><a href="">Produtos</a></li>
                <li class="navItem active"><a href=""></a></li>
            </ul>
        </nav>
    </header>

    
<div class="containerBackground">
        <div class="containerImgLogin">
            <img src="public/img/tl.webp" alt="">
        </div>
    </div>

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