<?php
class Reserva
{
    public static function horarioDisponivel(PDO $pdo, int $recurso_id, string $data, string $inicio, string $fim): bool
    {
        $sql = "SELECT id FROM reservas
                WHERE recurso_id = :recurso_id
                  AND data = :data
                  AND status <> 'cancelada'
                  AND (hora_inicio < :fim AND hora_fim > :inicio)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':recurso_id' => $recurso_id,
            ':data' => $data,
            ':inicio' => $inicio,
            ':fim' => $fim
        ]);
        return $stmt->rowCount() === 0;
    }

    public static function create(PDO $pdo, int $user_id, int $recurso_id, string $data, string $inicio, string $fim)
    {
        $stmt = $pdo->prepare("INSERT INTO reservas (user_id, recurso_id, data, hora_inicio, hora_fim, status)
                               VALUES (?,?,?,?,?,'confirmada')");
        $stmt->execute([$user_id, $recurso_id, $data, $inicio, $fim]);
        return $pdo->lastInsertId();
    }

    public static function findWithRecurso(PDO $pdo, int $id)
    {
        $sql = "SELECT r.*, rc.nome AS recurso_nome
                FROM reservas r
                JOIN recursos rc ON rc.id = r.recurso_id
                WHERE r.id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function byUser(PDO $pdo, int $user_id)
    {
        $sql = "SELECT r.*, rc.nome AS recurso_nome
                FROM reservas r
                JOIN recursos rc ON rc.id = r.recurso_id
                WHERE r.user_id = :user_id
                ORDER BY r.data DESC, r.hora_inicio DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
