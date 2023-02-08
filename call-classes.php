<?php

if(isset($_SESSION['loggedIn'])) {
  $loggedIn = $_SESSION['loggedIn'];
  $username = $_SESSION['userFirstName'] . ' ' . $_SESSION['userLastName']; 
  $userID   = $_SESSION['userID'];
  include "includes/global_contr.php";
  $user->displayUserInfo($userID); 
  $user_info_uid          = $user->userInfo->userInfoUid;
  $user_info_bg           = $user->userInfo->userInfoBg;
  $user_info_avatar       = $user->userInfo->userInfoAvatar;
  $user_info_headline     = $user->userInfo->userInfoHeadline;
  $user_info_industry     = $user->userInfo->userInfoIndustry;
  $user_info_location     = $user->userInfo->userInfoLocation;
  $user_info_position     = $user->userInfo->userInfoPosition;
  $user_info_about        = $user->userInfo->userInfoAbout;
  $company->displayCompany($username);
  $companyId = $company->company->company_id;
  if($user->userInfo->userInfoCompany == 1) {
    $user_info_company        = $user->userInfo->userInfoCompany;
  } else {
    $user_info_company = 0;
  }
} 