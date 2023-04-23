<?php
require "includes/data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The books</title>
</head>
<body>

    <!-- Start Header -->
  <div class="header">
    <div class="container">   
     <div class="links">
        <span class="icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <ul>
          <li><a href="administrator.php">Home</a></li>
          <li><a href="user.php?id=circle">Users</a></li>
          <li><a href="user.php?id=square">Books</a></li>
          <li><a href="user.php?id=triangle">requests</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Header -->
  <?php 
  if ($_GET['id']=='circle') {
    ?>
    <div class="container">
    <h1>The Users </h1>
    <table border="1">
        <thead >
        <tr>
             <td colspan="3"> <h3>The last USERS</h3></td>
                </tr>
                <tr>
              <td>Nbr</td>
              <td>User Name</td>
              <td>Email</td>
            </tr>
            </thead>
            <tbody>
                    <?php
                     $result=mysqli_query($connect,"SELECT COUNT(ID) FROM client ");
                     $row_counter=mysqli_fetch_row($result);
                     $counter=$row_counter[0];
                     $sql="SELECT * FROM client ORDER BY ID DESC ";
                     $query=mysqli_query($connect,$sql);
                     if(mysqli_num_rows($query) > 0 ) {
                       while(  $row=mysqli_fetch_assoc($query)){
                           echo '<tr>'.
                                     '<td>'.  $counter.'</td>'.
                                     '<td>'. $row['Full_Name'].'</td>'.
                                     '<td>'. $row['Email'].'</td>'.
                                  '</tr>';
                                  $counter--;
                         }
                       }
                     ?>
        </tbody>
        </table>
</div>
<?php
  }
  if ($_GET['id']=='square') {
    ?>
    <div class="container">
    <table border="1">
         <thead >
         <tr>
                <td colspan="4"> 
                    <h3>The last books</h3>
                    <?php
                        $result=mysqli_query($connect,"SELECT COUNT(ID) FROM materiel ");
                        $row_counter=mysqli_fetch_row($result);
                        $counter=$row_counter[0];
                       $sql="SELECT * FROM materiel ORDER by ID  DESC ";
                       $query=mysqli_query($connect,$sql);
                        
                    ?>
                    <a href="add_edit_del.php?id=add"><button>+</button></a>
                 </td>
            </tr>
            <tr>
              <td>Nbr</td>
              <td>Books</td>
              <td>Price</td>
              <td>Quantity </td>
            </tr>
         </thead>
         <tbody>
                <?php
                 if(mysqli_num_rows($query) > 0 ) {
                    while(  $row=mysqli_fetch_assoc($query)){?>
                    <form action="add_edit_del.php" method="post">
                      <tr>
                           <td><?php echo $counter?> </td>
                            <td>
                                <?php echo $row['Products']?>
                                <button id="red" type="submit" name="del" value="<?php echo $row['Products']?>">-</button>
                                <button id="blue" type="submit" name="modify" value="<?php echo $row['Products']?>">M</button>
                           </td>
                            <td><?php echo $row['price']?>$</td>
                            <td><?php echo $row['Qty']?></td>
                        </tr>
                        
                           <?php
                        $counter--;
                    }
                  }
                ?>
                
                </form>
        </tbody>
         </table>
    </div>
    <?php
}
if ($_GET['id']=='triangle') {
  ?>
  <div class="container">
    <table border="1">
        <thead >
        <tr>
                    <td colspan="5"> <h3>The  last  requests</h3></td>
                </tr>
                <tr>
                  <td>Nbr</td>
                  <td>User Name</td>
                  <td>Book</td>
                  <td>Quantity</td>
                  <td>Total</td>
                </tr>
            </thead>
            <tbody>
                    <?php
                      $result=mysqli_query($connect,"SELECT COUNT(Product) FROM client_request  WHERE boolen=true  ");
                     $row_counter=mysqli_fetch_row($result);
                     $counter=$row_counter[0];
                    $sql="SELECT * FROM client_request WHERE boolen=true ORDER by Product DESC  ";
                    $query=mysqli_query($connect,$sql);
                    if(mysqli_num_rows($query) > 0 ) {
                      while(  $row=mysqli_fetch_assoc($query)){
                        $book=$row['Product'];
                        $reslt=mysqli_query($connect,"SELECT price FROM materiel WHERE Products='$book'");
                        $book_value=mysqli_fetch_array($reslt);
                          echo '<tr>'.
                                  '<td>'.  $counter.'</td>'.
                                  '<td>'. $row['client'].'</td>'.
                                    '<td>'. $row['Product'].'</td>'.
                                  '<td>'. $row['Quantity'].'</td>'.
                                  '<td>'. $row['Quantity']*$book_value['price'].'$</td>'.
                               '</tr>';
                                $counter--;
                        }
                      }
                    ?>
        </tbody>
    </table>
  </div>
  <?php
}
?>
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
    justify-content: center;
    align-items: center;
  }
  .header .links ul  {
    margin-bottom: -15px;
    list-style: none;
    display: flex;
    float: right;
  }
  .header .links ul li a {
    margin: 20px;
    color: #10cab7;
    text-transform: uppercase;
    text-decoration: none;
  }
  .header .links ul li a:hover {
    color: black;
    transition: var(--main-duration);
  }
  @media (max-width: 767px) {
    
    .header .links {
      position: relative;
      margin-left: 0px;
      
    }
    .header .links:hover .icon span:nth-child(2) {
      width: 100%;
    }
    .header .links .icon {
      width: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
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
    .header .links ul li a:hover {
      padding-left: 25px;
    }
    .header .links ul li:not(:last-child) a {
      border-bottom: 1px solid #ddd;
    }
  }

        #red {
            background-color: red;
        }
        #blue {
            background-color: blue;
            color: white;
        }
        button {
          background-color: #10cab7;
          color: #00FFCA;
          border: 0px;
          width: 30px;
          height: 30px;
          border-radius: 10px;
        }
table{
    width: 100%;
    text-align: center;
    border: 0px;
    border-spacing: 10px;
}
table td {
    text-align: center;
    padding: 9px;
    border: 0px;
    border-bottom: 1px solid black;
    text-transform: uppercase;
}
    </style>

</body>
</html>