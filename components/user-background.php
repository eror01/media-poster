<?php 
if(isset($_POST['bg-save'])) {
  $user_bg = $_FILES['hero-background']['name'];
  $user_bg_temp = $_FILES['hero-background']['tmp_name'];
  move_uploaded_file($user_bg_temp, "./images/$user_bg");
  $user->saveUserInfoBgImage($user_bg, $userID);
  header("Location: u?uid={$userID}");
} ?>
<div class="user-background">
  <?php if($user_info_bg) : ?>
    <img src="./images/<?php echo $user_info_bg; ?>" alt="Big Background Image">
  <?php else : ?>
    <img src="./images/image_placeholder.jpg" alt="Big Background Image">
  <?php endif; ?>
  <?php if($userID === $user_info_uid) : ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userBackground"><i class="fa-regular fa-pen-to-square"></i></button>
  <?php endif; ?>
</div>

<div class="modal hero-bg fade" id="userBackground" tabindex="-1" aria-labelledby="userBackground" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="user-image-form">
        <form action="" method="POSt" enctype="multipart/form-data">
          <div class="user-bg-hero">
            <div class="bg-placeholder">
              <?php if($user_info_bg) : ?>
                <img src="./images/<?php echo $user_info_bg; ?>" alt="" class="bg-hero">
              <?php else : ?>
                <img src="./images/placeholder_user_default.png" alt="" class="bg-hero">
              <?php endif; ?>
            </div>
            <div class="user-image-file">
              <input accept="image/png, image/jpeg" type="file" name="hero-background" onchange="displayImage(this)">
              <input type="submit" value="Save Background" name="bg-save">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>