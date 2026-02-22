<?php

require_once "../backend/core/Controller.php";
require_once "../backend/middleware/AuthMiddleware.php";
require_once "../backend/models/User.php";
require_once "../backend/models/Task.php";
class AdminController extends Controller
{
    public function index()
{
    AuthMiddleware::admin();

    $userModel = new User();
    $taskModel = new Task();

    $users = $this->getAllUsers();
    $tasks = $this->getAllTasks();

    $this->view('admin/dashboard', [
        'users' => $users,
        'tasks' => $tasks
    ]);
}

private function getAllUsers()
{
    $database = new Database();
    $conn = $database->connect();

    $stmt = $conn->query("SELECT id, name, email, role, created_at FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

private function getAllTasks()
{
    $database = new Database();
    $conn = $database->connect();

    $stmt = $conn->query(
        "SELECT tasks.*, users.name 
         FROM tasks 
         JOIN users ON tasks.user_id = users.id"
    );

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
