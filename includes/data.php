<?php
$connect=mysqli_connect("localhost","root","","books_db");

if (!$connect) {
    die("connection failed".mysqli_connect_errno());
}

?>