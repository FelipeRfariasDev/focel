<?php include("conexao.php");

if($_POST){
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $sql = "select * from empresa where email='$email' and senha='$senha'";
    $res = $conn->prepare($sql);
    $res->execute();
    $retorno = $res->fetch();
    if($retorno){
        $_SESSION["empresa_id"] = $retorno['id'];
        $_SESSION["empresa_nome"] = $retorno['nome'];
        header("Location: inicio.php");
    }else{
        $_SESSION["alert-danger"] = "login e senha não foi encontrado";
        header("Location: index.php");
    }
}
