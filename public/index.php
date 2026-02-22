<?php
session_start();
require_once '../backend/core/router.php';
$router = new Router();
require_once '../backend/routes/web.php';
$router->resolve();
require_once '../backend/config/database.php';



