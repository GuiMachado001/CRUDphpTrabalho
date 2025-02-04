<?php
require './App/Classes/Usuario.php';
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
      echo "<script>alert('Erro ao Cadastrar') </script>";
    }
  }



include './public/include/header.php';
include './public/include/background.php';
include './public/include/cadastro-usuario/main-cadastro.php';
?>


