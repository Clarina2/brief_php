<?php

require_once 'config.php'; 
require_once 'controllers/Authcontroller.php'; 
require_once 'controllers/usercontroller.php'; 


$authController = new AuthController($pdo);
$userController = new UserController($pdo);

// Récupération de l'action à partir de la requête GET, avec 'login' comme valeur par défaut
$action = $_GET['action'] ?? 'login';


switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'dashboard':
        $userController->dashboard();
        break;
    case 'profile':
        $userController->profile();
        break;
    default:
        include 'views/login.php'; // Afficher la vue de connexion par défaut
        break;
}

// $dsn = 'mysql:host=localhost;dbname=your_database_name;charset=utf8';
// $username = 'your_database_username';
// $password = 'your_database_password';

// try {
//     $db = new PDO($dsn, $username, $password);
// } catch (PDOException $e) {
//     die("Could not connect to the database: " . $e->getMessage());
// }

// include 'controllers/UserController.php';
// $controller = new UserController($db);

// $action = isset($_GET['action']) ? $_GET['action'] : 'login';

// switch ($action) {
//     case 'register':
//         $controller->register();
//         break;
//     case 'login':
//         $controller->login();
//         break;
//     case 'profile':
//         $controller->profile();
//         break;
//     case 'updateProfile':
//         $controller->updateProfile();
//         break;
//     case 'logout':
//         $controller->logout();
//         break;
//     default:
//         $controller->login();
//         break;
// }
?>

