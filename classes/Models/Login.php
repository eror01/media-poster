<?php

class Login extends Db {

  protected function getUserIdAndInsertUserInfo($email) {
    $stmt = $this->connect()->prepare('SELECT user_id FROM user WHERE user_email = ?;');
    $stmt->execute(array($email));
    $user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user_id = $user_id[0]['user_id'];
    $stmt = $this->connect()->prepare('SELECT user_info_uid FROM user_info WHERE user_info_uid = ?;');
    $stmt->execute(array($user_id));
    if($stmt->rowCount() == 0) {
      $stmt = $this->connect()->prepare('INSERT INTO user_info(user_info_uid) VALUES(?);');
      $stmt->execute(array($user_id));
    } else {
      $stmt = null;
    }
  }

  protected function getUser($email, $password) {
    $stmt = $this->connect()->prepare('SELECT user_password FROM user WHERE user_email = ?;');
    $stmt->execute(array($email));

    if($stmt->rowCount() == 0) {
      $stmt = null;
      header("Location: login?error=user_not_found");
    }
    
    $passwordHash = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPassword = password_verify($password, $passwordHash[0]['user_password']);

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
      $_SESSION['userID']           = $user[0]['user_id'];
      $_SESSION['userFirstName']    = $user[0]['user_firstname'];
      $_SESSION['userLastName']     = $user[0]['user_lastname'];
      $_SESSION['loggedIn']         = true;
      $stmt                         = null;
    }
  }

}