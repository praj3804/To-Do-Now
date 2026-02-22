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

     $totalTasks = count($tasks);

$completedTasks = 0;

foreach ($tasks as $task) {
    if ($task['status'] == 1) {
        $completedTasks++;
    }
}

$remainingTasks = $totalTasks - $completedTasks;

$completionPercentage = $totalTasks > 0
    ? round(($completedTasks / $totalTasks) * 100)
    : 0;
    $this->view('dashboard', [
    'tasks' => $tasks,
    'totalTasks' => $totalTasks,
    'completedTasks' => $completedTasks,
    'remainingTasks' => $remainingTasks,
    'completionPercentage' => $completionPercentage
]);
}

}
