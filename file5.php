
<?php
include_once('dbcon.php');
session_start();
if(isset($_GET['id'])){
 $_SESSION['Loginid']=$_GET['id'];
}
if(!isset($_SESSION['Login'])){
    echo '

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> All Products - FarMart</title>
        <link rel="stylesheet" href="file1s.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="header"></div>
        <div class="container">
               <div class="navbar">
            <div class="logo">
                <img src="main%20logo.jpeg" widht="50px" height="50px">
            </div>
            <nav>
                <ul id="MenuItems">
             <li><a href="file1.html">Home</a></li>
                    <li><a href="file2.html">Products</a></li>
                    <li><a href="fileabout.html">About</a></li>
                   <li><a href="filecontact.html">Contact</a></li>
                     <li><a href="file5.php">Account</a></li>
                </ul>
            </nav>
                   <img src="cart.jpeg" width="30px" height="30px">
                   <img src="menu-rounded%20(1).png" class="menu-icon" 
                        onclick="menutoggle()">
        </div>
            </div>

        <!--------account details------->
        <div class="account-page">
        <div class="container">
            <div class="row">
            <div class="col-2">
                <img src="fruits%20&%20vege.jpeg" width="100%">
                     </div>
                <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                    <span onclick="login()">Log in</span>
                        <span onclick="register()">Register</span>
                        
                
                    </div>
                    <div class="reg1">
                    <form id="LoginForm" action="login.php" method="post">
                    <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        
                        <input type="submit" name="submit" value="Login" class="btn">
                        <a href="">Forget password</a>
                    </form>
                
                    <form id="regForm" action="main.php" method="post">
                        <input type="text" name="name" placeholder="Name">
                        <input type="tel" name="phone" placeholder="Phone number">
                          <input type="text" name="address" placeholder="Delivery Address">
                        <input type="email" name="email" placeholder="Email">
                        
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="submit" value="Register" class="btn">
                    </form>
                    </div>
                    
                    </div>
                </div>
            </div>
            </div> 
        </div>
        
        <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Buy our Products</h3>
                    <p>Bringing the purest products to your hands.</p>
                </div>
                <div class="footer-col-2">
                    <img src="main%20logo.jpeg">
                    <p>Brought from the hands of GOD!</p>
                </div>
            </div>
            <p  class="copyrights">Copyrights 2022 @ Team Trio</p>
            
            </div>
        </div>
        <script>
            var MenuItems=document.getElementById("MenuItems");
            MenuItems.style.maxHeight="0px";
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px"){
                    MenuItems.style.maxHeight="200px";
                }
                else{
                    MenuItems.style.maxHeight="0px";
                }
            }
            
        </script>
<!---js for form----->
        <script>
        var LoginForm = document.getElementById("LoginForm");
        var regForm = document.getElementById("regForm");
       
            var Indicator = document.getElementById("Indicator");
            function register(){
                regForm.style.transform="translateX(0px)";
                LoginForm.style.transform="translateX(0px)";
               
                Indicator.style.transform="translateX(100px)";
            }
            function login(){
                regForm.style.transform="translateX(300px)";
                LoginForm.style.transform="translateX(300px)";
              
                Indicator.style.transform="translateX(300px)";

            }
           
        </script>
    </body>

</html>';
    
}elseif(isset($_SESSION['Loginid'])){
   
     $sql1="select * from user where id={$_SESSION['Loginid']};";
$retval1=mysqli_query($con,$sql1);
    
$user=mysqli_fetch_row($retval1);
    echo '
<!DOCTYPE html>
<html>
   <head>
      <title>Profile Card</title>
      <link rel="stylesheet" type="text/css" href="krish.css">
   </head>
   <body>
      <div class="card-container">
         <div class="upper-container">
            <div class="image-container">
               <img src="ic.png" />
            </div>
         </div>
         <div class="lower-container">
            <div>
               <h3>'.$user[1].'</h3>
               <h4>'.$user[4].'</h4>
               <h5>'.$user[5].'</h5>
               <h6>'.$user[2].'</h6>
            </div>
            <div>
            </div>
            <div>
               <a href="file1.html" class="btn">Home</a>
            </div>
         </div>
      </div>
   </body>
</html>
';
}?>