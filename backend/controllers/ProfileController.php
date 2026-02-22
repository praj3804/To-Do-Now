<?php

require_once "../backend/core/Controller.php";
require_once "../backend/middleware/AuthMiddleware.php";
require_once "../backend/models/Profile.php";

class ProfileController extends Controller
{
    public function index()
    {
        AuthMiddleware::check();

        $profileModel = new Profile();
        $profile = $profileModel->findByUser($_SESSION['user']['id']);

        if (!$profile) {
            $profileModel->create($_SESSION['user']['id']);
            $profile = $profileModel->findByUser($_SESSION['user']['id']);
        }

        $this->view('profile/index', ['profile' => $profile]);
    }

    public function edit()
    {
        AuthMiddleware::check();

        $profileModel = new Profile();
        $profile = $profileModel->findByUser($_SESSION['user']['id']);

        $this->view('profile/edit', ['profile' => $profile]);
    }

    public function update()
    {
        AuthMiddleware::check();

        $bio = $_POST['bio'];
        $phone = $_POST['phone'];

        $imagePath = null;

        if (!empty($_FILES['profile_image']['name'])) {
            $targetDir = "../public/uploads/";
            $fileName = time() . "_" . basename($_FILES["profile_image"]["name"]);
            $targetFile = $targetDir . $fileName;

            move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile);

            $imagePath = "uploads/" . $fileName;
        }

        $profileModel = new Profile();
        $profileModel->update(
            $_SESSION['user']['id'],
            $bio,
            $phone,
            $imagePath
        );

        header("Location: /to-do-now/public/profile");
        exit;
    }
    public function create()
{
    AuthMiddleware::check();

    $profileModel = new Profile();
    $existing = $profileModel->findByUser($_SESSION['user']['id']);

    if ($existing) {
        header("Location: /to-do-now/public/profile");
        exit;
    }

    $this->view('profile/create');
}

public function store()
{
    AuthMiddleware::check();

    $bio = $_POST['bio'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $imagePath = null;

    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir = "../public/uploads/";
        $fileName = time() . "_" . basename($_FILES["profile_image"]["name"]);
        $targetFile = $targetDir . $fileName;

        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile);

        $imagePath = "uploads/" . $fileName;
    }

    $profileModel = new Profile();

    $profileModel->create($_SESSION['user']['id']);
    $profileModel->update(
        $_SESSION['user']['id'],
        $bio,
        $phone,
        $imagePath
    );

    header("Location: /to-do-now/public/profile");
    exit;
}
}