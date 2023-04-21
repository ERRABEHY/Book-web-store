<!DOCTYPE html>
<html lang="en">
<body>
    

<?php 
require "includes/data.php";
if (isset($_POST['del'])) {
    $Product=$_POST['del'];
    mysqli_query($connect,"DELETE FROM materiel WHERE Products = '$Product' ");
    header("location:user.php?id=square");
}elseif(isset($_POST['modify'])) {
    $our_book=$_POST['modify'];
    $result=mysqli_query($connect,"SELECT * FROM materiel WHERE Products='$our_book'");
    $row=mysqli_fetch_array($result);
    ?>
        <form action="includes/add_product.php" method="post" enctype="multipart/form-data" >
            <div>
                <label for="Photo">Product Photo:</label>
                <input type="file" name="Photo" id="Photo" value="../images/<?php echo $row['Photo'] ?>" accept="image/*" require>
            </div>
            <div>
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $row['Products'] ?>" placeholder="<?php echo $row['Products'] ?>" readonly >
            </div>
            <div>
                <label for="Author">Author Name:</label>
                <input type="text" name="Author" value="<?php echo $row['Authors'] ?> "id="Author">
            </div>
            <div>
                <label for="description">Product description:</label>
                <input type="text" name="description" value="<?php echo $row['features'] ?>" id="description">
            </div>
            <div>
                <label for="Price">Product Price:</label>
                <input type="text" name="Price" value="<?php echo $row['price'] ?>" id="Price" >
            </div>
            <div>
                <label for="Quantity">Product Quantity:</label>
                <input type="text" name="Quantity" value="<?php echo $row['Qty'] ?>" id="Quantity" >
            </div> 
            <input type="submit" name="Modify" value="Modify" id="send" >
        </form>
    <?php
}else{

        ?>
        <form action="includes/add_product.php" method="post" enctype="multipart/form-data" >
            <div>
                <label for="Photo">Product Photo:</label>
                <input type="file" name="Photo" id="Photo" accept="image/*" require>
            </div>
            <div>
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" require>
            </div>
            <div>
                <label for="Author">Author Name:</label>
                <input type="text" name="Author" id="Author">
            </div>
            <div>
                <label for="description">Product description:</label>
                <input type="text" name="description" id="description">
            </div>
            <div>
                <label for="Price">Product Price:</label>
                <input type="text" name="Price" id="Price" >
            </div>
            <div>
                <label for="Quantity">Product Quantity:</label>
                <input type="text" name="Quantity" id="Quantity" >
            </div> 
            <input type="submit" name="ADD" value="ADD" id="send" >
        </form>
        <?php 
}
    ?>  
<style>
     body {
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 90vh;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            form {
                border-radius: 8px;
                padding: 20px 10px 20px 10px ;
                border: 2px solid black;
            }
            h1 {
            text-align: center;
            font-size: xx-large ;
            }
            form:hover {
                box-shadow: 3px 3px 3px black;
            }
            form input:hover {
                background-color: black;
                color: white;
                transition: 0.5s;
            }
            form  input {
            margin: 6px;
            }
            #send {
                background-color: black;
                color: white;
                width: 100%;
                height: 40px;
                margin: 0px;
                border-radius: 8px;
                text-align: center;
                font-size: x-large ;
                font-weight: 600;
            }
</style>
</body>
</html>