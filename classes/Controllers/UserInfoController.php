<?php

class UserInfoController extends UserInfo {

  public function saveUserInfoBgImage($userId, $userBg) {
    $this->setUserInfoBackground($userId, $userBg);
  }

}