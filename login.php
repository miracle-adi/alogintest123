<?php 

session_start();
include("config.php");

if(isset($_POST['log_form'])){
    $theusername = mysqli_real_escape_string($conn, $_POST['uname']);
    $thepassword = mysqli_real_escape_string($conn, $_POST['pword']);

    $sql = "SELECT * FROM users WHERE username = '$theusername'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    echo "here1";
    if($count == 1){
        echo "here2";
        $rows = mysqli_fetch_assoc($result);
        if(password_verify($thepassword, $rows['password'])){
            echo "here3";
            $_SESSION['logged_user'] = $theusername;
            header("location: welcome.php");
        }
    }else{
        echo "Your credentials is invalid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <a href="register.php">Register Here!</a>
    <form action="login.php" action="POST">
        <label for="">Username: </label>
        <input type="text" name="uname">
        <label for="">Password: </label>
        <input type="text" name="pword">
        <input type="submit" name="log_form" value="Login">
    </form>
</body>
</html>