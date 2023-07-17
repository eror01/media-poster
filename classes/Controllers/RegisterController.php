<?php

class RegisterController extends Register {

  private $errors = array();

  private function validateEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->errors[] = 'Email invalid. Please enter a valid email!';
    }
    return $this->errors;
  }

  private function validatePassword($password) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      $this->errors[] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }
    return $this->errors;
  }

  private function passwordsMatch($password, $cpassword) {
    if($password !== $cpassword)  {
      $this->errors[] = 'Passwords do not match!';
    }
    return $this->errors;
  }

  private function emailAlreadyExists($email) {
    if(!$this->getUserEmail($email))  {
      $this->errors[] = 'Email is already in use. Please try another email!';
    }
    return $this->errors;
  }

  public function createUser($email, $password, $firstName, $lastName, $cpassword) {
    if($this->validateEmail($email) == false) {}
    if($this->emailAlreadyExists($email) == false) {}
    if($this->passwordsMatch($password,$cpassword) == false) {}
    if($this->validatePassword($password) == false) {}
    if(count($this->errors) > 0) {
      foreach($this->errors as $error) {
        echo '<div class="alert alert-danger mb-0" role="alert">'
          . $error . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    } else {
      $this->setUser($email, $password, $firstName, $lastName);
      header("Location: login.php?stmt=success");
    }
  }
}