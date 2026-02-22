<?php

require_once "../backend/config/database.php";

class Profile
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function findByUser($userId)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM profiles WHERE user_id = :user_id"
        );

        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userId)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO profiles (user_id) VALUES (:user_id)"
        );

        $stmt->bindParam(":user_id", $userId);
        return $stmt->execute();
    }

    public function update($userId, $bio, $phone, $imagePath)
    {
        $stmt = $this->conn->prepare(
            "UPDATE profiles 
             SET bio = :bio, phone = :phone, profile_image = :profile_image
             WHERE user_id = :user_id"
        );

        $stmt->bindParam(":bio", $bio);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":profile_image", $imagePath);
        $stmt->bindParam(":user_id", $userId);

        return $stmt->execute();
    }
}