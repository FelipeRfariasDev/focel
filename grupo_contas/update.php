<?php include ("../conexao.php");

$id = $_POST["id"];
$nome = $_POST["nome"];

$sql = "update grupo_contas set nome='$nome' where id=".$id;
$res = $conn->prepare($sql);
if($res->execute()){
    header("Location: /grupo_contas/select.php");
}else{
    $msg_error = "erro ao atualizar o grupo_contas SQL: ".$sql;
}