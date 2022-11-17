<?php 
include "header.php"; 
if(isset($_SESSION['loggedIn']) && isset($_SESSION['userFirstName']) && isset($_SESSION['userLastName'])) {
  $loggedIn = $_SESSION['loggedIn'];
  $username = $_SESSION['userFirstName'] . $_SESSION['userLastName']; 
  echo $username;
}
?>

<div class="container">
  <div class="row">
    <div class="col-12"><?php include "components/nav-top.php"; ?></div>
  </div>
  <div class="row">
    <div class="col-3"><?php include "components/sidebar.php"; ?></div>
    <div class="col-6"><?php include "components/feed.php"; ?></div>
    <div class="col-3"><?php include "components/recommended.php"; ?></div>
  </div>
</div>

<?php 
include "footer.php";