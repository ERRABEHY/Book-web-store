
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
    <a href="indexe.php"><img decoding="async" class="logo" src="images/booklogo.png" alt="" /></a>     
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
  <fieldset>
  <table border="1">
        <thead >
           <tr>
               <td>Nbr</td>
               <td>Book</td>
               <td>From</td>
               <td>Cost</td>
               <td>For</td>
               <td>So</td>
           </tr>
        </thead>
        <tbody>
                <?php
                  require "includes/data.php";
                  session_start();
                  $user=$_SESSION['sessionUser'];
                  $sql="SELECT * FROM  client_request WHERE boolen='false' AND client='$user'";
                  $query=mysqli_query($connect,$sql);
                  $counter=1;
                  while ($row_request=mysqli_fetch_array($query)){
                    echo $book=$row_request['Product'];
                    $result=mysqli_query($connect,"SELECT price,Authors FROM materiel WHERE Products='$book'");
                    $row_product=mysqli_fetch_array($result);
                    $sum=$row_product['price']* $row_request['Quantity'];
                    ?>
                    <tr>
                      <td><?php echo $counter?></td>
                      <td class="product"><?php echo $row_request['Product']?></td>
                      <td class="authors">by <?php echo $row_product['Authors']?></td>
                      <td class="money"><?php echo $sum ?>$</td>
                      <td><?php echo $row_request['Quantity']?></td>
                      <td>
                        <form action="modifiy.php" method="POST">
                              <input type="hidden" name="Product" value="<?php echo $row_request['Product']; ?>">
                              <button type="submit" name="delete" >D</button>
                              <button type="submit" name="Valide" >V</button>
                            </form>
                      </td>
                    </tr>
                       <?php
                        $counter++;
                    }
                ?>
        </tbody>
    </table>
</div>
</fieldset>
<br>


  <style>
    /* Start Variables */
    :root {
      --main-color: #10cab7;
    --secondary-color: #00FFCA;
    --section-padding: 60px;
    --section-background: #f6f6f6;
    --main-duration: 0.5s;
  }
  /* End Variables */
  body {
    font-family: "Work Sans", sans-serif;
  }

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
  table{
    width: 100%;
    text-align: center;
    border: 0px;
    border-spacing: 10px;
}
.product {
  color: black;
  text-transform: uppercase;
  font-weight: 600;
}
.authors {
  color: black;
  opacity: 0.8;
  font-size: 75%;
  text-transform: uppercase;
}
.money {
  color: black;
  text-transform: uppercase;
  font-weight: 600;
}
table td {
    text-align: center;
    padding: 9px;
    border: 0px;
    border-bottom: 1px solid var(--secondary-color);
    text-transform: uppercase;
}
button {
  width: 30px;
  height: 30px;
  border-radius: 20px;
  border: 0px;
  background-color: var(--main-color);
  color: var(--secondary-color);
}
  </style>
</body>
</html>