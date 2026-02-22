<?php
require_once "../backend/core/Controller.php";
class HomeController extends Controller
{
    public function index()
    {
        $this->view('home');
    }
}