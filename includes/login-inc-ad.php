<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // form has been submitted
    // process form data here
//   }
if (isset($_POST['submit'])) {

    require 'data.php';

    $username = $_POST['User_Name'];
    $password = $_POST['Password'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM administrator WHERE USERNAME = ?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                // $passCheck = password_verify(, );
                if ($password !== $row['PASSWORD']) {
                    header("Location: ../logina.html?error=wrongpass3");
                    exit();
                } elseif ($password === $row['PASSWORD']) {
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionuser'] = $row['USERNAME'];
                    header("Location:../administrator.php");
                    exit();
                } 
            } else {
                header("Location: ../logina.php?error=nouser");
                exit();
            }
        }
       }  
        {
                header("Location: ../logina.php?error=accessforbidden");
                exit();
            }


}
?>
     
