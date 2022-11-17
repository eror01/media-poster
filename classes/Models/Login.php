<?php

class Login extends Db {

  protected function getUser($email, $password) {
    $stmt = $this->connect()->prepare('SELECT user_password FROM user WHERE user_email = ?;');
    $stmt->execute(array($email));

    if($stmt->rowCount() == 0) {
      $stmt = null;
      header("Location: login?error=user_not_found");
    }
    
    $passwordHash = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPassword = password_verify($password, $passwordHash[0]['user_password']);
    var_dump($checkPassword);

    if($checkPassword == false) {
      $stmt = null;
      header("Location: login.php?error=wrong_password");
    } 
    if($checkPassword == true) {
      $stmt = $this->connect()->prepare('SELECT * FROM user WHERE user_email = ? AND user_password = ?;');
      if(!$stmt->execute(array($email, $passwordHash[0]['user_password']))) {
        $stmt = null;
        header("Location: login.php?error=stmtfailed");
        exit();
      }

      if($stmt->rowCount() == 0) {
        $stmt = null;
        header("Location: login.php?error=user_not_found");
        exit();
      }
      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      session_start();
      $_SESSION['userID']       = $user[0]['user_id'];
      $_SESSION['userFirstName']     = $user[0]['user_firstname'];
      $_SESSION['userLastName']     = $user[0]['user_lastname'];
      $_SESSION['loggedIn']     = true;
      $stmt = null;
    }
  }

}