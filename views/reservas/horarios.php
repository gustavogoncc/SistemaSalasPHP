<div class="container">
  <h3 class="mb-3">Horários – <?= htmlspecialchars($recurso['nome']); ?></h3>

  <form method="get" class="row g-3 mb-4">
    <input type="hidden" name="route" value="horarios">
    <input type="hidden" name="id" value="<?= $recurso['id']; ?>">
    <div class="col-auto">
      <label class="col-form-label">Data:</label>
    </div>
    <div class="col-auto">
      <input type="date" name="data" class="form-control" value="<?= htmlspecialchars($data); ?>" required>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-secondary">Buscar</button>
    </div>
  </form>

  <div class="row g-3">
    <?php for ($h = 8; $h < 18; $h++): ?>
      <?php
        $inicio = sprintf('%02d:00:00', $h);
        $fim    = sprintf('%02d:00:00', $h+1);
        $dispo  = Reserva::horarioDisponivel($pdo, $recurso['id'], $data, $inicio, $fim);
      ?>
      <div class="col-md-3">
        <div class="card text-center p-3 <?= $dispo ? 'border-success' : 'border-danger'; ?>">
          <h6><?= substr($inicio,0,5); ?> - <?= substr($fim,0,5); ?></h6>

          <?php if ($dispo): ?>
            <span class="badge bg-success mb-2">Disponível</span>
            <?php if (isset($_SESSION['user_id'])): ?>
              <a href="index.php?route=reservar&recurso_id=<?= $recurso['id']; ?>&data=<?= $data; ?>&inicio=<?= $inicio; ?>&fim=<?= $fim; ?>"
                 class="btn btn-primary btn-sm">
                 Reservar
              </a>
            <?php else: ?>
              <small>Faça login para reservar.</small>
            <?php endif; ?>
          <?php else: ?>
            <span class="badge bg-danger">Indisponível</span>
          <?php endif; ?>
        </div>
      </div>
    <?php endfor; ?>
  </div>
</div>
