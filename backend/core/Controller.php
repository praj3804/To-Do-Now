<?php

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        
        $content = "../frontend/pages/{$view}.php";
        require_once "../frontend/layouts/main.php";
    }
}