<?php
require_once "../backend/core/Controller.php";

class AuthController extends Controller
{
    public function login()
    {
        $this->view('auth/login');
    }
    public function register()
    {
        $this->view('auth/register');
    }

    public function store()
    {
        require_once "../backend/models/User.php";

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Basic validation
        if (empty($name) || empty($email) || empty($password)) {
            die("All fields are required.");
        }

        if (strlen($password) < 8) {
            die("Password must be at least 8 characters.");
        }

        $userModel = new User();

        // Check if email already exists
        if ($userModel->findByEmail($email)) {
            die("Email already registered.");
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create user
        if ($userModel->create($name, $email, $hashedPassword)) {
            header("Location: /to-do-now/public/login");
            exit;
        } else {
            die("Something went wrong.");
        }
    }
    public function authenticate()
{
    require_once "../backend/models/User.php";

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        die("All fields are required.");
    }

    $userModel = new User();
    $user = $userModel->findByEmail($email);

    if (!$user) {
        die("Invalid credentials.");
    }

    if (!password_verify($password, $user['password'])) {
        die("Invalid credentials.");
    }

    // Create session
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'role' => $user['role']
    ];

    // Redirect based on role
    if ($user['role'] === 'admin') {
        header("Location: /to-do-now/public/admin/dashboard");
    } else {
        header("Location: /to-do-now/public/dashboard");
    }

    exit;
}
public function logout()
{
    session_unset();
    session_destroy();

    header("Location: /to-do-now/public/login");
    exit;
}


}
