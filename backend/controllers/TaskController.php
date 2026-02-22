<?php

require_once "../backend/core/Controller.php";
require_once "../backend/middleware/AuthMiddleware.php";
require_once "../backend/models/Task.php";

class TaskController extends Controller
{
    public function store()
    {
        AuthMiddleware::check();

        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $dueDate = $_POST['due_date'];

        if (empty($title)) {
            die("Title is required.");
        }

        $taskModel = new Task();
        $taskModel->create($_SESSION['user']['id'], $title, $description, $dueDate);

        header("Location: /to-do-now/public/dashboard");
        exit;
    }

    public function complete()
    {
        AuthMiddleware::check();

        $taskId = $_GET['id'];

        $taskModel = new Task();
        $taskModel->markComplete($taskId, $_SESSION['user']['id']);

        header("Location: /to-do-now/public/dashboard");
        exit;
    }

    public function delete()
    {
        AuthMiddleware::check();

        $taskId = $_GET['id'];

        $taskModel = new Task();
        $taskModel->delete($taskId, $_SESSION['user']['id']);

        header("Location: /to-do-now/public/dashboard");
        exit;
    }
    public function edit()
{
    AuthMiddleware::check();

    $taskId = $_GET['id'];

    $taskModel = new Task();
    $task = $taskModel->findById($taskId, $_SESSION['user']['id']);

    if (!$task) {
        die("Task not found.");
    }

    $this->view('tasks/edit', ['task' => $task]);
}

public function update()
{
    AuthMiddleware::check();

    $taskId = $_POST['id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $dueDate = $_POST['due_date'];

    if (empty($title)) {
        die("Title is required.");
    }

    $taskModel = new Task();
    $taskModel->update($taskId, $_SESSION['user']['id'], $title, $description, $dueDate);

    header("Location: /to-do-now/public/dashboard");
    exit;
}
public function create()
{
    AuthMiddleware::check();
    $this->view('tasks/create');
}
}
