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
function generateNumericOTP($n) { 
	
	$generator = "1357902468artistg"; 


	$result = ""; 

	for ($i = 1; $i <= $n; $i++) { 
		$result .= substr($generator, (rand()%(strlen($generator))), 1); 
	} 

	// Return result 
	return $result; 
} 

// Main program
function send($mail,$user,$id){ 
$ot=(generateNumericOTP(7));
$sub='Recover your Mlearning Account';
$cont='Hello '.$user.' The One Time Password to recover your Mlearning account is given below , use it carefully,..|
   ID : ' .$id.'
   OTP : '.$ot.'
    The Password is valid only for one time use and will expire soon so use it as early as possible ..| Use this otp to access you account to change the password 
      Thank you '.$user.' for being on Active member with us,...';
if(mail($mail,$sub,$cont))
{
    $_SESSION['val']=$id;
    return $ot;
}
else
{
    return '0';
}

}
?>
<?php
if(isset($_POST['Login']))
{  $tuser=$_POST['user'];
    if(isset($_POST['id']))
    {
	 $id=strtoupper($_POST['id']);
	 if($tuser=="super_admin")
			 {
				 $_SESSION['value1']='SU';
				 $sql='SELECT staff_name,mailid,status From super_user Where staff_id="'.$id.'"';
				 $result=mysqli_query($link,$sql);
			     $num_rows=mysqli_num_rows($result);
				 if($num_rows<1)
				 {
					 $msg="Account is not found,..! ";
				 }
				 else
				 {
				       $rs=mysqli_fetch_array($result);
				       if($rs['status']=='y')
				       {
                           	$user=$rs['staff_name'];
							$mail=$rs['mailid'];
				            $msg=send($mail,$user,$id) ;
				           if($msg!='0') {
    $_SESSION['ot']=$msg;
    $msg="OTP is sent successfully ,...!<br> Kindly check your Mail,...!";
    $otp='y';
}
else
{
    $msg="Network connection error in sending mail";
}

				}
				else
				{
				    $msg="Your Account is disabled";
				}
			 }
    }
}

	 if(isset($_POST['pass']))
	 {
	 $pass=$_POST['pass']; 
	 if($pass==$_SESSION['ot'])
	 {
	     $_SESSION['value1']="SU";
	     $_SESSION['value2']=$_SESSION['val'];
	     header('location:superuser_profile.php');
	 }
	 else
	 { 
	    $msg="The OTP is invalid or Expired,...!";
	 }
	 }
			 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <title>Recover Account</title>
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
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

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
	     <link href="css/mu.css" rel="stylesheet"/> <link href="css/pre.css" rel="stylesheet"/>
  <script>
function hideLoader() {
    $('#loading').hide();
}



// Strongly recommended: Hide loader after 20 seconds, even if the page hasn't finished loading
setTimeout(hide, 4* 1000);
function hide(){
$(window).ready(hideLoader);
setTimeout(hideLoader, 15* 1000);
}
</script> 

<!--===============================================================================================-->
</head>
<body>
      <div  id="loading" style="background-color:#FDFDFF;opacity:1;position:'absolute'"><div  style="background: url('pre.gif') no-repeat center center;width:100%;height:100%">

</div>
</div>
   	                <div style="background-image: url(img/bg4.png);background-size: cover;background-position: center;opacity: 1;filter: alpha(opacity=90);height: 100%;width: 100%;position: absolute;"></div>

	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">

				<div class="login100-form-title" style="background-image: url(img/bg.jpg);">
							<div class="image">
                    <img src="img/test.png" width="88" height="85" alt="User" /></div>
					<span class="login100-form-title-1">
						M Learning<br>Recover account<br> (MASTER)
					</span>
				</div>
                
			<b>																			<center><br><?php if(isset($msg)){echo $msg; } ?> <center>
	<form action="mrecover.php" method="POST" class="login100-form validate-form" >
<?php if(!isset($otp))
echo'
<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
					
						<span class="label-input100">User Id</span>
						<input class="input100" name="id"  type="text" name="username" placeholder="Enter user id">
						<span class="focus-input100"></span>
					</div>

						<input type="hidden" name="user" value="super_admin"> 
<span class="focus-input100"></span>
				';?>
					<?php if(isset($otp)) echo'<div class="wrap-input100 validate-input m-b-18" data-validate = "OTP is required">
										<input type="hidden" name="user" value="super_admin"> 
						<span class="label-input100">OTP</span>
						<input class="input100" type="password" name="pass" id="myInput" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
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

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" onclick="myFunction()" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Show OTP
							</label>
						</div>

						<div>
							<a href="mlogin.php" class="txt1">
								Go Back
							</a>
						</div>
					</div>'; ?>
					<div class="container-login100-form-btn">
						<button name="Login" class="login100-form-btn">
						    <?php 
							if(isset($otp)){echo'Submit';} 
							else echo 'Get OTP'?>
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