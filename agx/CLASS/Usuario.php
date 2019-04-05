<?php

class Usuario {
    private $pdo;
    public $msgErro ="";//tudo ok
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host".$host,
                $usuario,$senha);
            
        } catch (PDOException $e) {
           $msgErro = $e->getMessage(); 
        }
        
    }
    public function cadastrar($nome, $telefone, $email, $senha)
     {
        global $pdo;
    //Verificar se ja tem email cadastrado
    $sql = $pdo->prepare("SELECT id_usuario FROM usuarios 
            WHERE email = :e");
    $sql->bindValue(":e",$email);
     $sql->execute();
     if ($sql->rowCount() >0)
     {
         return false;    
     }
 else {
     $sql= $pdo->prepare("INSERT INTO usuarios (nome,
            telefone,email,senha) VALUES(:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
     //caso nao, cadastrar
     }
     }
     public function logar($email, $senha)
     {
         global $pdo;
         //verificar se o email e senha esta cadastrado se sim
         $sql = $pdo->prepare("SELECT id_usuario FROM usuarios 
                 WHERE email =:e AND senha = :s ");
         $sql->bindValue(":e",$email);
         $sql->bindValue(":s", md5($senha));
         $sql->execute();
         if ($sql->rowCount() > 0)
         {
               // entre no sistema
             $dado = $sql->fetch();
             session_start();
             $_SESSION['id_usuario'] = $dado['id_usuario'];
             return true;//Logado com Sucesso
             
         }
             
         else {
             return false;//Não foi possivel Logar
         }
   
         
     }
    
            }
