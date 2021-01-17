<?php
error_reporting(1);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "wdriver";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
global $conn;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $query = "SELECT * FROM settings";
    $rs = $conn->query($query);
    $rows = array();
    while($r = $rs->fetch_assoc()) {
        $rows[$r['westheme_key']] = $r['westheme_value'];
    }
    $json = json_encode($rows);
    $settings = json_decode($json);
}