<div class="nav-top shadow-sm py-3 mb-5 bg-body">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="navigation-body">
          <div class="navigation-logo">
            <img src="" alt="Logo">
          </div>
          <div class="navigation-form">
            <form action="" method="POST">
              <input type="search" name="" id="">
            </form>
          </div>
          <div class="navigation-pages">
            <ul>
              <li><a href="index"><i class="fa-solid fa-house"></i>Home</a></li>
              <li><a href=""><i class="fa-solid fa-briefcase"></i>Jobs</a></li>
              <li><a href=""><i class="fa-solid fa-users"></i>My Network</a></li>
              <li><a href=""><i class="fa-solid fa-bell"></i>Notification</a></li>
            </ul>
          </div>
          <div class="navigation-profile">
            <a href="u?uid=<?php echo $userID; ?>" class="navigation-circle-profile">
              <img src="./images/<?php echo $user_info_avatar; ?>" class="profile">
            </a>
            <a href="logout.php" class="navigation-profile-actions"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>