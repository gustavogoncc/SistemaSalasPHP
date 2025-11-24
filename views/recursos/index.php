<div class="container">
  <h3 class="mb-4">Salas e recursos disponíveis</h3>

  <div class="row">
    <?php foreach ($recursos as $r): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <img src="public/img/sala.png" class="card-img-top" alt="Recurso">
          <div class="card-body">
            <h5 class="card-title fw-bold"><?= htmlspecialchars($r['nome']); ?></h5>
            <p class="text-muted mb-1"><?= ucfirst($r['tipo']); ?></p>
            <?php if ($r['capacidade']): ?>
              <p class="small">Capacidade: <?= (int)$r['capacidade']; ?> pessoas</p>
            <?php endif; ?>
            <p class="card-text">
              <?= nl2br(htmlspecialchars($r['descricao'])); ?>
            </p>
            <a href="index.php?route=horarios&id=<?= $r['id']; ?>" class="btn btn-primary w-100">
              Ver dias e horários
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
