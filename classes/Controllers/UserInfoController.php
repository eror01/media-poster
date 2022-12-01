<?php

class UserInfoController {
  public $userInfo;

  public function __construct() {
    $this->userInfo = new UserInfo();
  }

  public function saveUserInfoBgImage($userBg, $userId) {
    $this->userInfo->setUserInfoBackground($userBg, $userId);
  }

  public function saveUserInfoAvatar($user_avatar, $userID) {
    $this->userInfo->setUserInfoAvatar($user_avatar, $userID);
  }

  public function saveUserInfoAbout($userAbout, $userId) {
    $this->userInfo->setUserInfoAbout($userAbout, $userId);
  }

  public function saveUserInfoSkills($ui_skills, $userId) {
    $this->userInfo->setUserInfoSkills($ui_skills, $userId);
  }

  public function saveUserInfo($ui_headline, $ui_location, $ui_position, $ui_industry, $userId) {
    $this->userInfo->setUserInfo($ui_headline, $ui_location, $ui_position, $ui_industry, $userId);
  }

  public function displayUserInfo($user_id) {
    $this->userInfo->getUserInfoAll($user_id);
  }

}