<?php 
if(isset($_POST['user-info-submit'])) {
  $ui_headline    = validateInput($_POST['ui-headline']);
  $ui_location    = validateInput($_POST['ui-location']);
  $ui_position    = validateInput($_POST['ui-position']);
  $ui_industry    = validateInput($_POST['ui-industry']);
  $user->saveUserInfo($ui_headline, $ui_location, $ui_position, $ui_industry, $userID);
  header("Location: u?uid={$userID}");
}
?>
<div class="user-main shadow-sm mb-2 bg-body">
  <?php include "components/user-background.php"; ?>
  <div class="user-desc">
    <?php include "components/user-avatar.php"; ?>
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
    <?php if($userID === $user_info_uid) : ?>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userInfoModal"><i class="fa-solid fa-user-pen"></i></button>
    <?php endif; ?>
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