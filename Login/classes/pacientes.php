<?php

class paciente
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
   public function cadastrar($nome, $altura, $peso, $idade, $sangue)
    {
        global $pdo;
        //verificar se ja existe paciente cadastrado
        $sql = $pdo->prepare("SELECT id_paciente FROM pacientescad WHERE nome = :n");
        $sql->bindValue(":n",$nome);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //já esta cadastrada
        }
        else
        {
            $sql = $pdo->prepare("INSERT INTO pacientescad (nome, altura, peso, idade, sangue) VALUES (:n, :a, :p, :i, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":a",$altura);
            $sql->bindValue(":p",$peso);
            $sql->bindValue(":i",$idade);
            $sql->bindValue(":s",$sangue);
            $sql->execute();
            return true;
        }
    }
    public function procurar($nome)
    {
    }
}

?>