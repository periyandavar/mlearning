<?php
  require('connect.php');
  session_start();
  if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value1']!='SA')
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
  <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam" rel="stylesheet">
    <!-- Title -->
    <title>King </title>
     <link href="css/mu.css" rel="stylesheet"/>
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
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
</div>    <!-- ##### Header Area Start ##### -->
	<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="warning">
    	<div class="sidebar-wrapper">
		  <div class='imageing'style="background-image: url('img/user-img-background.jpg');">            
			<div class='image' >
			<div class="logo">
			<b><table style='color:white; font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
                    </td><td><h5 style="font-family: 'Courgette', cursive;">KING
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT * From super_admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  echo "<br>".$rs['College_Name']." (".$id.")</h5></table><b>";
?>          
            </div>
			</div>
			</div>
            <ul class="nav">
                <li class="active">
                    <a href="sadminedit.php">
                        <i class="ti-user"></i>
                        <p style="font-family: 'Charm', cursive;font-size:14px"> Profile</p>
                    </a>
                </li>
                 <li>
                    <a href="edit.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px"> Edit Page</p>
                    </a>
                </li>
                
                <li>
                    <a href="department.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">New Department</p>
                    </a>
                </li>
                <li>
                    <a href="browse_department.php">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">View Departments</p>
                    </a>
                </li>
				<li>
                    <a href="notifications.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:13px">Create Notification</p>
                    </a>
                <li>
                    <a href="sadmin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">View Notifications</p>
                    </a>
                </li>
				<li >
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Log out</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <div class="main-panel" style="background-color:#f7e0ff;">
        <nav class="navbar navbar-default" style="background-color:dodgerblue;opacity:.9">   
            <div class="container-fluid">
                <div class="navbar-header" >
                    <button style="color:#ffffff;" type="button" class="navbar-toggle" style="background-color:#ffffff;">
                       <b> <span class="sr-only" >Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span></b>
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
									$name=$_POST['name'];
									$age=$_POST['phone'];
									$addr=$_POST['addr'];
									$pass=$_POST['pass'];
									$mail=$_POST['mail'];
									$place=$_POST['place'];
									$phone=$_POST['phone'];
									if($mail=='')
									{
										 echo"<script>alert('You can't leave the mail id field as blank ')</script>";
									}
									elseif($pass=='')
									{
										 echo"<script>alert('You can't leave the password field as blank ')</script>";
									}
									else{
									
									$q='update super_admin set User_Name="'.$name.'",Phone="'.$phone.'",city="'.$place.'",place="'.$addr.'",password="'.$pass.'",mail="'.$mail.'" where id="'.$id.'" ';
									if(mysqli_query($link,$q))
									{
										
										echo'updated successfully';
									}
									else
									{
										echo'error in updation';
									}
									}
									    $sql='SELECT * From super_admin where id="'.$id.'"';
	                                    $result=mysqli_query($link,$sql);
	                                    $rs=mysqli_fetch_array($result);
								}
								?>

	<div class="content"><h3>Edit Profile</h3>
	            <div class="container-fluid"> 
                            <div class="header">      
                            </div>
                            <div class="content">
                                <form action='sadminedit.php' method='POST'>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Id </label>
												<?php
                                                echo '<input type="text" "name="reg" class="form-control border-input" disabled placeholder="Company" value="'.$id.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>College Name</label>
												<?php
                                                echo '<input type="text" name="cname" class="form-control border-input" disabled placeholder="Student Name" value="'.$rs['College_Name'].'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">User Name </label>
												<?php
                                                 echo'<input type="text" class="form-control border-input" name="name" placeholder="User Name" value="'.$rs['User_Name'].'">';
												?>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
												<?php
												 echo'<textarea rows="3" class="form-control border-input" name="addr" placeholder="'.'Addreess'.'" value="'.$rs['Place'].'">'.$rs['Place'].'</textarea>'; 
												 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City </label>
												<?php
												 echo'<input type="text" class="form-control border-input" name="place" placeholder="Place"'.'" value="'.$rs['City'].'">';
												?>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for='inputdob'>Phone </label>
												<?php
												 echo'<input type="text" class="form-control border-input" name="phone" pattern="[789][0-9]{9}" placeholder="'.'Phone'.'" value="'.$rs['Phone'].'">'; 
												 ?>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                             </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mail Id</label>
                                                <?php
												 echo'<input type="email" class="form-control border-input" placeholder="'.'E-Mail Id'.'" name="mail" value="'.$rs['Mail'].'">'; 
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <?php
												 echo'<input type="text" class="form-control border-input" placeholder="'.'Password'.'"name="pass" value="'.$rs['Password'].'">'; 
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