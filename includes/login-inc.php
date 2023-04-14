<?php

if (isset($_POST['submit'])) {

    require 'data.php';

    $username = $_POST['User_Name'];
    $password = $_POST['Password'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM client WHERE Full_Name = ?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['Password']);
                if ($passCheck == false) {
                    header("Location: ../loginb.html?error=wrongpass");
                    exit();
                } elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['Full_Name'];
                    $_SESSION['userpage']='';
                    header("Location: ../indexe.php?success=loggedin");
                    exit();
                } else {
                    header("Location: ../loginb.html?error=wrongpass");
                    exit();
                }
            } else {
                header("Location: ../loginb.html?error=nouser");
                exit();
            }
        }
       }  
        {
                header("Location: ../loginb.html?error=accessforbidden");
                exit();
            }


}
?>
     
