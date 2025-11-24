<?php
class User
{
    public static function findByEmail(PDO $pdo, string $email)
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create(PDO $pdo, string $nome, string $email, string $senha)
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (nome, email, senha_hash) VALUES (?,?,?)");
        $stmt->execute([$nome, $email, $hash]);
        return $pdo->lastInsertId();
    }

    public static function findById(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
