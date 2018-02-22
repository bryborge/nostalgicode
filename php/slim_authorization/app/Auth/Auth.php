<?php

namespace App\Auth;

use App\Models\User;

class Auth
{
  public function attempt($email, $password)
  {
    // grab user by email address
    $user = User::where('email', $email)->first();

    // if !user return false
    if (!$user) {
      return false;
    }

    // verify password for that user and set session
    if (password_verify($password, $user->password)) {
      $_SESSION['user'] = $user->id;
      return true;
    }

    // if password can't be verified, return false
    return false;
  }

  public function check()
  {
    return isset($_SESSION['user']);
  }

  public function user()
  {
    return User::find($_SESSION['user']);
  }

  public function signout()
  {
    unset($_SESSION['user']);
  }
}
