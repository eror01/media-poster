<?php 
include "header.php"; 
if(isset($_GET['stmt'])) {
  $status = $_GET['stmt'];
  if($status == 'success') {
    echo '<div class="alert alert-success mb-0" role="alert">You have successfully registered!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
} 
if(isset($_POST['login-submit'])) {
  $login_email = $_POST['login-email'];
  $login_password = $_POST['login-password'];
  
  $userLogin = new LoginController();
  $userLogin->loginUser($login_email, $login_password);
} 

?>

<section class="page-login">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h2>Welcome to Poster</h2>
        <form action="" method="POST" class="page-login-form">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login-email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="login-password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-group text-end mt-4">
            <input type="submit" value="Sign In" name="login-submit" class="btn btn-dark w-100">
          </div>
        </form>
        <div class="page-login-other">
          <p>OR</p>
          <a href="register" class="btn btn-primary w-100">Join Now</a>
        </div>
      </div>
      <div class="col-6">
        <div class="login-background">
          <img src="./images/people_talking.png" alt="People Talking">
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
include "footer.php"; 