<?php 
// Database configuration 
$dbHost     = "";
$dbport     = "";
$dbUsername = ""; 
$dbPassword = ""; 
$dbName     = ""; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}