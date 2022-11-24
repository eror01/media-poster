<?php 
$user_info_bg = $user->userInfo->userInfoBg;
$user_info_headline = $user->userInfo->userInfoHeadline;
$user_info_industry = $user->userInfo->userInfoIndustry;
$user_info_location = $user->userInfo->userInfoLocation;
$user_info_position = $user->userInfo->userInfoPosition;
$user_info_about = $user->userInfo->userInfoAbout;

if(isset($_POST['bg-save'])) {
  $user_bg = $_FILES['hero-background']['name'];
  $user_bg_temp = $_FILES['hero-background']['tmp_name'];
  move_uploaded_file($user_bg_temp, "./images/$user_bg");
  $user->saveUserInfoBgImage($user_bg, $userID);
}

if(isset($_POST['user-info-submit'])) {
  $ui_headline    = $_POST['ui-headline'];
  $ui_about       = $_POST['ui-about'];
  $ui_location    = $_POST['ui-location'];
  $ui_position    = $_POST['ui-position'];
  $ui_industry    = $_POST['ui-industry'];
  $user->saveUserInfo($ui_headline, $ui_about, $ui_location, $ui_position, $ui_industry, $userID);
}
?>
<div class="user-main shadow-sm mb-2 bg-body">
  <div class="user-background">
    <?php if($user_info_bg) : ?>
      <img src="./images/<?php echo $user_info_bg; ?>" alt="Big Background Image">
    <?php else : ?>
      <img src="./images/image_placeholder.jpg" alt="Big Background Image">
    <?php endif; ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></button>
  </div>
  <div class="user-desc">
    <div class="user-avatar">
      <img src="./images/placeholder_user_default.png" alt="User Profile Image">
    </div>
    <div class="user-info">
      <div class="user-info-left">
        <h1><?php echo $username; ?></h1>
        <span class="text-secondary"><?php echo $user_info_headline; ?></span>
        <h5 class="text-body"><?php echo $user_info_location; ?></h5>
        <span class="text-info">How Many Connections</span>
      </div>
      <div class="user-info-right">
        <h1><?php echo $user_info_industry; ?></h1>
        <h2><?php echo $user_info_position; ?></h2>
      </div>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userInfoModal"><i class="fa-solid fa-user-pen"></i></button>
  </div>
</div>

<div class="modal hero-bg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="user-image-form">
        <form action="" method="POSt" enctype="multipart/form-data">
          <div class="user-bg-hero">
            <div class="bg-placeholder">
              <img src="./images/placeholder_user_default.png" alt="" class="bg-hero">
            </div>
            <div class="user-image-file">
              <input type="file" name="hero-background" onchange="displayImage(this)">
              <input type="submit" value="Save Background" name="bg-save">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal user-info-modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="user-info-form">
        <form action="" method="POST">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="ui-headline">
            <label for="floatingInput">Headline (eg. Frontend Developer @)</label>
          </div>
          <div class="form-floating">
            <textarea class="form-control" placeholder="About You" id="floatingTextarea" name="ui-about"></textarea>
            <label for="floatingTextarea">Something About You</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="ui-location">
            <label for="floatingInput">Location (eg. Belgrade, Serbia)</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="ui-position">
            <label for="floatingInput">Current Position (eg. Senior Frontend Developer)</label>
          </div>
          <select class="user-info-industry" name="ui-industry">
            <option></option>
            <option value="design">Design</option>
            <option value="graphic design">Graphic Design</option>
            <option value="banking">Banking</option>
            <option value="insurance">Insurance</option>
            <option value="photography">Photography</option>
            <option value="computer hardware">Computer Hardware</option>
            <option value="it">Information Technology & Services</option>
            <option value="computer software">Computer Software</option>
          </select>
          <div class="user-info-submit-container">
            <input type="submit" value="Confirm" name="user-info-submit" class="btn btn-success w-50">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>