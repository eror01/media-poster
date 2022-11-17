<?php
include "header.php"; 
if(isset($_POST['register_submit'])) {
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $user = new RegisterController();
  $user->createUser($email, $password, $firstName, $lastName, $cpassword);
} ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="registration-title"><h1>Join Poster</h1></div>
    </div>
    <div class="col-3">
      <div class="topics-platform shadow-sm p-3 bg-body rounded">
        Topics on our platform
      </div>
    </div>
    <div class="col-6">
      <section class="registration p-3 shadow-sm bg-body">
        <form action="" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Peter" name="first_name" required>
            <label for="floatingInput">First name</label>
            <div class="invalid-feedback">First Name is required!</div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Parker" name="last_name" required>
            <label for="floatingInput">Last Name</label>
            <div class="invalid-feedback">Last Name is required!</div>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
            <label for="floatingInput">Email address</label>
            <div class="invalid-feedback">Email is required!</div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="password" required>
            <label for="floatingInput">Password</label>
            <div class="invalid-feedback">Password is required!</div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="cpassword">
            <label for="floatingInput">Confirm Password</label>
          </div>
          <div class="form-group text-end mt-4">
            <input type="submit" value="Sign In" class="btn btn-secondary py-2 w-100" name="register_submit">
          </div>
        </form>
      </section>
    </div>
    <div class="col-3">
      <div class="comapnies-platform shadow-sm p-3 bg-body rounded">
        Companies on our platform
      </div>
    </div>
  </div>
</div>