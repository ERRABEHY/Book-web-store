<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
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
          <li><a href="indexe.php#Product">Product</a></li>
          <li><a href="indexe.php#portfolio">Portfolio</a></li>
          <li><a href="indexe.php#about">About</a></li>
          <li><a href="indexe.php#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Header -->
  <div class="inp">
  <form method="post" action="includes/signup-inc.php"> 
        <h3>Sign Up</h3>
        <div>
            <label for="">Enter Your Email:</label>
            <input type="Email" name="Email" placeholder="@gmail.com"    required>
        </div>
          <div>
               <label for="">Enter Your Name:</label>
               <input type="text" name="User_Name" placeholder="User Name"  required>
           </div>
           <div>
               <label for=""> Create Your Password:</label>
               <input type="password" name="Password1" id="Password1" placeholder="write 1..2,A..Z,@.#" >
           </div>
           <div>
            <label for=""> Repeat Your Password:</label>
            <input type="password" name="Password2"  id="Password2" placeholder="write 1..2,A..Z,@.#" >
           </div>
           <div>
            <input type="submit"  name ="submit" value="Sign Up" id="send">
        </div>
        <div class="log">
            <p>have an account already?</p>
            <a  class="sign" href="loginb.html">login</a>
          </div>
     </form>
  </div>
   
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
  
  /* Start Header */
  
   .header {
   padding: 20px;
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
  .header .links ul li a {
    font-size: 120%;
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
  body {
                
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                
            }
            .inp {
              margin: 0;
              display: flex;
              justify-content: center;
              align-items: center;
              position: relative;
              width: 100%;
              height: 500px;
              min-height: 90vh;
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .inp::before {
              background-image: url(images/bookstore.jpg);
              content: '';
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              z-index: -1;
              filter: blur(5px);
              background-size: cover;
              background-attachment: fixed;
            }
            form {
                background-color: rgba(131, 139, 146, 0.5);
                border-radius: 8px;
                padding: 20px 10px 20px 10px ;
                border: 2px solid black;
            }
        form:hover {
            box-shadow: 3px 3px 3px black;
        }
        h3 {
            text-align: center;
            font-size: xx-large ;
            color: #2c4755;
        }
        form  input {
            margin: 6px;
        }
        form input:hover {
            background-color: black;
            color: white;
            transition: 0.5s;
        }
        #send {
            background-color: #2c4755;
             color: #10cab7;
            width: 100px;
            height: 40px;
            border: 0px;
            border-radius: 18px;
            text-transform: uppercase;
            font-weight: bolder;
        }
        #send:hover {
        background-color: #10cab7;
        color: #2c4755;
        box-shadow: 0 0 5px #10cab7,
              0 0 25px #10cab7,
              0 0 50px #10cab7;
     }
        p {
            text-align: center;
            margin-top: -40px;
            margin-right: -49px;
        }
        a {
                position: relative;
                top: 19%;
                text-decoration: none;
                color: black;
            }
        .sign {
                float: right;
                font-weight: 900;
                text-transform: uppercase;
                color: #10cab7;
                margin-top: -35px;
                margin-right: 15px;
            }
     </style>
</body>
</html>