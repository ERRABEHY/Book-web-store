<?php
require 'data.php';

if (isset($_POST['submit'])) {

    $username = $_POST['User_Name'];
    $password = $_POST['Password'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql="SELECT * FROM administrator ";
        $query=mysqli_query($connect,$sql);
        $row=mysqli_fetch_array($query);
        if ($row['USERNAME'] == $username ) {
            if ($row['PASSWORD'] == $password ) {
               header("location:../administrator.php");
            }else{
                header("location:../logina.html?error=wrongpassword");
                exit;
            }
        }else{
            header("location:../logina.html?error=wrongusername");
            exit();
        }
    }
}
?>
     
