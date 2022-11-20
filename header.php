<?php 
session_start();
include "includes/class_loader.php";
$pageName = basename($_SERVER['PHP_SELF'], '.php');
if(isset($_SESSION['loggedIn']) && isset($_SESSION['userFirstName']) && isset($_SESSION['userLastName'])) {
  $loggedIn = $_SESSION['loggedIn'];
  $username = $_SESSION['userFirstName'] . $_SESSION['userLastName']; 
  $userID   = $_SESSION['userID'];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Media Poster Platform</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/982187732a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body class="<?php echo $pageName; ?>">