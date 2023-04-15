<?php
session_start();

if (isset($_POST['submit'])) {
    //Add database connection
    require 'data.php';

    $username = $_POST['User_Name'];
    $Email = $_POST['Email'];
    $password = $_POST['Password1'];
    $confirmPass = $_POST['Password2'];

    if (empty($Email) || empty($username) || empty($password) || empty($confirmPass)) {
        header("Location: ../register.php?error=emptyfields&username=".$username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        header("Location: ../register.php?error=invalidusername&username=".$username);
        exit();
    } elseif($password !== $confirmPass) {
        header("Location: ../register.php?error=passwordsdonotmatch&username=".$username);
        exit();
    }

    else {
        $sql = "SELECT Email FROM client WHERE Email = ?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signupb.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $Email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: ../signupb.php?error=usernametaken");
                exit();
            } else {
                $sql = "INSERT INTO client (Email,Full_Name, Password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signupb.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss",$Email, $username, $hashedPass);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['userpage']='';
                    $_SESSION['sessionUser'] = $row['username'];

                        header("Location: ../indexe.php?succes=registered");
                        exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
