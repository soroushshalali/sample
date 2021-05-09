<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

$email = trim($_POST['email']);
$pass = trim($_POST['pass']);

if (empty($email) || empty($pass)) {
    die('ASasSasSsadasd');
}
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `user_id`, `email` FROM `user` WHERE `email` = '$email' AND `pass` ='$pass' LIMIT 1;";
    $sth = $conn->prepare($sql);
    $sth->execute();
    $fetch_data = $sth->fetchAll(PDO::FETCH_ASSOC);
    if (empty($fetch_data)) {
        echo "usr not found. please turn back and try again." . "<a href='#'>Back</a>";
    } else {
        $user_id = $fetch_data[0]['user_id'];
        require '../libs/sessions.php';
        (new Sessions)->set("user_login", $user_id);
        Header("Location: ./../panel.php");
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
