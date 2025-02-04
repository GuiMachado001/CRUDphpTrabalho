<?php
require 'App/Classes/Usuario.php';


if(isset($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $objUser = new Usuario();

    if($objUser->logar($email, $senha)){
        header("location: areaprivada.php");
    }else{
        echo "erro";
    }
}


include './public/include/header.php';
include './public/include/background.php';
?>



    


    <div class="containerDelimiterLogin">

    <div class="containerLogin">
        <form method="POST" class="formLogarUsuario">
            
            <div class="containerEmail">
                <label for="email">Email</label>
                <input type="email" class="inputEmail" name="email">
            </div>
            
            <div class="containerSenha">
                <label for="senha">Senha</label>
                <input type="password" class="inputSenha" name="senha">
            </div>
            
            <div class="containerButton">
                <button type="reset" class="btnCancel">Cancelar</button>
                <button type="submit" class="btnLogin">Logar</button>
            </div>
            <a href="./cadastrar.php" class="logar">cadastrar-se</a>
            
        </form>
    </div>
</div>


</body>
</html>
