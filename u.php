<?php 
include "header.php"; 
$userInfoController = new UserInfoController();

if(isset($_POST['bg-save'])) {
  $user_bg = $_FILES['hero-background']['name'];
  $user_bg_temp = $_FILES['hero-background']['tmp_name'];
  move_uploaded_file($user_bg_temp, "./images/$user_bg");

  $userInfoController->saveUserInfoBgImage($userID, $user_bg);
}

?>

<div class="navigatio"><?php include "components/nav-top.php"; ?></div>
<div class="container">
  <section class="user">
    <div class="row">
      <div class="col-9">
        <div class="user-profile">
          <div class="user-main shadow-sm mb-2 bg-body">
            <div class="user-background">
              <img src="./images/image_placeholder.jpg" alt="Big Background Image">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i></button>
            </div>
            <div class="user-desc">
              <div class="user-avatar">
                <img src="" alt="User Profile Image">
              </div>
              <div class="user-info">
                <h1>User Name</h1>
                <h2>User Location</h2>
                <span>How Many Connections</span>
              </div>
              <a href="">Edit User Info</a>
            </div>
          </div>
          <div class="user-about shadow-sm p-3 mb-2 bg-body rounded">
            <h2>About</h2>
            <p>User About Information</p>
          </div>
          <div class="user-skills shadow-sm p-3 mb-2 bg-body rounded">
            <h2>Skills</h2>
            <a href="">Add Skills</a>
            <div class="user-skills_display">
              <span>Skill Name</span>
              <span>Likes</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="user-connections shadow-sm p-3 mb-5 bg-body rounded">
          People You May Know
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<?php 
include "footer.php"; 