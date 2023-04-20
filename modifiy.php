<?php


require "includes/data.php";
session_start();
$user=$_SESSION['sessionUser'];
if (isset($_POST['delete'])) {
    
    $Product = $_POST['Product'];
	mysqli_query($connect,"DELETE FROM client_request WHERE Product = '$Product' AND client='$user'");
    header("location:validation.php");
}

if (isset($_POST['Valide'])) {
    
    $Product = $_POST['Product'];
	mysqli_query($connect,"UPDATE client_request SET boolen=1  WHERE Product = '$Product' AND client='$user'");
    header("location:validation.php");
}
?>