<?php
// UserInfoController doesnt  need to extend UserInfo it can just insantiate it like
// $this->new UserInfo();
// class UserInfoController extends UserInfo {

//   public function saveUserInfoBgImage($userBg, $userId) {
//     $this->setUserInfoBackground($userBg, $userId);
//   }

//   public function displayUserInfo($user_id) {
//     $this->getUserInfoAll($user_id);
//   }

//   public function saveUserInfoSkills($ui_skills, $userId) {
//     $this->setUserInfoSkills($ui_skills, $userId);
//   }

//   public function saveUserInfo($ui_headline, $ui_about, $ui_location, $ui_position, $ui_industry, $userId) {
//     $this->setUserInfo($ui_headline, $ui_about, $ui_location, $ui_position, $ui_industry, $userId);
//   }

// }

class UserInfoController {
  public $userInfo;

  public function __construct() {
    $this->userInfo = new UserInfo();
  }

  public function saveUserInfoBgImage($userBg, $userId) {
    $this->userInfo->setUserInfoBackground($userBg, $userId);
  }

  public function saveUserInfoSkills($ui_skills, $userId) {
    $this->userInfo->setUserInfoSkills($ui_skills, $userId);
  }

  public function saveUserInfo($ui_headline, $ui_about, $ui_location, $ui_position, $ui_industry, $userId) {
    $this->userInfo->setUserInfo($ui_headline, $ui_about, $ui_location, $ui_position, $ui_industry, $userId);
  }

  public function displayUserInfo($user_id) {
    $this->userInfo->getUserInfoAll($user_id);
  }

}