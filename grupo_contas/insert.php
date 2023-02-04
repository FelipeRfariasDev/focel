<?php include ("../conexao.php");

$empresa_id = $_SESSION["empresa_id"];

$msg_error = "";

if($_POST){
    $nome = $_POST["nome"];
    $sql = "insert into grupo_contas (nome,empresa_id) values ('$nome',$empresa_id)";
    $res = $conn->prepare($sql);
    if($res->execute()){
        header("Location: /grupo_contas/select.php");
    }else{
        $msg_error = "erro ao inserir o grupo_contas SQL: ".$sql;
    }
}
include("../layout/header.php");
include("../layout/menu.php");
?>
    <h1>Grupo de Contas</h1>
    <form method="post" action="insert.php">
        <div class="mb-3">
            <label class="form-label">Nome do Grupo de Contas</label>
            <input type="text" class="form-control" name="nome" required placeholder = "Qual é o nome do Grupo de Contas?" maxlength="60">
        </div>
        <!-- erro ao inserir a função -->
        <?php if($msg_error){?>
            <div class="mb-3 row">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $msg_error;?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>

        <div class="mb-3 row">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
<?php include("../layout/footer.php");


