<div class="container">
  <h3 class="mb-3">Minhas reservas</h3>

  <?php if (empty($reservas)): ?>
    <div class="alert alert-info">Você ainda não possui reservas.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Recurso</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reservas as $r): ?>
            <tr>
              <td><?= htmlspecialchars($r['recurso_nome']); ?></td>
              <td><?= date('d/m/Y', strtotime($r['data'])); ?></td>
              <td><?= substr($r['hora_inicio'],0,5); ?> - <?= substr($r['hora_fim'],0,5); ?></td>
              <td><?= ucfirst($r['status']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
