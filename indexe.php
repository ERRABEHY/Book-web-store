<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temlapte one</title>
    <!-- main css file -->
    <link rel="stylesheet" href="CSS/mastercs.min.css">
    
    <!-- main normalise -->
    <link rel="stylesheet" href="css/normalise.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/370cac0bc0.js" crossorigin="anonymous"></script>
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
  <!-- Start Landing Section -->
  <div class="landing">
    <div class="intro-text">
      <h1>Let's read a book</h1>
      <p>Your knowldge is Your future</p>
    </div>
  </div>
  <!-- End Landing Section -->
  <!-- Start Features -->
  <div class="features">
    <div class="container">
      <div class="feat">
        <i class="fa-solid fa-book fa-3x "></i>
        <h3>Book sales</h3>
        <p>Book stores can offer a wide range of books across different genres, from fiction to non-fiction, children's books to graphic novels, and more.</p>
      </div>
      <div class="feat">
        <i class="fa-solid fa-book-open fa-3x"></i>
        <h3>Book recommendations</h3>
        <p>Book stores can also offer personalized recommendations to customers based on their interests, reading history, and preferences. </p>
      </div>
      <div class="feat">
        <i class="fa-solid fa-calendar-day fa-3x"></i>      
          <h3>Events and activities</h3>
        <p>we offer a variety of events and activities to engage customers and build community.  </p>
      </div>
    </div>
  </div>    
  <!-- End Features -->
  <!-- Start Services -->
  <div class="services" id="Product">
    <div class="container">
      <h2 class="special-heading">Product</h2>
      <p>Don't be busy, be productive</p>
      <div class="services-content">
        <div class="col">
          <!-- Start Service -->
          <div class="srv">
          <?php
              require "includes/data.php";
              
              $sql="SELECT ID,Photo,Products FROM materiel ORDER BY ID DESC ";
              $query=mysqli_query($connect, $sql);
              while($row=mysqli_fetch_assoc($query)){
                $photo=$row['Photo'];
                $name=$row['Products'];
                // $_SESSION['id']=$row['ID'];
                // echo $_SESSION['id'];

                ?>
                <div >

                  <a href="book_detail.php?id=<?php echo $row['ID'] ?>" >
                    <img class="imagebook" src="images/<?php echo $photo ?>" alt="error from fileimages">
                     <p ><?php echo $name ?></p>
                     </a>
                </div>
               <?php
              }
              ?>
              </div>
          <!-- <div class="srv">
           <div>
            <a href="book_details/48laws.php">
              <img class="imagebook" src="images/The 48 Laws of Power.png" alt="imagebook">
              <p>48 laws for power</p>
              </a>
           </div>

            <div>
              <a href="book_details/THEART.php">
                <img class="imagebook" src="images/abrief.jpg" alt="imagebook">
                <p> A brief history of time  </p>
                </a>
            </div>

              <div>
                <a href="book_details/">
                  <img class="imagebook" src="images/atomichabits.png" alt="imagebook">
                  <p> Atomic habits </p>
                  </a>
              </div>
              <div>
                <a href="book_details/">
                  <img class="imagebook" src="images/Thinking, Fast And Slow.png" alt="imagebook">
                  <p>Thinking, Fast And Slow</p>
                  </a>
              </div>
          </div>  -->
          
        </div>
      </div>
          <!-- End Service -->
      </div>
    </div>
  </div>
  <!-- End Services -->
  <!-- Start Portfolio -->
  <div class="portfolio" id="portfolio">
    <div class="container">
      <h2 class="special-heading">Portfolio</h2>
      <p>If you do it right, it will last forever.</p>
      <div class="portfolio-content">
        <div class="card">
          <img decoding="async" src="images/events.jpg" alt="" />
          <div class="info">
            <h3>Events</h3>
            <p>The events could be organized by date or by theme, such as author events, book clubs, or literary festivals.</p>
          </div>
        </div>
        <div class="card">
          <img decoding="async" src="images/team.jpg" alt="" />
          <div class="info">
            <h3>Team</h3>
            <p>behind-the-scenes glimpses of the store, we have a good team for working in perfect aspects to develope access of our client and the teamwork consist of 3 members. </p>
          </div>
        </div>
        <div class="card">
          <img decoding="async" src="images/from.jpg" alt="" />
          <div class="info">
            <h3>From Us</h3>
            <p>Welcome to our bookstore! We're a small but passionate team of book lovers.  </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Portfolio -->
  <!-- Start About -->
  <div class="about" id="about">
    <div class="container">
      <h2 class="special-heading">About</h2>
      <p>Less is more work</p>
      <div class="about-content">
        <div class="image">
          <img decoding="async" src="images/about.jpg" alt="" />
        </div>
        <div class="text">
          <p>
          Bookstore Online is an e-commerce platform that allows customers to browse, purchase, and download books online. The platform features a wide variety of books, including new releases, bestsellers, and classic literature. Customers can create an account, search for books, read book descriptions and reviews, and purchase books using a secure online payment system. Once purchased, books can be downloaded directly to the customer's device in a variety of formats.
          </p>
          <hr />
          <p>
          Bookstore Online targets book lovers of all ages and interests, who are looking for a convenient and secure way to purchase and download books online. The platform appeals to busy professionals, students, and anyone who enjoys reading on-the-go.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- End About -->
  <!-- Start Contact -->
  <div class="contact" id="contact">
    <div class="container">
      <h2 class="special-heading">Contact</h2>
      <p>We are born to create</p>
      <div class="info">
        <p class="label">Feel free to drop us a line at:</p>
        <a href="mailto:contact@bookstore.com?subject=Contact" class="link">contact@bookstore.com</a>
        <div class="social">
          Find Us On Social Networks
          <i class="fab fa-youtube"></i>
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact -->
  <!-- Start Footer -->
  <div class="footer">&copy; 2023 <span>bookstore</span> All Right Reserved</div>
  <!-- End Footer -->
</body>
</html>