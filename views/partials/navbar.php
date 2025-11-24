<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">Sistema de Reserva de Salas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=recursos">Salas e Recursos</a>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=minhas_reservas">Minhas Reservas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=admin_recursos">Gerenciar Recursos</a>
          </li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <span class="nav-link">Olá, <?= htmlspecialchars($_SESSION['user_nome']); ?></span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=logout">Sair</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=login">Entrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=register">Cadastrar</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
