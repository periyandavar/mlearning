<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    

    <!-- Title -->
    <title> MLearning</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


<!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.php"><img src="img/core-img/logo.jpg" alt=""></a>
                            </div>
    <div class="header-bar-menu">
                                <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                                    
                                    <li><a href="login.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="javascript: document.body.scrollIntoView(false);">About Us</a></li>
                                     
                                            <li><a href="javascript: document.body.scrollIntoView(false);">Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript: document.body.scrollIntoView(false);">About Us</a></li>
                                    <li><a href="javascript: document.body.scrollIntoView(false);">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->

                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                               <b><i><font name="Segoe Print " size="12"> MLearning </b></i></font>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
<br><br><br><br><br><center>
<h3>College Registeration for MLearning </h3><br><br>
<form action="register.php" method="POST">
<table border="0" width="720" height="380">
<tr><td style="font-size:14pt;width:420px;">Name of the college </td><td> <input type="text" style="font-size:14pt;width:270px;" name="cname" placeholder="College Name"></td></tr>
<tr><td style="font-size:14pt;width:420px;">Name of the SuperUser </td><td><input type="text" style="font-size:14pt;width:270px;" name="Pname" placeholder="Principal Name"></td></tr>
<tr><td style="font-size:14pt;width:420px;">Email id </td><td><input type="email" name="email" style="font-size:14pt;width:420px;" placeholder="College Mail id"></td></tr>
<tr><td style="font-size:14pt;width:420px;">Location </td><td><input type="text" name="loc" style="font-size:14pt;width:420px;" placeholder="College Location"></td></tr>
<tr><td style="font-size:14pt;width:420px;"> City </td><td><input type="text" name="city" style="font-size:14pt;width:420px;" placeholder="City"></td></tr>
<tr><td style="font-size:14pt;width:420px;"> Phone Number</td><td><input type="text"  name="phone" style="font-size:14pt;width:420px;" placeholder="College Phone Number"></td></tr><!pattern="[0-9]{5}[-][0-9]{7}[-]{0-9]{1}">
<tr><td style="font-size:14pt;width:420px;"> Password </td><td><input type="password" name="pass1" style="font-size:14pt;width:420px;" placeholder="Password"></td></tr>
<tr><td style="font-size:14pt;width:420px;"> Confirm Password </td><td><input type="password" name="pass2" style="font-size:14pt;width:420px;" placeholder="Retype Password"></td></tr>
</table><br><br>
<input type="submit" name="Register" style="font-size:14pt;width:220px;" value="Register">
</form>
</center><br><br><br>
<?php
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("Mlearning") or die (mysql_error());

if(isset($_POST['Register']))
{
	 $cname=$_POST['cname'];
	 $pname=$_POST['Pname'];
	 $loc=$_POST['loc'];
	 $city=$_POST['city'];
	 $phone=$_POST['phone'];
     $pass1=$_POST['pass1'];
	 $pass2=$_POST['pass2'];
     $email=$_POST['email'];
	 //$timezone= new DateTimeZone("Asia/Kolkata");
	 //$date=new DateTime();
	 //$date->setTimezone($timezone);
	 //!echo $date_>format('H:i:s: A / D, M jS, y');
	 if($pass1!=$pass2)
	 {
		 echo"<script>alert('The passwords are dismatch ')</script>";
		 exit();
	 }
	 
	 if(strlen($pass1>=12 and$pass2<=6))
	 {
	    echo"<script>alert('The password must be six to tweleve charecters long ')</script>";
		exit();
	 }
	 
	 
	  if($cname=='')
	 {
		 echo"<script>alert('Please enter the college Name ')</script>";
		 exit();
	 }
	 if($pass1=='')
	 {
		 echo"<script>alert('Please enter the Password ')</script>";
		 exit();
	 }
	 if($loc=='')
	 {
		 echo"<script>alert('Please enter the location ')</script>";
		 exit();
	 }
	 if($pass1=='')
	 {
		 echo"<script>alert('Please confirm the Password ')</script>";
		 exit();
	 }
	 if($city=='')
	 {
		 echo"<script>alert('Please enter the city ')</script>";
		 exit();
	 }
	if($email=='')
	 {
		 echo"<script>alert('Please enter the email id ')</script>";
		 exit();
	 } 
	 if($phone=='')
	 {
		 echo"<script>alert('Please enter the Phone number ')</script>";
		 exit();
	 }
	 if($pname=='')
	 {
		 echo"<script>alert('Please enter the Principal name ')</script>";
		 exit();
	 }
	 else
	 {
	    $query="insert into super_admin (College_Name,User_Name,Place,City,Password,Phone,Mail,Departments) values ('$cname','$pname','$loc','$city','$pass1','$phone','$email','0')";
	     if(mysql_query($query)){
		 echo "<h3>You have registered sucessfully,...!</h3>";
	 }
	 else
	 {
	
		  echo "<h3>Registeration is failed Invalid data...!</h3>";
	 }
	 }
}	

?>
<!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="img/core-img/logo.jpg" height="25" width="50" alt=""> <b> <font color="white">GMLearning </font></b></a>
                           
                                </div>
                            <p>MLearning - A step towards inovation on learning Join Now,..! Learn & Live High,..! for a better Life Now the MLearning is available for Android (Playstore) </p>
                            <div class="footer-social-info">
                                
                                
                            </div>

                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                              <div class="widget-title">
                                <h6>Mobile Apps</h6></div>
                                                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">Android (MLearning) - Playstore</a></li>
                                    <li><a href="#">Apple ios (MLearning) - Appstore</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>

<!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6> useful links</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="register.php">Register</a></li>
                                    <li><a href="login.php">Log in</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contact</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>Main: 203-808-8613 <br>Office: 203-808-8648</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>vickyrainy2112@gmail.com</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>Vision towards Mobile Learning </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>

