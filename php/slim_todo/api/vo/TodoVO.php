<?php

/**
 * Todo Value Object
 */

class TodoVO
{
  /**
   * Properties
   */
  private $id;
  private $description;


  /**
   * Getters
   */
  public function getId()
  {
    return $this->id;
  }

  public function getDescription()
  {
    return $this->description;
  }


  /**
   * Setters
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }


  /**
   * Conversion Methods
   */
  public function jsonReady()
  {
    return get_object_vars($this);
  }
}
