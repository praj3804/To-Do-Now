<?php

require_once "../backend/config/database.php";

class Task
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getByUser($userId)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC"
        );

        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($userId, $title, $description, $dueDate)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO tasks (user_id, title, description, due_date) 
             VALUES (:user_id, :title, :description, :due_date)"
        );

        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":due_date", $dueDate);

        return $stmt->execute();
    }

    public function markComplete($taskId, $userId)
    {
        $stmt = $this->conn->prepare(
            "UPDATE tasks SET status = 1 
             WHERE id = :id AND user_id = :user_id"
        );

        $stmt->bindParam(":id", $taskId);
        $stmt->bindParam(":user_id", $userId);

        return $stmt->execute();
    }

    public function delete($taskId, $userId)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM tasks 
             WHERE id = :id AND user_id = :user_id"
        );

        $stmt->bindParam(":id", $taskId);
        $stmt->bindParam(":user_id", $userId);

        return $stmt->execute();
    }
    public function findById($taskId, $userId)
{
    $stmt = $this->conn->prepare(
        "SELECT * FROM tasks WHERE id = :id AND user_id = :user_id"
    );

    $stmt->bindParam(":id", $taskId);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($taskId, $userId, $title, $description, $dueDate)
{
    $stmt = $this->conn->prepare(
        "UPDATE tasks 
         SET title = :title, description = :description, due_date = :due_date
         WHERE id = :id AND user_id = :user_id"
    );

    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":due_date", $dueDate);
    $stmt->bindParam(":id", $taskId);
    $stmt->bindParam(":user_id", $userId);

    return $stmt->execute();
}

}
