<?php
class connect
{
    public $conn = '';
    function db_connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sample";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'aksdhkashdkjahsdkashkjda';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
