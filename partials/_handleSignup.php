<?php
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $user_email =  $_POST['signupEmail'];
    $pass =  $_POST['signupPassword'];
    $cpass =  $_POST['signupcPassword'];

    //check wheather this username is existing or not.
    $existsql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
    $result = mysqli_query($conn,$existsql);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0) {
        $showError = "Email is already use by other.";
    }
    else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT); 
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                $showAlert = true;
                header("location: /forum/index.php?signupsuccess=true");
                exit();
            }

        } else {
            $showError = "Password doesn't match.";
        }
    }
    header("location: /forum/index.php?signupsuccess=$showError");
}

?>