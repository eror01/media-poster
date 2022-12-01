<?php 
if(isset($_POST['ui-about-submit'])) {
  $userAbout = validateInput($_POST['user-about']);
  $user->saveUserInfoAbout($userAbout, $userID);
  header("Location: u?uid={$userID}");
}
?>
<div class="user-about shadow-sm mb-2 bg-body rounded">
  <h2>About</h2>
  <?php if($userID === $user_info_uid) : ?>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userInfoAbout"><i class="fa-solid fa-pen-clip"></i></button>
  <?php endif; ?>
  <div class="user-about-text"><p><?php echo $user_info_about; ?></p></div>
</div>

<div class="modal user-info-modal fade" id="userInfoAbout" tabindex="-1" aria-labelledby="userInfoAbout" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="user-info-form user-info-about">
        <form action="" method="POST">
          <div class="user-info-about-text">
            <label for="exampleFormControlTextarea1" class="form-label">Edit About</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="user-about"><?php echo $user_info_about; ?></textarea>
          </div>
          <div class="user-info-submit-container">
            <input type="submit" value="Save" name="ui-about-submit" class="btn btn-primary w-25">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>