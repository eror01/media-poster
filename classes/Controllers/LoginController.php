<?php

class LoginController extends Login {
  
  public function loginUser($email, $password) {
    $this->getUser($email, $password);
    $this->getUserIdAndInsertUserInfo($email);
    header("Location: index");
  }

}