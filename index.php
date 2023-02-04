<?php
include("layout/header.php");
include("layout/inicio_h1.php");
session_start();
?>

    <form method="post" action="login.php">
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" name="nome" required placeholder = "Qual é o seu email?">
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="senha" name="nome" required placeholder = "Qual é o seu senha?">
          </div>
        </div>
        <?php include("layout/alert-msg.php");?>
        <div class="mb-3 row">
            <button type="submit" class="btn btn-success">Entrar</button>
        </div>

        <div class="mb-3 row">
            <button type="reset" class="btn btn-secondary">Limpar</button>
        </div>

        <div class="mb-3 row">
            <span class="alert alert-primary col-sm-12 d-flex justify-content-center" role="alert">
                <a href="#">Esqueci a senha</a>
            </span>
        </div>

        <div class="mb-3 row">
            <span class="alert alert-success col-sm-12 d-flex justify-content-center" role="alert">
                <a href="insert_empresa.php">Nova Empresa</a>
            </span>
        </div>
    </form>

<?php include("layout/footer.php");?>