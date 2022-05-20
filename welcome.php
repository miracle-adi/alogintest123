<?php 
session_start();
include("config.php");

$ses_user = $_SESSIOn['logged_user'];

$ses_sql = "SELECT username FROM users WHERE username = '$ses_user'";
$result = mysqli_query($conn, $ses_sql);
$rows = mysqli_fetch_assoc($result);
$user_name = $rows['username'];

if(!isset($ses_user)){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome 
    <?php echo "$user_name"; ?>
    </h1>
    <a href="logout.php">Log Out</a>
</body>
</html>