<div class="container col-md-6">
  <h3 class="mb-3">
    <?= $recurso['id'] ? 'Editar Recurso' : 'Novo Recurso'; ?>
  </h3>

  <?php if (!empty($ok)): ?>
    <div class="alert alert-success">Dados salvos com sucesso!</div>
  <?php endif; ?>

  <?php if (!empty($erro)): ?>
    <div class="alert alert-danger"><?= $erro; ?></div>
  <?php endif; ?>

  <form method="post">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control"
             value="<?= htmlspecialchars($recurso['nome']); ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tipo</label>
      <select name="tipo" class="form-control">
        <option value="sala" <?= $recurso['tipo']=='sala'?'selected':''; ?>>Sala</option>
        <option value="equipamento" <?= $recurso['tipo']=='equipamento'?'selected':''; ?>>Equipamento</option>
        <option value="outro" <?= $recurso['tipo']=='outro'?'selected':''; ?>>Outro</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Capacidade (pessoas)</label>
      <input type="number" name="capacidade" class="form-control"
             value="<?= htmlspecialchars($recurso['capacidade']); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição</label>
      <textarea name="descricao" class="form-control" rows="3"><?= htmlspecialchars($recurso['descricao']); ?></textarea>
    </div>

    <?php if ($recurso['id'] !== null): ?>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="ativo" class="form-control">
          <option value="1" <?= $recurso['ativo']==1?'selected':''; ?>>Ativo</option>
          <option value="0" <?= $recurso['ativo']==0?'selected':''; ?>>Inativo</option>
        </select>
      </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="index.php?route=admin_recursos" class="btn btn-secondary">Voltar</a>
  </form>
</div>
