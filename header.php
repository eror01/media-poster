<?php 
ob_start();
session_start();
include "includes/class_loader.php";
include "includes/validate-inputs.php";
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

$pageName = basename($_SERVER['PHP_SELF'], '.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Media Poster Platform</title>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/982187732a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body class="<?php echo $pageName; ?>">