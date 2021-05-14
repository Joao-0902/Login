<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
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
            margin-top: 5px;
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
            margin-top: 300px;
        }
        input{
            color: white;
        }
        #erro1{
            margin-left: 92px;
        }
        #erro2{
            margin-left: 15px;
        }
        #lk{
            margin-left: 100px;
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
    <div class="msgs">
        <p id="erro1">Erro!</p>
        <p id="erro2">Entre com Usuário e senha!</p>
        <a href="sair.php" id="lk">Sair</a>
    </div>
</body>
</html>