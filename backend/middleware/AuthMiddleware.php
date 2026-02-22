<?php

class AuthMiddleware
{
    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /to-do-now/public/login");
            exit;
        }
    }

    public static function admin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: /to-do-now/public/dashboard");
            exit;
        }
    }
}
