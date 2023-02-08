<?php 
include "header.php"; ?>

<div class="navigation"><?php include "components/nav-top.php"; ?></div>
<div class="container">
  <section class="user">
    <div class="row">
      <div class="col-9">
        <div class="user-profile">
          <?php
          include_once "components/user-main.php";
          include_once "components/user-about.php";
          include_once "components/user-activity.php";
          include_once "components/user-skills.php"; ?>
        </div>
      </div>
      <div class="col-3">
        <?php include_once "components/user-sidebar.php"; ?>
      </div>
    </div>
  </section>
</div>

<?php 
include "footer.php"; 