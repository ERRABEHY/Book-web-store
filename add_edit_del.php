<!DOCTYPE html>
<html lang="en">
<body>
    

<?php 
require "includes/data.php";

if (isset($_POST['Add_Product'])) {
    ?>
    <form action="includes/add_product.php" method="post" enctype="multipart/form-data" >
        <div>
            <label for="Photo">Product Photo:</label>
            <input type="file" name="Photo" id="Photo" accept="image/*">
        </div>
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name">
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
            <input type="text" name="Price" id="Price">
        </div>
        <div>
            <label for="Quantity">Product Quantity:</label>
            <input type="text" name="Quantity" id="Quantity">
        </div> 
        <input type="submit" name="ADD" value="ADD" id="send" >
    </form>
    <?php 
}
if (isset($_POST['Edit_Product'])) {
    $sql="SELECT * FROM materiel ";
    $query=mysqli_query($connect,$sql);
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