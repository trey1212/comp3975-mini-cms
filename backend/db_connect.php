<?php

getenv('MYSQL_DBHOST') ? $db_host = getenv('MYSQL_DBHOST') : $db_host = "127.0.0.1";
getenv('MYSQL_DBPORT') ? $db_port = getenv('MYSQL_DBPORT') : $db_port = "3333";
getenv('MYSQL_DBUSER') ? $db_user = getenv('MYSQL_DBUSER') : $db_user = "root";
getenv('MYSQL_DBPASS') ? $db_pass = getenv('MYSQL_DBPASS') : $db_pass = "secret";
getenv('MYSQL_DBNAME') ? $db_name = getenv('MYSQL_DBNAME') : $db_name = "CMSDB";

$conn = new mysqli($db_host, $db_user, $db_pass, "", $db_port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql_db = "CREATE DATABASE IF NOT EXISTS $db_name";
if ($conn->query($sql_db) === TRUE) {
    $conn->select_db($db_name);
} else {
    die("Error creating database: " . $conn->error);
}
