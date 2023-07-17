<?php 

class Db
{
  protected function connect()
  {
    try {
      $username = 'root';
      $password = '';
      $dbh = new PDO('mysql:host=localhost;dbname=media_poster;', $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      return $dbh;
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}