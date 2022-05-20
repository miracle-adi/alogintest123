<?php 
session_start();
include("config.php");

$theusername = "";
$errors = array();
if(isset($_POST['reg_form'])){
    $theusername = mysqli_real_escape_string($conn, $_POST['uname']);
    $thepassword = mysqli_real_escape_string($conn, $_POST['pword']);

    if(empty($theusername)){array_push($errors, "Username field empty");}
    if(empty($thepassword)){array_push($errors, "Password field empty");}

    $sql = "SELECT * FROM users WHERE username = '$theusername'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);

    if($rows){
        if($theusername === $rows['username']){
            array_push($errors, "Username exists, Enter a new username");
        }
    }
    if(count($errors) == 0){
        $en_password = password_hash($thepassword, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password)
                VALUES ('$theusername', '$en_password')";
        mysqli_query($conn, $sql);
        $_SESSION['logged_user'] = $theusername;
        header("location: welcome.php");
    }else{
        if(count($errors) > 0){
            foreach ($errors as $error){
                echo $error."<br>";
            }
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register Form</h1>

    <form action="register.php" method="post">
        <label for="">Username: </label>
        <input type="text" name="uname">
        <label for="">Password: </label>
        <input type="text" name="pword">
        <input type="submit" name="reg_form" value="Register">
    </form>

    <a href="login.php">Back to Login Form</a>
</body>
</html>