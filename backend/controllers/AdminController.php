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
        $users = $this->getAllUsers();
        $tasks = $this->getAllTasks();
        $totalUsers = count($users);
        $totalTasks = count($tasks);

        $completedTasks = 0;
        foreach ($tasks as $task) {
            if ($task['status'] == 1) {
                $completedTasks++;
            }
        }

        $pendingTasks = $totalTasks - $completedTasks;

        $growthData = $this->getUserGrowth();
        $dates = [];
        $counts = [];
        $total = 0;

        foreach ($growthData as $row) {
            $dates[] = date("M d", strtotime($row['date']));
            $total += $row['new_users'];   // accumulate users
            $counts[] = $total;
        }


        $this->view('admin/dashboard', [
            'totalUsers' => $totalUsers,
            'totalTasks' => $totalTasks,
            'completedTasks' => $completedTasks,
            'pendingTasks' => $pendingTasks,
            'dates' => json_encode($dates),
            'counts' => json_encode($counts)
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
    private function getUserGrowth()
    {
        $database = new Database();
        $conn = $database->connect();

        $stmt = $conn->query("
        SELECT DATE(created_at) as date, COUNT(*) as new_users
        FROM users
        GROUP BY DATE(created_at)
        ORDER BY date ASC
    ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
