<?php

require_once "../backend/core/Controller.php";
require_once "../backend/middleware/AuthMiddleware.php";
require_once "../backend/models/Task.php";

class DashboardController extends Controller
{
    public function index()
{
    AuthMiddleware::check();

    $taskModel = new Task();
    $tasks = $taskModel->getByUser($_SESSION['user']['id']);

    $this->view('dashboard', ['tasks' => $tasks]);
}
}
