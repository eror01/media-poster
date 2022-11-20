<?php 

class UserInfo extends Db {
  
  protected function setUserInfoBackground($userId, $userBg) {
    $stmt = $this->connect()->prepare('INSERT INTO user_info(user_info_uid, user_info_bg) VALUES(?, ?);');
    $stmt->execute(array($userId, $userBg));
  }

}