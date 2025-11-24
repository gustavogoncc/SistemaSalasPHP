<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Gerenciar Recursos</h3>
    <a href="index.php?route=novo_recurso" class="btn btn-success">
      <i class="bi bi-plus-circle"></i> Novo recurso
    </a>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Capacidade</th>
        <th>Status</th>
        <th style="width: 150px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recursos as $r): ?>
        <tr>
          <td><?= htmlspecialchars($r['nome']); ?></td>
          <td><?= ucfirst($r['tipo']); ?></td>
          <td><?= $r['capacidade'] ?: '-'; ?></td>
          <td><?= $r['ativo'] ? 'Ativo' : 'Inativo'; ?></td>
          <td>
            <a href="index.php?route=editar_recurso&id=<?= $r['id']; ?>" class="btn btn-primary btn-sm">
              Editar
            </a>
            <a href="index.php?route=excluir_recurso&id=<?= $r['id']; ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Deseja excluir este recurso?');">
               Excluir
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
