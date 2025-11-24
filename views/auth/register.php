<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title mb-3">Criar conta</h4>

          <?php if (!empty($ok)): ?>
            <div class="alert alert-success">
              Cadastro realizado com sucesso! <a href="index.php?route=login">Fazer login</a>.
            </div>
          <?php endif; ?>

          <?php if (!empty($erro)): ?>
            <div class="alert alert-danger"><?= $erro; ?></div>
          <?php endif; ?>

          <form method="post">
            <div class="mb-3">
              <label class="form-label">Nome</label>
              <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input type="password" name="senha" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
