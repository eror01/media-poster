<?php

class Register extends Db {

  protected function getUserEmail($email) {
    $sql = "SELECT user_email FROM user WHERE user_email = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(array($email));
    $resultCheck = false;
    if($stmt->rowCount() > 0) {
      $resultCheck;
    } else {
      $resultCheck = true;
    }
    return $resultCheck;
  }

  protected function setUser($email, $password, $firstName, $lastName) {
    $sql = "INSERT INTO user(user_email, user_password, user_firstname, user_lastname) VALUES(?, ?, ?, ?);";
    $stmt = $this->connect()->prepare($sql);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute(array($email, $hashedPassword, $firstName, $lastName));
  }
  
}
