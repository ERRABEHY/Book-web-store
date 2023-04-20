<?php
require "data.php";

if (isset($_POST['ADD']) && !empty($_POST['name'])&& !empty($_FILES['Photo']) ) {
    
    $image_type = $_FILES['Photo']['type'];
    $image_name = $_FILES['Photo']['name'];
    $image_tmpName = $_FILES['Photo']['tmp_name'];
    $name=$_POST['name'];
    $Author=$_POST['Author'];
    $description=$_POST['description'];
    $Price=$_POST['Price'];
    $Quantity=$_POST['Quantity'];

    $imageextension=explode('.',$image_name);
    $imageextension=strtolower(end($imageextension));

    $ourimage=uniqid();
    $ourimage='.'.$ourimage;
    move_uploaded_file($image_tmpName,'../images/'.$ourimage);


    $sql="SELECT * FROM materiel WHERE Products=?";
    $stmt=mysqli_stmt_init($connect);
    
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../administrator.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowcounter=mysqli_stmt_num_rows($stmt);

        if ($rowcounter > 0) {
            header("location:../administrator.php?error=sqlerror");
            exit();
        }else{
            $sql="INSERT INTO materiel (Products, Authors, features, Price, Photo, Qty ) values (?,?,?,?,?,?)";
            $stmt=mysqli_stmt_init($connect);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("location:../administrator.php?error=sqlerror2");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"ssssss", $name, $Author, $description, $Price, $ourimage, $Quantity);
                mysqli_stmt_execute($stmt);
                header("location:../administrator.php?success");

            }

        }
    }

}else{
    header("location:location:../administrator.php?error=empty filed");
}
?>