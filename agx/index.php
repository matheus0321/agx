<?php
require_once 'CLASS/Usuario.php';
$u = new Usuario();
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Agx Finaceira</title>
        <link rel="stylesheet"  href="css/estilo.css">
    </head>
    <body>
        <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Usuario">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="Acessar">
            <a href="cadastrar.php">Ainda não e inscrito?<strong>Cadastra-se</strong>
            </form>
        </div>
    <?php
        if(isset($_POST['email']))
          { 
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            
        if (!empty($email) &&!empty($senha))
          {
            $u->conectar("agx2","localhost","root","");
            if ( $u->msgErro == "")
          {
              if($u->logar($email,$senha))
          {
                  header("location: AreaPrivada.php");
          }
        else 
          {
            ?>
        <div class="msg-erro">
                  Email  ou  Senha incorretos!!    
              </div>
              <?php
              
          }
          }
        else 
          {
            ?>
        <div class="msg-erro">
              Erro:".$u->msgErro;  
        </div>
              <?php
              
          }
          }
        {
              ?>
        <div class="msg-erro">
        Preencha todos os campos!!
    </div> 
        <?php
        }
          }          
    
    
    ?>
    </body>
</html>
