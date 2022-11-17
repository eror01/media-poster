<?php

class LoginController extends Login {
  
  public function loginUser($email, $password) {
    $this->getUser($email, $password);
    header("Location: index");
  }

}