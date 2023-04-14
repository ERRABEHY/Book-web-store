
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
</head>
<body>
      <!-- Start Header -->
  <div class="header">
    <div class="container">
    <a href="indexe.php"><img decoding="async" class="logo" src="images/logo.png" alt="" /></a>
      <div class="links">
        <span class="icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <ul>
          <li><a href="indexe.php">Home</a></li>
          <li><a href="#Product">Product</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="logout.php">log out</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Header -->
  <?php
require "includes/data.php";


$sql="SELECT * FROM  client_request WHERE boolen='false'";
$query=mysqli_query($connect,$sql);

while ($row=mysqli_fetch_array($query,MYSQLI_BOTH)) {
  ?>
  <fieldset>
  <?php
  echo $row['Product'] .'<br>'.$row['Quantity'].'<br>';
  ?>
<form action="delete.php" method="POST">
            <input type="hidden" name="Product" value="<?php echo $row['Product']; ?>">
            <button type="submit" name="delete" >Delete</button>
            <button type="submit" name="Valide" >Valide</button>
          </form>
          
</fieldset>
<br>
<!-- onclick="return confirm('Are you sure you want to delete this request?')" -->
  <?php
}?>
  <style>
    /* Start Variables */
    :root {
    --main-color: #10cab7;
    --secondary-color: #2c4755;
    --section-padding: 60px;
    --section-background: #f6f6f6;
    --main-duration: 0.5s;
  }
  /* End Variables */
  /* Start Global Rules */
  * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  html {
    scroll-behavior: smooth;
  }
  body {
    font-family: "Work Sans", sans-serif;
  }
  .container {
    padding-left: 15px;
    padding-right: 15px;
    margin-left: auto;
    margin-right: auto;
  }
  /* Small */
  @media (min-width: 768px) {
    .container {
      width: 750px;
    }
  }
  /* Medium */
  @media (min-width: 992px) {
    .container {
      width: 970px;
    }
  }
  /* Large */
  @media (min-width: 1200px) {
    .container {
      width: 1170px;
    }
  }
  /* End Global Rules */
  /* Start Components */
  .special-heading {
    color: #ebeced;
    font-size: 100px;
    text-align: center;
    font-weight: 800;
    letter-spacing: -3px;
    margin: 0;
  }
  .special-heading + p {
    margin: -30px 0 0;
    font-size: 20px;
    text-align: center;
    color: #797979;
  }

  /* End Components */
 /* Start Header */
  
 .header {
    padding: 9px;
  }
  
  .header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .header .logo {
    width: 100px;
    margin: -10px;
  }
  .header .links ul  {
    margin-bottom: -15px;
    list-style: none;
    display: flex;
    float: right;
  }
  .header .links ul p {
    margin-left: 5px;
    margin-top: -9px;
    padding: 5px; 
    border: 5px solid #2c4755 ;
    background-color: #2c4755 ;
    border-radius: 19px;
    text-decoration: none;
    }
    .header .links ul p a {
      padding: 5px;
      text-decoration: none;
      color: #10cab7;
    }
  .header .links ul .ad:hover {
    padding: 5px;
    border: 5px solid aqua ;
    background-color: aqua ;
  }
  .header .links ul li a {
    margin: 20px;
    color: #10cab7;
    text-decoration: none;
  }
  .header .links ul li a:hover {
    color: black;
    transition: var(--main-duration);
  }
  @media (max-width: 767px) {
    
    .header .links {
      position: relative;
    }
    .header .links:hover .icon span:nth-child(2) {
      width: 100%;
    }
    .header .links .icon {
      width: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-end;
    }
    .header .links .icon span {
      background-color: #333;
      margin-bottom: 5px;
      height: 2px;
    }
    .header .links .icon span:first-child {
      width: 100%;
    }
    .header .links .icon span:nth-child(2) {
      width: 60%;
      transition: var(--main-duration);
    }
    .header .links .icon span:last-child {
      width: 100%;
    }
    .header .links ul {
      list-style: none;
      margin: 0;
      padding: 0;
      background-color: #f6f6f6;
      position: absolute;
      right: 0;
      min-width: 200px;
      top: calc(100% + 15px);
      display: none;
      z-index: 1;
    }
    .header .links ul::before {
      content: "";
      border-width: 10px;
      border-style: solid;
      border-color: transparent transparent #f6f6f6 transparent;
      border-radius: 15px;
      position: absolute;
      right: 5px;
      top: -20px;
    }
    .header .links:hover ul {
      display: block;
      border-radius: 15px;
    }
    .header .links ul li a {
      display: block;
      padding: 5px;
      text-decoration: none;
      color: #333;
      transition: var(--main-duration);
    } 
    .header .links p .ad { 
      padding: 5px;
      background-color: transparent;
      text-decoration: none;
      transition: var(--main-duration);
      }
      .header .links ul p:hover a {
        padding-left: 45px;
        transition: var(--main-duration);
      }
    .header .links ul li a:hover {
      padding-left: 25px;
    }
    .header .links ul li:not(:last-child) a {
      border-bottom: 1px solid #ddd;
    }
  }
  </style>
</body>
</html>