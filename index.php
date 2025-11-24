<?php
session_start();

require 'database/connection.php';
require 'models/User.php';
require 'models/Recurso.php';
require 'models/Reserva.php';
require 'controllers/AuthController.php';
require 'controllers/RecursoController.php';
require 'controllers/ReservaController.php';

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        include 'views/partials/header.php';
        include 'views/partials/navbar.php';
        include 'views/home.php';
        include 'views/partials/footer.php';
        break;

    case 'login':
        AuthController::login($pdo);
        break;

    case 'register':
        AuthController::register($pdo);
        break;

    case 'logout':
        AuthController::logout();
        break;

    case 'recursos':
        RecursoController::index($pdo);
        break;

    case 'admin_recursos':
        RecursoController::admin($pdo);
        break;

    case 'novo_recurso':
        RecursoController::create($pdo);
        break;

    case 'editar_recurso':
        RecursoController::edit($pdo);
        break;

    case 'excluir_recurso':
        RecursoController::delete($pdo);
        break;

    case 'horarios':
        ReservaController::horarios($pdo);
        break;

    case 'reservar':
        ReservaController::reservar($pdo);
        break;

    case 'confirmacao_reserva':
        ReservaController::confirmacao($pdo);
        break;

    case 'minhas_reservas':
        ReservaController::minhas($pdo);
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        echo "Página não encontrada";
}
