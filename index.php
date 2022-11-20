<?php 
include "header.php"; ?>

<div class="navigatio">
  <?php include "components/nav-top.php"; ?>
</div>
<div class="container">
  <div class="row">
    <div class="col-3"><?php include "components/sidebar.php"; ?></div>
    <div class="col-6"><?php include "components/feed.php"; ?></div>
    <div class="col-3"><?php include "components/recommended.php"; ?></div>
  </div>
</div>

<?php 
include "footer.php";