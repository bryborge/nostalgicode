<?php

namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware
{
  public function __invoke($request, $response, $next)
  {
    $this->container->view->getEnvironment()->addGlobal('validation_errors', $_SESSION['validation_errors']);
    unset($_SESSION['validation_errors']);

    $response = $next($request, $response);
    return $response;
  }
}
