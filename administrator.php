<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="container">
        <h3>You welcome Mr.<?php echo $_SESSION['sessionUser']; ?></h3>
            <form action="add_edit_del.php" method="post">
                <div class="button">
                    <button type="submit" name="Add_Product" value="Add_Product">Add Product</button>
                    <button type="submit" name="Edit_Product" value="Edit_Product">Edit Product</button>
                    <button type="submit" name="Delete_Product" value="Delete_Product">Delete Product</button>
                </div>
            </form>
            <a href="indexe.php">Home</a>
   </div>

<?php
?>
<style>
  .container {
    margin: 10px;
  }
  h3 {
    border: 3px solid black;
    text-align: center;
    margin: 0 5px ;
    padding: 10px;
  }
  button {
    margin-left: 5px;
    height: 60px;
    color: white;
    background-color: black;
    padding: 5px;
    width: 140px;
    font-weight: bold;
    font-size: medium;
    border-radius: 5px;
  }
  .button {
    margin: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  a{
    text-decoration: none;
    color: white;
    border: 5px solid black;
    padding: 5px;
    width: 100px;
    text-align: center;
    border-radius: 5px;
    background-color: black;
    position: absolute;
    top: 50%;
    left: 47%;
  }
</style>
</body>
</html>