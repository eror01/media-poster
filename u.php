<?php 
include "header.php";
$user = new UserInfoController(); 
$user->displayUserInfo($userID); ?>

<div class="navigatio"><?php include "components/nav-top.php"; ?></div>
<div class="container">
  <section class="user">
    <div class="row">
      <div class="col-9">
        <div class="user-profile">
          <?php
          include_once "components/user-main.php";
          include_once "components/user-about.php";
          include_once "components/user-skills.php"; ?>
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

<?php 
include "footer.php"; 