<?php
class AuthController
{
    public static function login(PDO $pdo)
    {
        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            if ($email === '' || $senha === '') {
                $erro = 'Preencha e-mail e senha.';
            } else {
                $user = User::findByEmail($pdo, $email);
                if ($user && password_verify($senha, $user['senha_hash'])) {
                    $_SESSION['user_id']   = $user['id'];
                    $_SESSION['user_nome'] = $user['nome'];
                    header("Location: index.php");
                    exit;
                } else {
                    $erro = 'E-mail ou senha inválidos.';
                }
            }
        }

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/auth/login.php';
        include 'views/partials/footer.php';
    }

    public static function register(PDO $pdo)
    {
        $erro = '';
        $ok   = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome  = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            if ($nome === '' || $email === '' || $senha === '') {
                $erro = 'Preencha todos os campos.';
            } else {
                $existe = User::findByEmail($pdo, $email);
                if ($existe) {
                    $erro = 'Este e-mail já está cadastrado.';
                } else {
                    User::create($pdo, $nome, $email, $senha);
                    $ok = true;
                }
            }
        }

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/auth/register.php';
        include 'views/partials/footer.php';
    }

    public static function logout()
    {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
