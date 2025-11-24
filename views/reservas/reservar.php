<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title mb-3">Confirmar reserva</h4>

          <?php if (!empty($erro)): ?>
            <div class="alert alert-danger"><?= $erro; ?></div>
          <?php endif; ?>

          <p><strong>Recurso:</strong> <?= htmlspecialchars($recurso['nome']); ?></p>
          <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($data)); ?></p>
          <p><strong>Horário:</strong> <?= substr($inicio,0,5); ?> - <?= substr($fim,0,5); ?></p>

          <form method="post">
            <button type="submit" class="btn btn-success">Confirmar reserva</button>
            <a href="index.php?route=horarios&id=<?= $recurso_id; ?>&data=<?= $data; ?>" class="btn btn-secondary">
              Voltar
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
