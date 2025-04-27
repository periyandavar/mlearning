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
$sql='SELECT * from info';
	  $result=mysqli_query($link,$sql);
$rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">
    <title>MLearning</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
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
		 	     <link href="css/ml.css" rel="stylesheet"/>
  <link href="css/pre.css" rel="stylesheet"/>
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
<body >

      <div  id="loading" style="background-color:#FDFDFF;opacity:1;position:'absolute'"><div  style="background: url('pre.gif') no-repeat center center;width:100%;height:100%">

</div>
</div>
   	<div style="background-image: url(img/bg4.png);background-size: cover;background-repeat:no-repeat;background-position: center;opacity: 1;filter: alpha(opacity=90);height: 100%;width: 100%;position: absolute;">
	<div class="card" style="background-color: dodgerblue" >
	<center><table><tr><td>
  <img src="img\log4.png" alt="Avatar" style="width:115%;height:100%"></td><td>
  <div class="container" >
   <center> <font color='FFFFFF'><h1><b style="font-family: 'IBM Plex Serif', serif;">	  <?php echo $rs['name']; ?></b></h1> 
    <b><p style="font-family:'Kalam', cursive;"> <font color='#fFF0000' size='4'>  <?php echo $rs['des']; ?>
</p> </b>
  </div></font></center></td></tr><div style='overflow-x:auto'></table><center>
</div><br><BR><BR><BR><BR><BR><div class="table-responsive"><table style="width=100%"><tr><td class="un_first" style="width:100px;"></td><td>
	<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
	      <h1 style="font-family: 'Courgette', cursive;">KING</h1> 
      <img src="img/king.png" alt="Avatar" style="width:300px;height:200px;">
    </div>
    <div class="flip-card-back">
      <h1 style="font-family: 'Courgette', cursive;">KING</h1> 
      <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">AJ COLLEGE</b></font></p>
	  <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">for</b></font></p>
      <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">COLLEGE ACCOUNT LOGIN</b></font></p>
	  <a href='klogin.php'><button style="vertical-align:middle" class="button">Click Me</button></a>
    </div>
  </div>
</div></td><td style="width:100px;"></td><td class="un_age">
	<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
	      <h1 style="font-family: 'Courgette', cursive;">HEAD</h1> 
      <img src="img/master.png" alt="Avatar" style="width:300px;height:200px;">
    </div>
    <div class="flip-card-back">
      <h1 style="font-family: 'Courgette', cursive;">HEAD</h1> 
      <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">AJ COLLEGE</b></font></p>
	  <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">for</b></font></p>
      <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">DEPARTMENT ACCOUNT LOGIN</b></font></p>
	  <a href='hlogin.php'><button style="vertical-align:middle" class="button">Click Me</button></a>
    </div>
  </div>
</div></td><td style="width:100px;"></td><td class="un_address">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
	      <h1 style="font-family: 'Courgette', cursive;">MASTER</h1> 

      <img src="img/head.png" alt="Avatar" style="width:300px;height:200px;">
    </div>
    <div class="flip-card-back">
      <h1 style="font-family: 'Courgette', cursive;">MASTER</h1> 
	  
      <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">AJ COLLEGE</b></font></p> 
	  <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">for</b></font></p>
      <p style="font-family: 'Charm', cursive;"><b><font size='4' color="#ff6610">STAFFS ACCOUNT LOGIN</b></font></p> 
	  <a href='mlogin.php'><button style="vertical-align:middle" class="button">Click Me</button></a>
    </div>
  </div>
</div></td></tr></table>
</div></div>
	
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