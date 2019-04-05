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
        <div id="corpo-form-cad">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="email" maxlength="40"x>
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confimarSenha" placeholder="Confimar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        //Verificar se a pessoa clicou no botão 
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confimarSenha = addslashes($_POST['confimarSenha']);
            //Verificar se esta vazio
            if (!empty($nome) && !empty($telefone) && !empty($email)
                  && !empty($senha) && !empty($confimarSenha))
            {
                    $u->conectar("agx2","localhost","root","");
                    if ($u->msgErro == "")//Esta tudo certo
                    {
                        if ($senha == $confimarSenha){
                        if($u->cadastrar($nome, $telefone, $email, $senha))
                         {
                            ?>
        <div id="msg-sucesso">    
                            
                        Cadastrado com Sucesso: Logue;
                        </div>
                                <?php
                            }
                         else {
                             ?>
        <div class="msg-erro">     
               
           Email Ja cadastrado!!  
        </div>              
            <?php  
                             }
                    
                        }
                         else {
                             ?>
        <div class="msg-erro">            
                Senha e confimar Senha não correspodem!!
        </div>     
                    <?php
                            }
                        
                    }
                    else 
                    {
                        ?>
        <div class="msg-erro">
                        Erro:".$u->msgErro 
        </div>
                            <?php
                        }
            }else 
                {
                ?>
        <div class="msg-erro">
               Preencha todos os Campos!!  
        </div>
                   <?php
                }
       }
            ?>
    </body>
</html>
