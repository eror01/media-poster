<?php 
if(isset($_POST['user-avatar-save'])) {
  $user_avatar = $_FILES['user-avatar']['name'];
  $user_avatar_temp = $_FILES['user-avatar']['tmp_name'];
  move_uploaded_file($user_avatar_temp, "./images/$user_avatar");
  $user->saveUserInfoAvatar($user_avatar, $userID);
  header("Location: u?uid={$userID}");
} ?>
<div class="user-avatar">
  <?php if($user_info_avatar) : ?>
    <img src="./images/<?php echo $user_info_avatar; ?>" alt="User Profile Image" id="user-avatar">
  <?php else : ?>
    <img src="./images/placeholder_user_default.png" alt="User Profile Image" id="user-avatar">
  <?php endif; ?>
  <?php if($userID === $user_info_uid) : ?>
    <a href="" data-bs-toggle="modal" data-bs-target="#userAvatar"></a>
  <?php endif; ?>
</div>

<div class="modal avatar-bg fade" id="userAvatar" tabindex="-1" aria-labelledby="userAvatar" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="user-avatar-form">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="user-avatar-container">
            <div class="avatar-container-placeholder">
              <div class="avatar-placeholder">
                <?php if($user_info_avatar) : ?>
                <img src="./images/<?php echo $user_info_avatar; ?>" class="avatar-image">
                <?php else : ?>
                  <img src="./images/placeholder_user_default.png" class="avatar-image">
                <?php endif; ?>
              </div>
            </div>
            <div class="user-avatar-buttons">
              <a onClick="triggerClick()" id="avatarDisplay"><i class="fa-solid fa-image"></i>Choose Photo</a>
              <input accept="image/png, image/jpeg" type="file" name="user-avatar" onchange="displayAvatar(this)" id="avatarImage" style="display: none;">
              <input type="submit" value="Save Photo" name="user-avatar-save" class="user-avatar-save">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>