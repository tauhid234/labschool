<?php
$servername = "localhost";
$username = "u1027896_visitor";
$password = "do2Quu6eejiepuk9veep";
$dbname = "u1027896_counter";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connected successfully";*/
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>