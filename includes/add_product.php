<?php
require "data.php";

if (isset($_POST['ADD']) && !empty($_FILES['Photo'])) {
    $photo= file_get_contents($_FILES['Photo']['tmp_name']);
    $image_type = $_FILES['image']['type'];
    $name=$_POST['name'];
    $Author=$_POST['Author'];
    $description=$_POST['description'];
    $Price=$_POST['Price'];
    $Quantity=$_POST['Quantity'];

    $sql="SELECT * FROM materiel WHERE Products=?";
    $stmt=mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:add_edit_del.php?error=sqlerror1");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowcounter=mysqli_stmt_num_rows($stmt);

        if ($rowcounter > 0) {
            header("location:add_edit_del.php?error=sqlerror");
            exit();
        }else{
            $sql="INSERT INTO materiel (Products, Authors, features, Price, Photo, Qty ) values (?,?,?,?,?,?)";
            $stmt=mysqli_stmt_init($connect);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("location:add_edit_del.php?error=sqlerror2");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"ssssss", $name, $Author, $description, $Price, $photo, $Quantity);
                mysqli_stmt_execute($stmt);
                header("location:../administrator.php?success");

            }

        }
    }

}
?>