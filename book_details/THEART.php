<?php

session_start();
require "../includes/data.php";
$sql="SELECT * FROM materiel WHERE ID=2 ";
   $query=mysqli_query($connect,$sql);
   while($row=mysqli_fetch_array($query,MYSQLI_BOTH)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/370cac0bc0.js" crossorigin="anonymous"></script>

    <title> THE ART OF LIFE</title>
</head>
<body>

    <img class="imagebook" src="../images/book.jpg" alt="imagebook">
     <div>


        <form action="48laws-inc.php" method="post" >
    
                <h1><?php echo  $row['Products'] ?></h1>
                <input type="hidden" name="ID" value="<?PHP echo $row['Products']?>" >
                <h6> by <?php echo  $row['Authors'] ?></h6>
                <h2><?php echo $row['price'] ?>$</h2>
                <label for="nbr">how much ? </label>
                <input type="number" name="Quantity" id="nbr" class="number">
                <button type="submit" name="add to cart " onclick="addToCart()">Add to card</button>
                <h2>Description:</h2>
                <p><?php echo  $row['features'] ?></p>
        </form>
        
    <!-- <iframe name="page" style="display:none;"></iframe> -->
     </div>

     <?php } ?>
     <style>
    body {
        margin: 10px;
    }
     div {
     margin-left: 350px;
     padding: 10px;
     }
     .number {
        width: 30px;
     }
    img {
        width: 300px;
        float: left;
    }

</style>