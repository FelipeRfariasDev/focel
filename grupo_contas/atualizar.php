<?php include ("../conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM grupo_contas where id=".$id;
$res = $conn->prepare($sql);
$res->execute();
$grupo_contas = $res->fetch();

include("../layout/header.php");

?>
<h1>Grupo de Contas Atualizar</h1>
  <form method="post" action="update.php">
    <input type="hidden" name="id" value="<?php echo $grupo_contas["id"]?>">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" class="form-control" name="nome" required value="<?php echo $grupo_contas["nome"]?>">
    </div>
    <div class="mb-3 row">
        <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
  </form>
<?php include("../layout/footer.php");