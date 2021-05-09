<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    require '../libs/sessions.php';
    $user_id = (new Sessions)->get('user_login');
    $sql = "DELETE FROM `user` WHERE `user_id`=$user_id";
    if ($conn->exec($sql)) {
        (new Sessions)->destroy();
        echo $user_id;
        Header("Location: ./");
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
