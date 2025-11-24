<?php
class Recurso
{
    public static function allActive(PDO $pdo)
    {
        $stmt = $pdo->query("SELECT * FROM recursos WHERE ativo = 1 ORDER BY tipo, nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function all(PDO $pdo)
    {
        $stmt = $pdo->query("SELECT * FROM recursos ORDER BY tipo, nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM recursos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create(PDO $pdo, $nome, $tipo, $descricao, $capacidade)
    {
        $stmt = $pdo->prepare("INSERT INTO recursos (nome, tipo, descricao, capacidade, ativo)
                               VALUES (?,?,?,?,1)");
        $stmt->execute([$nome, $tipo, $descricao, $capacidade ?: null]);
        return $pdo->lastInsertId();
    }

    public static function update(PDO $pdo, $id, $nome, $tipo, $descricao, $capacidade, $ativo)
    {
        $stmt = $pdo->prepare("UPDATE recursos 
                               SET nome=?, tipo=?, descricao=?, capacidade=?, ativo=? 
                               WHERE id=?");
        $stmt->execute([$nome, $tipo, $descricao, $capacidade ?: null, $ativo, $id]);
    }

    public static function delete(PDO $pdo, $id)
    {
        $stmt = $pdo->prepare("DELETE FROM recursos WHERE id=?");
        $stmt->execute([$id]);
    }
}
