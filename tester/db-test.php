<?php
$servername = "localhost";
$username = "Mario";
$password = "nhTj98hgH6a6RFAy";

try {
    $conn = new PDO("mysql:host=$servername;dbname=nti-blogg-db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>