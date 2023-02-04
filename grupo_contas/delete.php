<?php include ("../conexao.php");

$id = $_GET["id"];
$sql = "delete from grupo_contas where id = ".$id;
$res = $conn->prepare($sql);
if($res->execute()){
    header("Location: /grupo_contas/select.php");
}else{
    echo "erro excluir o grupo de contas SQL: ".$sql;
}