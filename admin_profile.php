<?php
  require('connect.php');
  session_start();
  if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value1']!='A')
  {
	header('Location:login.php');
  }
if(isset($_GET['logout']))
{
	$_SESSION['value']='';
    $_SESSION['value1']='';
	$_SESSION['value2']='';
	session_destroy();
	header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Head </title>
     <link href="css/mu.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
   <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

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
</head>

<body style="background-color:#f7e0ff;">
<div  id="loading" style="background-color:#FDFDFF;opacity:1;position:'absolute'"><div  style="background: url('pre.gif') no-repeat center center;width:100%;height:100%">

</div>
</div>
	<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="warning">

    	<div class="sidebar-wrapper">
		  <div class='imageing'style="background-image: url('img/user-img-background.jpg');">
            
			<div class='image' >
			
			<div class="logo">
			<b><table style='color:white; font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
               </td><td><h5 style="font-family: 'Courgette', cursive;">HEAD
<?php
         $id=$_SESSION['value2'];
      $sql='SELECT * From admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['Name'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?> 
            </div>
			</div>
			</div>

            <ul class="nav">
                <li class="active">
                    <a href="admin_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px"> Profile</p>
                    </a>
                </li>
				
                <li>
                    <a href="browse_staffs.php">
                        <i class="ti-text"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Browse</p>
                    </a>
                </li>
				<li>
                    <a href="new_staff.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px"> Add Staff</p>
                    </a>
                 </li>			
                <li>
                    <a href="new_class.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">>New Class</p>
                    </a>
                </li>
				
                <li>
                    <a href="new_paper.php ">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Add Paper</p>
                    </a>
                </li>
				
				<li >
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Manage Paper</p>
                    </a>
                </li>
				<li>
                    <a href="admin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Log out</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>
    <div class="main-panel" style="background-color:#f7e0ff;">
        <nav class="navbar navbar-default" style="background-color:dodgerblue;opacity:.7">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i style="color:#ffffff;" class="ti-panel"></i>
								<p style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">M Learning</p>
                            </a>
                        </li>
						<li> 
						<a href="superadmin.php?logout=true">
								<i style="color:#ffffff;" class="ti-shift-left"></i>
								<p style="color:#ffffff;font-family: 'IBM Plex Serif', serif;">Log out</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
<br>
	<center>
<?php
								
								if(isset($_POST['sub']))
								{
									$name=$_POST['head'];
									$pass=$_POST['pass'];
									$mail=$_POST['mail'];
									if($mail=='')
									{
										 echo"<script>alert('You can't leave the mail id field as blank ')</script>";
									}
									elseif($pass=='')
									{
										 echo"<script>alert('You can't leave the password field as blank ')</script>";
									}
									else{
									$q='update admin set head="'.$name.'",password="'.$pass.'",mailid="'.$mail.'" where id="'.$id.'" ';
									if(mysqli_query($link,$q))
									{
										echo'Your Profile is updated,....! ';
									}
									else
									{
										echo'Failed to update your information ,....!';
									}	
								}
								       $sql='SELECT * From admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['Name'];
								}
								?>
	<h3>Edit Profile </h3><br>
	  <div class="container-fluid"> 
	<div class="content">
                                <form action='admin_profile.php' method='POST'>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label> Id </label>
												<?php
                                                echo '<input type="text" "name="reg" class="form-control border-input" disabled placeholder="Company" value="'.$id.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Department Name</label>
												<?php
                                                echo '<input type="text" name="cname" class="form-control border-input" disabled placeholder="Student Name" value="'.$name.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Head </label>
												<?php
                                                 echo'<input type="text" class="form-control border-input" name="head" required="required" placeholder=" Head" value="'.$rs['head'].'">';
												?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">  
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for='inputdob'>Number of Staffs</label>
												<?php
												 echo'<input type="text" class="form-control border-input" name="phone" disabled placeholder="Phone" value="'.$rs['StaffsCount'].'">'; 
												 ?>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mail Id</label>
                                                <?php
												 echo'<input type="email" class="form-control border-input" required="required" placeholder="'.'E-Mail Id'.'" name="mail" value="'.$rs['MailId'].'">'; 
												 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                             </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <?php
												 echo'<input type="text" class="form-control border-input" required="required" placeholder="'.'Password'.'"name="pass" value="'.$rs['Password'].'">'; 
												 ?>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="text-center">
									
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name='sub' value='sub'>Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>



    </div>
	</center>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>