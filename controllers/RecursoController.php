<?php
class RecursoController
{
    public static function index(PDO $pdo)
    {
        $recursos = Recurso::allActive($pdo);

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/recursos/index.php';
        include 'views/partials/footer.php';
    }

    public static function admin(PDO $pdo)
    {
        self::requireLogin();
        $recursos = Recurso::all($pdo);

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/recursos/admin.php';
        include 'views/partials/footer.php';
    }

    public static function create(PDO $pdo)
    {
        self::requireLogin();

        $erro = '';
        $ok   = false;
        $recurso = [
            'id' => null,
            'nome' => '',
            'tipo' => 'sala',
            'descricao' => '',
            'capacidade' => '',
            'ativo' => 1
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $tipo = $_POST['tipo'] ?? 'sala';
            $descricao = $_POST['descricao'] ?? '';
            $capacidade = $_POST['capacidade'] ?? null;

            if ($nome === '') {
                $erro = 'O nome é obrigatório.';
            } else {
                Recurso::create($pdo, $nome, $tipo, $descricao, $capacidade);
                $ok = true;
            }
        }

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/recursos/form.php';
        include 'views/partials/footer.php';
    }

    public static function edit(PDO $pdo)
    {
        self::requireLogin();

        $id = (int)($_GET['id'] ?? 0);
        $recurso = Recurso::find($pdo, $id);
        if (!$recurso) {
            die("Recurso não encontrado");
        }

        $erro = '';
        $ok   = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $tipo = $_POST['tipo'] ?? 'sala';
            $descricao = $_POST['descricao'] ?? '';
            $capacidade = $_POST['capacidade'] ?? null;
            $ativo = $_POST['ativo'] ?? 1;

            if ($nome === '') {
                $erro = 'O nome é obrigatório.';
            } else {
                Recurso::update($pdo, $id, $nome, $tipo, $descricao, $capacidade, $ativo);
                $ok = true;
                $recurso = Recurso::find($pdo, $id);
            }
        }

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/recursos/form.php';
        include 'views/partials/footer.php';
    }

    public static function delete(PDO $pdo)
    {
        self::requireLogin();

        $id = (int)($_GET['id'] ?? 0);
        Recurso::delete($pdo, $id);
        header("Location: index.php?route=admin_recursos");
        exit;
    }

    private static function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login");
            exit;
        }
    }
}
