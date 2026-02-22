<?php

class Router
{
    private $routes = [];

    public function get($url, $action)
    {
        $this->routes['GET'][$url] = $action;
    }

    public function resolve()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_GET['url'] ?? '';

        $requestUri = trim($requestUri, '/');

        if (isset($this->routes[$requestMethod][$requestUri])) {
            $action = $this->routes[$requestMethod][$requestUri];

            list($controllerName, $methodName) = explode('@', $action);

            require_once "../backend/controllers/{$controllerName}.php";

            $controller = new $controllerName();
            return $controller->$methodName();
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
    public function post($url, $action)
{
    $this->routes['POST'][$url] = $action;
}

}
