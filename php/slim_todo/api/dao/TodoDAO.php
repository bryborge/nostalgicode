<?php

/**
 * Todo Data Access Object
 */

require __DIR__ . '/../db/Connection.php';
require __DIR__ . '/../vo/TodoVO.php';

class TodoDAO
{
  /**
   * Attributes
   */
  protected $connection;


  /**
   * Constructor
   */
  public function __construct()
  {
    $this->connection = new DBConnection();
  }


  /**
   * Get all of the todos
   */
  public function getTodos()
  {
    $sql = "SELECT * FROM todos ORDER BY id";

    $query = $this->connection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
  }


  /**
   * Get a todo item
   */
  public function getTodo($id)
  {
    $sql = "SELECT * FROM todos WHERE id=$id";

    $query = $this->connection->prepare($sql);
    $query->execute();

    $result = $query->fetchAll();
    $row = $result[0];

    $todo = new TodoVO();
    $todo->setId($row['id']);
    $todo->setDescription($row['description']);

    return $todo;
  }


  /**
   * Add a todo item
   */
  public function addTodo($todo)
  {
    $sql = "INSERT INTO todos (description) VALUES (:description)";

    $query = $this->connection->prepare($sql);
    $query->bindValue(':description', $todo->getDescription());
    $query->execute();

    $result = $this->connection->lastInsertId();
    $todo->setId($result);

    return $todo;
  }


  /**
   * Update a todo item
   */
  public function updateTodo($todo)
  {
    $sql = "UPDATE `todos` SET `description`=:description WHERE `id`=:id";

    $query = $this->connection->prepare($sql);
    $query->bindValue(':id', $todo->getId());
    $query->bindValue(':description', $todo->getDescription());
    $query->execute();

    return $todo;
  }


  /**
   * Delete a todo item
   */
  public function deleteTodo($id)
  {
    $sql = "DELETE FROM todos WHERE id=$id";

    $query = $this->connection->prepare($sql);
    $query->execute();

    $result = $query->fetchAll();

    return $result;
  }
}
