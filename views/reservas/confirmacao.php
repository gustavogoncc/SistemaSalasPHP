<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h3 class="card-title text-success mb-3">Reserva confirmada!</h3>

          <p><strong>Recurso:</strong> <?= htmlspecialchars($reserva['recurso_nome']); ?></p>
          <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($reserva['data'])); ?></p>
          <p><strong>Horário:</strong> <?= substr($reserva['hora_inicio'],0,5); ?> - <?= substr($reserva['hora_fim'],0,5); ?></p>
          <p><strong>Status:</strong> <?= ucfirst($reserva['status']); ?></p>

          <a href="index.php?route=minhas_reservas" class="btn btn-primary">Ver minhas reservas</a>
          <a href="index.php?route=recursos" class="btn btn-secondary">Nova reserva</a>
        </div>
      </div>
    </div>
  </div>
</div>
