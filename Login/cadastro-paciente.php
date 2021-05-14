<?php
    session_start();
        if(!isset ($_SESSION['id_usuario'])){
        header("location: erro.php");
        exit;
    }
    require_once 'classes/pacientes.php';
    $c = new paciente();
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
            margin: auto;
            margin-left: 525px;
            margin-top: 125px;
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
        input{
            color: white;
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
    <h1>Cadastrar Paciente</h1>
    <div id="frm">
            <form method="post" id="btn">
                <input type="text" name="paciente" id="paciente" placeholder="Paciente" class="inp" maxlength="30">
                <input type="text" name="altura" id="altura" placeholder="Altura" class="inp" maxlength="4">
                <input type="text" name="peso" id="peso" placeholder="Peso" class="inp" maxlength="3">
                <input type="text" name="idade" id="idade" placeholder="Idade" class="inp" maxlength="3">
                <input type="text" name="ts" id="ts" placeholder="Tipo Sanguíneo" class="inp" maxlength="3">
                <input type="submit" class="btn btn-primary" id="btn" value="cadastrar">
                <a href="login.php" class="btn btn-primary" id="btn">Voltar</a>
            </form>
    </div>
<?php
if(isset($_POST['paciente'])){
    $paciente = addslashes($_POST['paciente']);
    $altura = addslashes($_POST['altura']);
    $peso = addslashes($_POST['peso']);
    $idade = addslashes($_POST['idade']);
    $sangue = addslashes($_POST['ts']);
        if(!empty($paciente) && !empty($altura) && !empty($peso) && !empty($idade) && !empty($sangue)){
            $c->conectar("pacientes", "localhost", "root", "");
            if($msg == ""){
                if($c->cadastrar($paciente, $altura, $peso, $idade, $sangue)){
                    ?>
                        <div id="msgs-sc">Cadastrado com sucesso!</div>
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