<html>
    <head>
        <title>Login Usuarios</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
  <style type="text/css">
      body{
        margin-top: 20%;
        text-align: center;
        background-color: #C6e2e9;

      }
      
      .form-controle {
        display: block;
        width: 35%; 
        height: 60px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            margin-left: 35px;
       }
       label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
        margin-left: 35px;
        }
        .h1, h1 {
        font-size: 36px;
        margin-left: 35px;
        }
        select{
            width: 200px;
            padding: 10px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }

        select option{
            background-color: #fff;
            color: #333;
        }
    
  </style>
    </head>
    <body>
        <h2>Login do Usuario: </h2>
        <form name="formulario" method="post" action="login.php">
            <label>cpf:</label>
            <input type="text" name="cpf" id="cpf" size=20 required>
            <label>senha:</label>
            <input type="password" name="senha" id="senha" size=20 required>
            <br><br>
            <input type="submit" value="Conectar" id="conectar" name="conectar">
        </form>
    </body>
</html>

<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db("frangelato");

if (isset($_POST['conectar']))
{
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = mysql_query("select * FROM usuario where cpf='$cpf' and senha='$senha'");

    $resultado = mysql_num_rows($sql);

    if ($resultado == 0)
    {
        echo "Login ou senha invalido...";
    }
    else
    {
        session_start();
        $_SESSION['cpf'] = $cpf;
        header("Location:menucadastros.html");
    }
}
?>