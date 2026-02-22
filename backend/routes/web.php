<?php

$router->get('', 'HomeController@index');
$router->get('login', 'AuthController@login');
$router->get('register', 'AuthController@register');
$router->post('register', 'AuthController@store');
$router->post('login', 'AuthController@authenticate');
$router->get('dashboard', 'DashboardController@index');
$router->get('admin/dashboard', 'AdminController@index');
$router->post('tasks', 'TaskController@store');
$router->get('tasks/complete', 'TaskController@complete');
$router->get('tasks/delete', 'TaskController@delete');
$router->get('logout', 'AuthController@logout');
$router->get('tasks/edit', 'TaskController@edit');
$router->post('tasks/update', 'TaskController@update');
$router->get('tasks/create', 'TaskController@create');
$router->post('tasks', 'TaskController@store');