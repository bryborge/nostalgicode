<?php

/**
 * Todo List API (v1)
 */

// Dependencies
require '../vendor/autoload.php';

// Controllers
require '../api/controllers/TodoController.php';

// Configuration
$config = [
  'settings' => [
    'displayErrorDetails' => true,
  ],
];

// App Instance
$c = new \Slim\Container($config);
$app = new \Slim\App($c);

// Routes
$app->get('/api/v1/todos', \TodoController::class . ':getTodos');
$app->get('/api/v1/todos/{id}', \TodoController::class . ':getTodo');
$app->post('/api/v1/todos', \TodoController::class . ':addTodo');
$app->put('/api/v1/todos/{id}', \TodoController::class . ':updateTodo');
$app->delete('/api/v1/todos/{id}', \TodoController::class . ':deleteTodo');

// Run the App Instance
$app->run();
