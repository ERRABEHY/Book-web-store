<?php
require "includes/data.php";

$var=$_GET['id'];
$sql="SELECT * FROM materiel  WHERE ID = $var";
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

    <title><?php echo  $row['Products'] ?></title>
</head>
<body>
    <!-- Start Header -->
  <div class="header">
    <div class="container">
      <a href="indexe.php"><img decoding="async" class="logo" src="images/booklogo.png" alt="" /></a>
      <div class="links">
        <span class="icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <ul>
          <li><a href="#Product">Product</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <?php
          session_start();
          if(isset($_SESSION['userpage'])){
            echo '<li><a href="validation.php" >Checkout</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
          }
          else { ?>
          <p class="ad"><a href="logina.html">AD</a></p>
          <p class="ad"><a href="loginb.html">USER</a></p>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Header -->
  <!-- start product -->
    <div class="products">
        <div class="container">
            <div class="imagebook">
               <img src="images/<?php echo $row['Photo'] ?>" alt="">
            </div>
               <div class="side">
               <form action="includes/insert_request.php" method="post" >
                  <h1><?php echo  $row['Products'] ?></h1>
                    <input type="hidden" name="Product" value="<?php echo $row['Products']?>" >
                    <h6> by <?php echo  $row['Authors'] ?></h6>
                    <h2><?php echo $row['price'] ?>$</h2>
                    <div><label for="nbr"> </label>
                    <input type="number" name="Quantity" id="nbr" value="1" class="number"></div>
                    <button type="submit" name="add to cart " onclick="addToCart()">Add to card
                      </button>
                 </form>
                       <p class="description"><?php echo  $row['features'] ?> Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
               </div>
        </div>
        </div>
        <!-- Start Footer -->
  <div class="footer">&copy; 2021 <span>bookstore</span> All Right Reserved</div>
  <!-- End Footer -->
    
      <!-- end product -->
   <?php
   
   }

   ?>
<script>
     	function addToCart() {
			if (confirm("Do you want to continue ?")) {
				window.location.href = "includes/insert_request.php";
			} 
		}
</script>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Work Sans", sans-serif;
    }
 
 /* Start Header */
 :root {
    --main-color: #10cab7;
    --secondary-color: #2c4755;
    --section-padding: 60px;
    --section-background: #f6f6f6;
    --main-duration: 0.5s;
  }
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
  /* End Header */
  .products {
      margin-bottom: 20px;
    }
    .products .container {
        max-width: 75%;
        margin: auto;
        margin-top: 5%;
        background-color: white;
		    box-shadow: 3px 3px 15px 5px black;
        display: flex;
        justify-content: space-between;

    }
    .side,.imagebook {
        width: 50%;
    } 
    .container img {
        margin: 0px;
        width: 100%;
       
    } 
    .side{
        padding: 16px;
        margin: 30px 20px  ;
    }

.products .container h1 {
        color: black;
        font-size: xx-large;
        text-transform: uppercase;
        margin:  10px   10px  10px  0px;
     }
     .products .container h6 {
        margin: 3px 3px 10px 0px;
        font-size: 15px;
        color: #454545;
        opacity: 0.7;
     }
     .products .container h2 {
        margin: 20px 20px 20px 0px;
        color: var(--main-color);
        font-size: 40px;
     }
     #nbr {
        margin-left: 5px;
        width: 40px;
        height: 40px;
        padding: 0px;
     }

     button {
        margin: 20px 20px 20px 0px;
        border-radius: 20px;
        width: 150px;
        height: 40px;
        background-color: var(--secondary-color);
        color: var(--main-color);
        border: 0px;
     }
     button:hover {
        background-color: var(--main-color);
        color: var(--secondary-color);
        box-shadow: 0 0 5px var(--main-color),
              0 0 25px var(--main-color),
              0 0 50px var(--main-color);
     }

    .description {
        margin: 5px 5px 5px 0px ;
        line-height: 30px;
        opacity: 0.7;
        
     }
     @media (max-width: 767px) {
      .products {
      margin-bottom: 10px;
    }
    .products .container {
        max-width: 75%;
        margin-top: 5%;
        background-color: white;
		    box-shadow: 3px 3px 15px 5px black;
    }
      .side{
        padding: 10px;
        margin: 10px 5px ;
      }
      .products .container h1 {
        color: black;
        font-size: large;
        text-transform: uppercase;
        margin:  0px   8px  8px  0px;
     }
     .products .container h6 {
        margin: 3px 3px 10px 0px;
        font-size: 12px;
        color: #454545;
        opacity: 0.7;
     }
     .products .container h2 {
        margin: 10px 10px 10px 0px;
        color: var(--main-color);
        font-size: 30px;
     }
     #nbr {
        margin-left: 5px;
        width: 40px;
        height: 40px;
        padding: 0px;
     }
     button {
        margin: 20px 20px 20px 0px;
        border-radius: 20px;
        width: 120px;
        height: 30px;
        background-color: var(--secondary-color);
        color: var(--main-color);
        border: 0px;
     }
     .description {
        margin: 5px 5px 5px 0px ;
        line-height: 16px;
        opacity: 0.7;
        
     }
    }
     
    /* Start Footer */
  .footer {
    margin-top: 10px;
    background-color: var(--secondary-color);
    color: white;
    padding: 20px 10px;
    text-align: center;
    font-size: 18px;
  }
  .footer span {
    font-weight: bold;
    color: var(--main-color);
  }
  /* End Footer */

</style>
</body>
</html>