<?php
require "data.php";
session_start();
$book=$_POST['Product'];
$Quantity=$_POST['Quantity'];
$bol=false;

if (!$_SESSION['sessionUser']) {
    header("location:../signupb.html?error=you-aren't-connect-with-us");
}else{
    $user=$_SESSION['sessionUser'];
$sql = "SELECT * FROM client_request WHERE Product=?";
$stmt = mysqli_stmt_init($connect);
if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $book);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0) {
        header("Location:../validation.php?error=booktaken");
        exit();
    } else {
        $sql = "INSERT INTO client_request ( Product, client, Quantity ,boolen) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connect);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $book, $user, $Quantity, $bol);
            mysqli_stmt_execute($stmt);
                header("Location: ../validation.php?succes=data");
                exit();
        }
    }
}
}
mysqli_stmt_close($stmt);
mysqli_close($connect);
?>