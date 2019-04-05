  <?php
         session_start();
         if (!isset($_SESSION ['id_usuario']))
         {
             header("location : index.php");
             exit;
         }
         ?>
<html>
    <head>
       <meta charset="UTF-8">
        <title>Adiministrador</title>
        <link rel="stylesheet"  href="css/estilo.css">
    </head>
    <body>
        <div id="corpo-form">
    <h1>Seja Bem Vindo!!!
    </h1>
        </div>
    </body>
</html>
