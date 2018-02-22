<?php

/**
 * Database Connection
 */

class DBConnection
{
  /**
   * Properties
   */
  protected $host = 'localhost';
  protected $user = 'root';
  protected $pass = 'root';
  protected $db = 'slim_todo';
  protected $charset = 'utf8';
  protected $dsn;
  protected $opt;
  protected $pdo;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->dsn = "mysql:host=$this->host; dbname=$this->db; charset=$this->charset";

    $this->opt = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
  }

  /**
   * Prepare a SQL statement before execution
   */
  public function prepare($sql)
  {
    return $this->pdo->prepare($sql);
  }

  /**
   * Get the last inserted object
   */
  public function lastInsertId()
  {
    return $this->pdo->lastInsertId();
  }
}
