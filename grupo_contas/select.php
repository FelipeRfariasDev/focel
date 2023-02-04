<?php include ("../conexao.php");

$empresa_id = $_SESSION["empresa_id"];

include("../layout/header.php");
include("../layout/menu.php");
?>

<h1>Grupo de Contas &nbsp; <a href="/grupo_contas/insert.php" class="btn btn-success">Novo</a></h1>

<?php
    $sql = "select * from grupo_contas where empresa_id=".$empresa_id;
    $res = $conn->prepare($sql);
    $res->execute();
    $retorno = $res->fetchAll();
    if(count($retorno)==0){
        echo "Nenhum grupo de contas cadastrado"; exit;
    }
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($retorno as $linha){?>
    <tr>
      <td><?php echo $linha["nome"];?></td>
      <td>
        <a href="atualizar.php?id=<?php echo $linha["id"];?>"><button type="button" class="btn btn-primary">Atualizar</button></a>
        <a href="delete.php?id=<?php echo $linha["id"];?>" onclick="return confirm('Tem certeza que deseja excluir?')"><button type="button" class="btn btn-danger">Excluir</button></a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>

<?php include("../layout/footer.php");