<?php 
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "logintest";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name) or die ("Connection to database failed ".mysqli_connect_error());
?>

<!-- CREATE TABLE users (
	id int(10) AUTO_INCREMENT,
    username varchar(255),
    password varchar(255),
    created_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); -->