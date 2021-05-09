<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$first_name = trim($_GET['first_name']);
$last_name = trim($_GET['last_name']);
$email = trim($_GET['email']);
$pass = trim($_GET['pass']);
if (empty($email) || empty($pass) || empty($first_name) || empty($last_name)) {
  die('ASasSasSsadasd');
} else {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `pass`, `status`) 
    VALUES ('$first_name','$last_name','$email','$pass','1')";
    if ($conn->exec($sql)) {
      $last_id = $conn->lastInsertId();
      require '../libs/sessions.php';
      (new Sessions)->set('user_login', $last_id);
      header("Location: ../panel.php");
    }
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
}
