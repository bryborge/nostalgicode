<?php

namespace App\Controllers;

class Controller
{
  /**
   * Properties
   */
  protected $container;

  /**
   * Constructor
   *
   * @param Object $container
   */
  public function __construct($container)
  {
    $this->container = $container;
  }

  /**
   * Magic method that allows for shorthand when rendering views.
   *
   * Ex:
   * ---
   * With magic method:    $this->view->render
   * Without magic method: $this->container->view->render
   *
   * @param  String $property
   * @return Object
   */
  public function __get($property)
  {
    if ($this->container->{$property}) {
      return $this->container->{$property};
    }
  }
}
