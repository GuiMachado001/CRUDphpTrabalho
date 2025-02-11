<?php
require './App/Classes/Produto.php';
// $objUser = new Usuario();

if(isset($_POST['cadastrarProduto'])){

  $nome = $_POST['nome'];

  $objUser = new Produto();
  $objUser->nome = $nome;


  $res = $objUser->cadastrar();

  if($res){
    echo "<script>alert('Cadastrado com Sucesso') </script>";
  }else{
    echo "<script>alert('Erro ao Cadastrar') </script>";
  }
}


include './public/include/header.php';
include './public/include/cadastro-produto/main-cadastro-produto.php';

?>