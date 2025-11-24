<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title mb-3">Login</h4>

          <?php if (!empty($erro)): ?>
            <div class="alert alert-danger"><?= $erro; ?></div>
          <?php endif; ?>

          <form method="post">
            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input type="password" name="senha" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
          </form>

          <p class="mt-3 mb-0 text-center">
            Não tem conta? <a href="index.php?route=register">Cadastre-se</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
