<?php

namespace App\Middleware;

class GuestMiddleware extends Middleware
{
  public function __invoke($request, $response, $next)
  {
    // check if user is signed in
    if ($this->container->auth->check()) {
      $this->container->flash->addMessage('error', 'You are currently signed in. Please sign out before doing that.');
      return $response->withRedirect($this->container->router->pathFor('home'));
    }

    $response = $next($request, $response);
    return $response;
  }
}
