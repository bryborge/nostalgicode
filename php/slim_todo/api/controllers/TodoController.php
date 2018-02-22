<?php

/**
 * Todo Controller
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Container\ContainerInterface as Container;

require __DIR__ . '/../dao/TodoDAO.php';

class TodoController
{
  /**
   * Attributes
   */
  protected $container;


  /**
   * Constructor
   */
  public function __construct(Container $c)
  {
    $this->container = $c;
  }


  /**
   * GET all of the todo items
   */
  public function getTodos(Request $req, Response $res)
  {
    if ($req->isGet()) {
      $todoDAO = new TodoDAO();
      $result = $todoDAO->getTodos();

      echo json_encode($result);
    }
  }


  /**
   * GET a todo item
   */
  public function getTodo(Request $req, Response $res)
  {
    if ($req->isGet()) {
      $id = $req->getAttribute('id');

      $todoDAO = new TodoDAO();
      $todo = $todoDAO->getTodo($id);
      $result = $todo->jsonReady();
    }

    echo json_encode($result);
  }


  /**
   * Add a todo item
   */
  public function addTodo(Request $req, Response $res)
  {
    if ($req->isPost()) {
      $requestBody = $req->getParsedBody();

      $todo = new TodoVO();
      $todo->setDescription($requestBody['description']);

      $todoDAO = new TodoDAO();
      $todo = $todoDAO->addTodo($todo);
      $result = $todo->jsonReady();
    }

    echo json_encode($result);
  }


  /**
   * Update a todo item
   */
  public function updateTodo(Request $req, Response $res)
  {
    if ($req->isPut()) {
      $id = $req->getAttribute('id');
      $requestBody = $req->getParsedBody();

      $todoDAO = new TodoDAO();
      $todo = $todoDAO->getTodo($id);
      $todo->setDescription($requestBody['description']);

      $todo = $todoDAO->updateTodo($todo);

      $result = $todo->jsonReady();
    }

    echo json_encode($result);
  }


  /**
   * Delete a todo item
   */
  public function deleteTodo(Request $req, Response $res)
  {
    if ($req->isDelete()) {
      $id = $req->getAttribute('id');

      $todoDAO = new TodoDAO();
      $result = $todoDAO->deleteTodo($id);
    }

    echo json_encode($result);
  }
}
