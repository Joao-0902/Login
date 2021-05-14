<?php

class usuario
{
    private $pdo;
    public $msg = "";

    public function conectar($nome, $host, $usuario, $senha)//conectar ao banco de dados
    {
        global $pdo;
        global $msg;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            $msg = $e ->getMessage();
        }
    }
    
    public function cadastrar($usuario, $email, $senha)
    {
        global $pdo;
        //verificar se ja existe email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //já esta cadastrada
        }
        else
        {
            $sql = $pdo->prepare("INSERT INTO usuarios (usuario, email, senha) VALUES (:u, :e, :s)");
            $sql->bindValue(":u",$usuario);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }
    
    public function logar($email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario From usuarios where email = :e and senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            //entrar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;//logado com sucesso
        }else{
            return false;//não foi possivel logar
        }
    }

}
?>