<?php
class ReservaController
{
    public static function horarios(PDO $pdo)
    {
        $recurso_id = (int)($_GET['id'] ?? 0);
        $recurso = Recurso::find($pdo, $recurso_id);
        if (!$recurso) {
            header("Location: index.php?route=recursos");
            exit;
        }

        $data = $_GET['data'] ?? date('Y-m-d');

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/reservas/horarios.php';
        include 'views/partials/footer.php';
    }

    public static function reservar(PDO $pdo)
    {
        self::requireLogin();

        $recurso_id = (int)($_GET['recurso_id'] ?? 0);
        $data       = $_GET['data'] ?? null;
        $inicio     = $_GET['inicio'] ?? null;
        $fim        = $_GET['fim'] ?? null;

        $recurso = Recurso::find($pdo, $recurso_id);
        if (!$recurso || !$data || !$inicio || !$fim) {
            header("Location: index.php?route=recursos");
            exit;
        }

        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dispo = Reserva::horarioDisponivel($pdo, $recurso_id, $data, $inicio, $fim);
            if (!$dispo) {
                $erro = 'Este horário acabou de ser reservado por outra pessoa.';
            } else {
                $reserva_id = Reserva::create($pdo, $_SESSION['user_id'], $recurso_id, $data, $inicio, $fim);
                header("Location: index.php?route=confirmacao_reserva&id=" . $reserva_id);
                exit;
            }
        }

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/reservas/reservar.php';
        include 'views/partials/footer.php';
    }

    public static function confirmacao(PDO $pdo)
    {
        $id = (int)($_GET['id'] ?? 0);
        $reserva = Reserva::findWithRecurso($pdo, $id);
        if (!$reserva) {
            header("Location: index.php");
            exit;
        }

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/reservas/confirmacao.php';
        include 'views/partials/footer.php';
    }

    public static function minhas(PDO $pdo)
    {
        self::requireLogin();
        $reservas = Reserva::byUser($pdo, $_SESSION['user_id']);

        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/reservas/minhas.php';
        include 'views/partials/footer.php';
    }

    private static function requireLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login");
            exit;
        }
    }
}
