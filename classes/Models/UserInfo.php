<?php 

class UserInfo extends Db {

  public $userInfoBg;
  public $userInfoAvatar;
  public $userInfoHeadline;
  public $userInfoUid;
  public $userInfoAbout;
  public $userInfoLocation;
  public $userInfoPosition;
  public $userInfoIndustry;
  public $userInfoSkills;
  public $userInfoCompany;


  public function setAllUserInfo($bg, $avatar, $headline, $userInfoUid, $about, $location, $position, $industry, $skills, $company) {
    $this->userInfoBg         = $bg;
    $this->userInfoAvatar     = $avatar;
    $this->userInfoHeadline   = $headline;
    $this->userInfoUid        = $userInfoUid;
    $this->userInfoAbout      = $about;
    $this->userInfoLocation   = $location;
    $this->userInfoPosition   = $position;
    $this->userInfoIndustry   = $industry;
    $this->userInfoSkills     = $skills;
    $this->userInfoCompany    = $company;
  }

  public function getAllUserInfo() {
    return $this->userInfoBg;
    return $this->userInfoAvatar;
    return $this->userInfoHeadline;
    return $this->userInfoUid;
    return $this->userInfoAbout;
    return $this->userInfoLocation;
    return $this->userInfoPosition;
    return $this->userInfoIndustry;
    return $this->userInfoSkills;
    return $this->userInfoCompany;
  }

  public function setUserInfoAvatar($userAvatar, $userId) {
    $stmt = $this->connect()->prepare('UPDATE user_info SET user_info_avatar = ? WHERE user_info_uid = ?;');
    $stmt->execute(array($userAvatar, $userId));
  }

  public function setUserInfoBackground($userBg, $userId) {
    $stmt = $this->connect()->prepare('UPDATE user_info SET user_info_bg = ? WHERE user_info_uid = ?;');
    $stmt->execute(array($userBg, $userId));
  }

  public function setUserInfoAbout($userAbout, $userId) {
    $stmt = $this->connect()->prepare('UPDATE user_info SET user_info_about = ? WHERE user_info_uid = ?;');
    $stmt->execute(array($userAbout, $userId));
  }

  public function setUserInfo($ui_headline, $ui_location, $ui_position, $ui_industry,$userId) {
    $stmt = $this->connect()->prepare('
    UPDATE user_info SET
    user_info_headline = ?, user_info_location = ?, user_info_position = ?, user_info_industry = ? WHERE user_info_uid = ?;');
    $stmt->execute(array($ui_headline, $ui_location, $ui_position, $ui_industry, $userId));
  }

  public function setUserInfoSkills($ui_skills, $userId) {
    $stmt = $this->connect()->prepare('UPDATE user_info SET user_info_skills = ? WHERE user_info_uid = ?;');
    $stmt->execute(array($ui_skills, $userId));
  }

  public function getUserInfoAll($user_id) {
    $stmt = $this->connect()->prepare('SELECT * FROM user_info WHERE user_info_uid = ?;');
    $stmt->execute(array($user_id));
    while($row = $stmt->fetch()) {
      $this->setAllUserInfo(
        $row['user_info_bg'], $row['user_info_avatar'], $row['user_info_headline'], $row['user_info_uid'], $row['user_info_about'], $row['user_info_location'],
        $row['user_info_position'], $row['user_info_industry'], $row['user_info_skills'], $row['user_info_company']);
    }
  }

}