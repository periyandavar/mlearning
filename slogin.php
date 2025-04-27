<?php
session_start(); 
  if(!(empty($_SESSION['value2'])))
  {
  if($_SESSION['value2']!='')
  {
	if($_SESSION['value1']=='SA')
  {
	header('Location:superadmin.php');
  }
	if($_SESSION['value1']=='U')
  {
	header('Location:user.php');
  }
    if($_SESSION['value1']=='SU')
  {
	header('Location:superuser.php');
  }
    if($_SESSION['value1']=='A')
  {
	header('Location:admin.php');
  }
  }
  }
  require('connect.php');
if(isset($_POST['Login']))
{  
	 $id=strtoupper($_POST['id']);
	 $tuser=$_POST['user'];
	 $pass=$_POST['pass']; 
	  if($id=='')
	 {
		 echo"<script>alert('Please enter the User_id')</script>";
	 }
	 elseif($pass=='')
	 {
		 echo"<script>alert('Please enter the Password ')</script>";
	 }
	 else
	 { 
		     if($tuser=="super_admin")
			 {
				 $_SESSION['value1']='SA';
           		 $sql='SELECT Password From super_admin Where id="'.$id.'"';				
				 $result=mysqli_query($link, $sql);
			     $num_rows=mysqli_num_rows($result);
				 if($num_rows<1)
				 {
					 $msg="Account is not found,..! ";
				 }
				 else
				 {
					$rs=mysqli_fetch_array($result);
                    if($pass==$rs['Password'])
						  {
						   $_SESSION['value2']=$id;
  						   header("Location:superadmin.php");
						  }
						  else
						  {
                             $msg="Please enter the correct password  ";
	                      }
				  }
			 }
			 if($tuser=="admin")
			 {
				 $_SESSION['value1']='A';
				 $sql='SELECT Password,status From admin Where id="'.$id.'"';
				 $result=mysql_query($sql,$link);
			     $num_rows=mysql_num_rows($result);
				 if($num_rows<1)
				 {
					 $msg='Account is not found,..! ';
				 }
				 else
				 {
                     if($pass==mysql_result($result,0,'Password'))
					 {
					  if('y'==mysql_result($result,0,'status'))
					 {
					  $_SESSION['value2']=$id;
  				   	  header("Location:admin.php");
				     }
					 else
			    	  {
						$msg="Your account is disabled ,.....! ";  
					  }
					  }
					  else
					  {
                          $msg="Please provide the correct Password ";
					}
				 }
			 }
			 if($tuser=="super_user")
			 {
				 $_SESSION['value1']='SU';
				 $sql='SELECT Password,status From super_user Where Staff_id="'.$id.'"';
				 $result=mysql_query($sql,$link);
			     $num_rows=mysql_num_rows($result);
				 if($num_rows<1)
				 {
					 $msg="Account is not found,..! ";
				 }
				 else
				 {
                          if($pass==mysql_result($result,0,'Password'))
						  {
							if(mysql_result($result,0,'status')=='y')
						  {
							$_SESSION['value2']=$id;
				            header("Location:superuser.php"); 
						  }
						  else
						  {
							$msg="Your account is disabled ,.....! ";  
						  }
						  }
     					  else
	   					  {
                             $msg="Please provide the correct Password ";
						  }
				 }
			 }
			 if($tuser=="user")
			 {
				 $_SESSION['value1']='U';
				 $sql='SELECT Password,status From user Where Student_id="'.$id.'"';
				 $result=mysqli_query($link, $sql);
			     $num_rows=mysqli_num_rows($result); 
				 if($num_rows<1)
				 {
					 $msg="Account is not found,..! ";
				 }
				 else
				 {
					$rs=mysqli_fetch_array($result);
                    if($pass==$rs['Password']) {
					    if($rs['status']=='y')
						{
						  $_SESSION['value2']=$id;
						   $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $id, $hour);
                         setcookie('password', $pass, $hour);
  						   header("Location:user.php"); 
						}
						 else
						{
						   $msg="Your account is disabled ,.....! ";  
						}
					    }
						else
    					{
                            $msg='Please provide the correct Password ';
						  }
		  		 }
			 }
        }
    }		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <title>MLearning Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" href="img/core-img/logo.jpg"><!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	     <link href="css/mu.css" rel="stylesheet"/>

<!--===============================================================================================-->
</head>
<body>
   	                <div style="background-image: url(img/bg4.png);background-size: cover;background-position: center;opacity: 1;filter: alpha(opacity=90);height: 100%;width: 100%;position: absolute;"></div>

	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">

				<div class="login100-form-title" style="background-image: url(img/bg.jpg);">
							<div class="image">
                    <img src="img/user.png" width="88" height="75" alt="User" /></div>
					<span class="login100-form-title-1">
						M Learning<br>LOG IN
					</span>
				</div>
                <div style="background-image: url(img/log4.png);background-size: cover;opacity: 0.3;filter: alpha(opacity=90);height: 40%;width: 70%;position: absolute;"></div>
			<b>																			<center><br><?php if(isset($msg)){echo $msg; } ?> <center>
	<form action="slogin.php" method="POST" class="login100-form validate-form" >

<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
					
						<span class="label-input100">Username</span>
						<input class="input100" name="id" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

										<!-- <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span  class="label-input100" >User Type  </span>
						<select class="input100" style=" border:0px;outline:0px;" name="user"><option value="super_admin"> King <option value="admin"> Head <option value="super_user"> Master <option value="user"> Student 
</select>
<span class="focus-input100"></span>
					</div> -->
					<input type="hidden" name="user" value="user">
								<script>
								function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
								</script>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" id="myInput" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" onclick="myFunction()" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Show password
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button name="Login" class="login100-form-btn">
							Login
						</button>
						
					</div><b>
				</form>
					</div>
	</div>
	</div>
   	                <!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>