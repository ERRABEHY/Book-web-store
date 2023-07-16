<?php 
session_start();
require "includes/data.php";
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/306813a8c1.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
  <!-- Start Header -->
     <div class="header">
        <h1>Dashboard</h1>
        <div class="link">
             <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
        </div>
     </div>
  <!-- End Header -->
        <div class="shapes">
          <div class="container">
            <div class="circle">
                <a href="user.php?id=circle">
                    <p>users</p>
                    <h3>
                    <?php
                        $query=mysqli_query($connect,"SELECT COUNT(ID) FROM client ");
                        $row=mysqli_fetch_row($query);
                        echo $row[0];
                      ?>
                    </h3>
                    </a>
              </div>
              <div class="square">
                <a href="user.php?id=square">
                  <p>books</p>
                  <h3>
                    <?php 
                    $query=mysqli_query($connect,"SELECT COUNT(ID) FROM materiel ");
                    $row=mysqli_fetch_row($query);
                    echo $row[0];
                    ?>
                  </h3>
                  </a>
              </div>
              <div class="triangle">
                 <a href="user.php?id=triangle">
                  <p>requests</p>
                  <h3>
                    <?php 
                    $query=mysqli_query($connect,"SELECT COUNT(Product) FROM client_request WHERE boolen=true ");
                    $row=mysqli_fetch_row($query);
                    echo $row[0];
                    ?>
                  </h3>
                  </a>
              </div>
              <div class="circle">
                <p>amount</p>
                <h3>
                <?php
                    $sum=0;
                      $query=mysqli_query($connect,"SELECT * FROM client_request WHERE boolen=true ");
                      while ( $row_request=mysqli_fetch_row($query)) {
                          $resul=mysqli_query($connect,"SELECT price FROM materiel WHERE Products='$row_request[0]'");
                          while ( $row_product=mysqli_fetch_array($resul)) {
                            $sum=$sum+($row_product['price']*$row_request[2]);
                          }
                      }
                      echo $sum;
                  ?>
                $</h3>
              </div>
          </div>
        </div>
        <hr>
        <div class="lasts">
          <div class="last_books">
          <table border="1">
         <thead >
            <tr>
                <td colspan="4"> <h3>The last books</h3></td>
            </tr>
            <tr>
              <td>Nbr</td>
              <td>Books</td>
              <td>Price</td>
              <td>Quantity</td>
            </tr>
         </thead>
         <tbody>
                <?php
                 $result=mysqli_query($connect,"SELECT COUNT(ID) FROM materiel ");
                     $row_counter=mysqli_fetch_row($result);
                     $counter=$row_counter[0];
                $sql="SELECT * FROM materiel ORDER by ID  DESC LIMIT 3";
                $query=mysqli_query($connect,$sql);
                if(mysqli_num_rows($query) > 0 ) {
                  while(  $row=mysqli_fetch_assoc($query)){
                      echo '<tr>'.
                            '<td>'.  $counter.'</td>'.
                            '<td>'. $row['Products'].'</td>'.
                            '<td>'. $row['price'].'$</td>'.
                            '<td>'. $row['Qty'].'</td>'.
                           '</tr>';
                        $counter--;
                    }
                  }
                ?>
        </tbody>
         </table>
         <a href="user.php?id=square"><p>...</p></a>
          </div>
          <div class="last_clients">

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
                     $sql="SELECT * FROM client ORDER BY ID DESC LIMIT 3";
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
                     <tr class="move" ><td colspan="3"> <a href="user.php?id=circle"><p>...</p></a></td></tr>

            </tbody>
            </table>
          </div>
          <div class="last_requests">
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
                    $sql="SELECT * FROM client_request WHERE boolen=true ORDER by Product DESC LIMIT 3 ";
                    $query=mysqli_query($connect,$sql);
                    if(mysqli_num_rows($query) > 0 ) {
                      while(  $row=mysqli_fetch_assoc($query)){
                        $book=$row['Product'];
                        $reslt=mysqli_query($connect,"SELECT price FROM materiel WHERE Products='$book'");
                        $book_value=mysqli_fetch_array($reslt);
                        $calc=$row['Quantity']*$book_value['price'];
                          echo '<tr>'.
                                  '<td>'.  $counter.'</td>'.
                                  '<td>'. $row['client'].'</td>'.
                                    '<td>'. $row['Product'].'</td>'.
                                  '<td>'. $row['Quantity'].'</td>'.
                                  '<td>'. $calc.'$</td>'.
                               '</tr>';
                                $counter--;
                        }
                      }
                    ?>
                    <tr class="move" ><td colspan="4"> <a href="user.php?id=triangle"><p>...</p></a></td></tr>
            </tbody>
            </table>
           

          </div>
        </div>
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
.link i {
  color: var(--main-color);
 }
  h3 {
    color: black;
    margin: 0 5px ;
    padding: 10px;
    text-transform: uppercase;

  }
  /* End Header */
 
  .shapes .container {
    margin: 0px;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 10px;
  }
  .shapes .container div {
    margin: auto;
  }
  .shapes .container .circle {
    background-color: var(--secondary-color);
    height: 19vh;
    width: 20vh;
    border-radius: 50%;
  }
  .shapes .container .square {
    background-color:var(--secondary-color);
    height: 18vh;
    border-radius: 10px;
    width: 20vh;
  }
  .shapes .container .triangle {
    height: 0;
    width: 0;
    border-bottom: 130px  solid var(--secondary-color) ;
    border-left: 80px  solid transparent;
    border-right: 80px  solid transparent;
    border-radius: 10px;
  }
  .shapes .container .triangle p {
    margin: 80px 0px 0px -40px;
  }
  .shapes .container  p {
    text-align: center;
    align-items: center;
    color: black;
    margin-top: 50px;
    text-transform: uppercase;
    font-weight: 600;
  }
.shapes h3 {
  text-align: center;
}
.shapes .container .triangle h3 {
  text-align: center;
  margin-left: -20px;
}
.lasts  a p {
  text-align: center;
  color: black;
  font-size: medium;
  font-weight: 600;
  text-decoration: none;
  text-transform: uppercase;
}
.move  td{
  padding: 0px;
  border-bottom: 0px;
}
.last_books {
  float: right;
}
a {
  text-decoration: none;
}
.circle:hover p { 
  text-shadow: 0px 17px 14px black;
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-name: move;
  animation-timing-function: ease-out;
}
.circle:hover h3 { 
  text-shadow: 0px 17px 14px black;
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-name: move;
  animation-timing-function: ease-out;
}
.square:hover p { 
  text-shadow: 0px 17px 14px black;
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-name: move;
  animation-timing-function: ease-out;
}
.square:hover h3 { 
  text-shadow: 0px 17px 14px black;
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-name: move;
  animation-timing-function: ease-out;
}
.triangle:hover p { 
  text-shadow: 0px 17px 14px black;
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-name: move;
  animation-timing-function: ease-out;
}
.triangle:hover h3 { 
  text-shadow: 0px 17px 14px black;
  animation-duration: 2s;
  animation-fill-mode: forwards;
  animation-name: move;
  animation-timing-function: ease-out;
}
@keyframes move {
  from {
    transform: translateY(0);
  }
  to {
    transform: translateY(-25px);
  }
}
table{
  width: 650px;
  text-align: center;
  border: 0px;
  border-spacing: 10px;
}
table td {
  text-align: center;
  padding: 9px;
  border: 0px;
  border-bottom: 1px solid black;
  border-color: var(--secondary-color);
  text-transform: uppercase;
}
</style>
</body>
</html>