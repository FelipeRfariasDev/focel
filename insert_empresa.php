<?php
include("conexao.php");
include("funcoes.php");

$alert_danger=false;

if($_POST){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cnpj = formatCnpjInsert($_POST["cnpj"]);
    $senha = md5($_POST["senha"]);

    $sql = "SELECT id FROM empresa WHERE email='$email'";
    $res = $conn->prepare("");
    if($res->execute()){
        if($res->fetch()){
            $_SESSION["alert-danger"] = "O email :".$email." já está cadastrado";
            $alert_danger=true;
        }
    }

    if($alert_danger==false){
        $sql = "SELECT id FROM empresa WHERE cnpj='$cnpj'";
        $res = $conn->prepare($sql);
        if($res->execute()){
            if($res->fetch()){
                $_SESSION["alert-danger"] = "O Cpnj :".$cnpj." já está cadastrado";
                $alert_danger=true;
            }
        }
    }

    if($alert_danger==false) {
        $sql = "INSERT INTO empresa (nome,email,cnpj,senha) VALUES ('$nome','$email','$cnpj','$senha')";
        $res = $conn->prepare($sql);
        if ($res->execute()) {
            header("Location: index.php");
        } else {
            $_SESSION["alert-danger"] = "erro ao inserir a empresa SQL: " . $sql;
        }
    }
}

include("layout/header.php");
include("layout/inicio_h1.php");

?>
    <form method="post" action="insert_empresa.php">
                    <div class="mb-3">
                        <label class="form-label">Nome da Empresa</label>
                        <input type="text" class="form-control" name="nome" minlength="10" required placeholder = "Qual é o nome da empresa?" maxlength="80">
                        <small class="form-text text-muted">
                            Esse campo deve ser preenchido entre 10 até 80 caracteres.
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder = "Qual é o seu email?" maxlength="60">
                        <small class="form-text text-muted">
                            Esse campo deve ser preenchido com até 60 caracteres.
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cpnj</label>
                        <input type="text" class="form-control" name="cnpj" title="Digite um Cpnj no formato: xx.xxx.xxx/xxx-xx" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" required placeholder = "Qual é o seu CNPJ?">
                        <small class="form-text text-muted">
                            Digite um Cpnj no formato: xx.xxx.xxx/xxx-xx
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" required placeholder = "Qual é a sua senha?">
                    </div>
                    <?php if($alert_danger==true) include("layout/alert-msg.php");?>
                    <div class="mb-3 row">
                        <button type="submit" class="btn btn-success">Cadastrar Empresa</button>
                    </div>

                    <div class="mb-3 row">
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>

            </form>
<?php include("layout/footer.php");?>
