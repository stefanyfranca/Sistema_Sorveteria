<?php
session_start(); // Iniciar a sessão antes de qualquer saída

// Conectar ao banco de dados com mysqli
$conexao = new mysqli('localhost', 'root', '', 'frangelato');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$mensagem_erro = '';

if (isset($_POST['conectar'])) {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Usar prepared statements para evitar SQL injection
    $stmt = $conexao->prepare("SELECT tipo FROM usuario WHERE cpf = ? AND senha = ?");
    $stmt->bind_param("ss", $cpf, $senha); // 'ss' significa dois parâmetros do tipo string
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 0) {
        // Se o login falhar, exibe a mensagem de erro
        $mensagem_erro = "CPF ou senha inválida...";
    } else {
        // Obter o tipo de usuário
        $usuario = $resultado->fetch_assoc();
        $tipo = $usuario['tipo'];

        // Redirecionar com base no tipo de usuário
        if ($tipo === 'administrador') {
            header("Location: screens/widgets/widgets.php");
        } else {
            header("Location: funcionarios/processo_fabricacao/main_fabricacao.php");
        }
        exit(); // Importante para evitar que o script continue após o redirecionamento
    }

    $stmt->close();
}

$conexao->close();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Usuários</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                display: flex;
                width: 100%;
                height: 100%;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            }

            .left-section {
                background-color: #6B0000;
                width: 33%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
                position: relative;
            }

            .right-section {
                background-color: #ffffff;
                width: 67%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 40px;
                position: relative;
            }

            .logo {
                position: absolute;
                left: calc(33% - 300px);
                top: 50%;
                transform: translateY(-50%);
            }

            .logo img {
                width: 550px;
                height: auto;
            }

            .right-section h2 {
                margin-bottom: 30px;
                font-size: 24px;
            }

            .form-controle {
                width: 100%;
                height: 40px;
                padding: 6px 12px;
                margin-bottom: 25px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #8D8C8C;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .btn-login {
                width: 150px;
                padding: 10px;
                background-color: #6B0000;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
            }

            .btn-login:hover {
                background-color: #440000;
            }

            .formulario {
                margin-left: 400px;
                align-items: center;
                margin-top: 50px;
                width: 40%;
                font-family: "Gill Sans", sans-serif;
                color: #8D8C8C;
            }

            label {
                font-size: 14px;
                margin-bottom: 5px;
                display: block;
            }

            .btn-container {
                text-align: center;
            }

            .error-message {
                color: red;
                font-size: 14px;
                margin-bottom: 15px;
                text-align: center;
            }
        </style>
    </head>
    <script>
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: false});
    });
    </script>
    <body>
        <div class="container">
            <div class="left-section"></div>

            <div class="right-section">
                <div class="formulario">
                    <form name="formulario" method="post" action="">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-controle" name="cpf" id="cpf" placeholder="Digite seu CPF" required>

                        <label for="senha">Senha:</label>
                        <input type="password" class="form-controle" name="senha" id="senha" placeholder="Digite sua senha" required>

                        <?php if (!empty($mensagem_erro)): ?>
                            <div class="error-message">
                                <?php echo $mensagem_erro; ?>
                            </div>
                        <?php endif; ?>

                        <div class="btn-container">
                            <input type="submit" class="btn-login" value="Conectar" id="conectar" name="conectar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="logo">
                <img src="logo.png" alt="Logo da Empresa" height="200" width="200">
            </div>
        </div>
    </body>
</html>
