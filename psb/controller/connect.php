<?php
$servername = "localhost";
$username = "u1027896_ppsbb";
$password = "p5b@l4b5ch0ol";
$dbname = "u1027896_ppsbb2122";

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