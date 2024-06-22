<?php
ini_set('display_errors', 'On');

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\PostController;
use Core\Application;


define('INC_ROOT', dirname(__DIR__));
require INC_ROOT . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(INC_ROOT);
$dotenv->load();

require INC_ROOT . '/app/helpers/functions.php';
require INC_ROOT . '/app/config/database.php';

$app = new Application();

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/articles', [HomeController::class, 'showArticle']);

$app->router->get('/stl-admin', [AdminController::class, 'index']);

$app->router->get('/stl-admin/login', [AuthController::class, 'login']);
$app->router->post('/stl-admin/login', [AuthController::class, 'login']);

$app->router->post('/stl-admin/logout', [AuthController::class, 'logout']);

$app->router->get('/stl-admin/article/create', [PostController::class, 'create']);
$app->router->post('/stl-admin/article/create', [PostController::class, 'store']);
$app->router->get('/stl-admin/article/update', [PostController::class, 'edit']);
$app->router->post('/stl-admin/article/update', [PostController::class, 'update']);
$app->router->post('/stl-admin/article/delete', [PostController::class, 'destroy']);

$app->run();
