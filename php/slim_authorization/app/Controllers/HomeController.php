<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;

class HomeController extends Controller
{
  /**
   * Index
   *
   * @param  Object $request
   * @param  Object $response
   * @return Object
   */
  public function index($request, $response)
  {
    return $this->view->render($response, 'home.twig');
  }
}
