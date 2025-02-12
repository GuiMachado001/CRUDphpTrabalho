<?php
require './App/Classes/Anotacoes.php';


if(isset($_POST['cadastrarAnotacao'])){

    $title = $_POST['title'];
    $descricao = $_POST['descricao'];

    $objUser = new Anotacoes();
  
    $objUser->title = $title;
    $objUser->descricao = $descricao;
  
    $res = $objUser->cadastrar();
  
    if($res){
      echo "<script>alert('Cadastrado com Sucesso') </script>";
    }else{
      echo "<script>alert('Erro ao Cadastrar') </script>";
    }
  }

include './public/include/header2.php';
include './public/include/cadastrar-anotacoes/cadastrar-anotacoes.php';
