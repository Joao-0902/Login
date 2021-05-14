<?php
        session_start();
        if(!isset ($_SESSION['id_usuario'])){
        header("location: erro.php");
        exit;
    }
    require_once 'classes/usuarios.php';
    $u = new usuario
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body{
            background-image: url(imagens/fund.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            color: white;
        }
        #frm{
            position: relative;
            padding-left: 555px;
            padding-top: 200px;
        }
        .inp{
            width: 270px;
            display: block;
            padding: 10px;
            border-style: solid;
            margin-top: 5px;
            border-width: 1px;
            background-color: rgba(255, 255, 255, 0);
            border-color: #ffffff;
            border-radius: 6px;
        }
        a{
            color: white;
        }
        #btn{
            padding-top: 5px;
            width: 270px;
            border-radius: 6px;
            margin-top: 3px;
        }
        h1{
            padding-left: 30px;
            padding-bottom: 15px;
        }
        div#msgs-sc{
            width: 250px;
            margin: 10px auto;
            padding: 10px;
            background-color: rgba(50, 205, 50, 3);
            border: 1px solid rgb(34, 139, 34);
        }
        div.msgs{
            width: 250px;
            margin: 10px auto;
            padding: 10px;
            background-color: rgba(250, 128, 114, 3);
            border: 1px solid rgb(165, 42, 42);
        }
        ::-webkit-input-placeholder { /* WebKit browsers */
            color: white;
        }
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            color: white;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
            color: white;
        }
        :-ms-input-placeholder { /* Internet Explorer 10+ */
            color:white;
        }
    </style>
</head>
<body>
    <div id="frm">
            <h1>Cadastre-se</h1>
            <form method="post" id="btn">
                <input type="text" name="user" id="user" placeholder="Usuário" class="inp" maxlength="30">
                <input type="email" name="email" id="email" placeholder="Email" class="inp" maxlength="50">
                <input type="password" name="senha" id="senha" placeholder="Senha" class="inp" maxlength="15">
                <input type="password" name="csenha" id="csenha" placeholder="Confirmar Senha" class="inp" maxlength="15">
                <input type="submit" class="btn btn-primary" id="btn" value="cadastrar">
            </form>
    </div>
    <?php
    if(isset($_POST['user'])){
        $user = addslashes($_POST['user']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $csenha = addslashes($_POST['csenha']);
            if(!empty($user) && !empty($email) && !empty($senha) && !empty($csenha)){
                $u->conectar("projeto_login", "localhost","root", "");
                if($msg == ""){
                    if($senha == $csenha){
                        if($u->cadastrar($user, $email, $senha)){
                            ?>
                                <div id="msgs-sc">Cadastrado com sucesso! Acesse para entrar.</div>
                            <?php
                        }else{
                            ?>
                                <div class="msgs">Email já cadastrado !</div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="msgs">Senha e Confirmar senha não correspondem !;</div>
                        <?php
                    }
                }else{
                    ?>
                        <div class="msgs"><?php echo "Erro: ".$u->msg;?></div>
                    <?php
                }
            }else{
                ?>
                    <div class="msgs">Preencha todos os campos !</div>
                <?php
            }
    }
    ?>
</body>
</html>