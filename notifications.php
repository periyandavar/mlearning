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
    <!-- Title -->
  <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam" rel="stylesheet">
    <title>Send Notification</title>
     <link href="css/mu.css" rel="stylesheet"/>
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
<!-- ##### Preloader ##### --><div  id="loading" style="background-color:#FDFDFF;opacity:1;position:'absolute'"><div  style="background: url('pre.gif') no-repeat center center;width:100%;height:100%">

</div>
</div>
    <!-- ##### Header Area Start ##### -->
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
    $sql='SELECT College_Name From super_admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['College_Name'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?>                      
           </div>
			</div>
			</div>
            <ul class="nav">
                <li>
                    <a href="sadminedit.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px"> Profile</p>
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
				<li class='active'>
                    <a href="Notifications.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Charm', cursive;color:'black';font-size:13px">Create Notification</p>
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
        <nav class="navbar navbar-default" style="background-color:dodgerblue;opacity:.7">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                   <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#"> Create Notification</a>
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
								<p style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#" >Log out</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
<br>
<center>
<h3> Create Notification </h3><br>
<form action="notifications.php" method="POST">
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-3">
										<div class="form-group">
                                               <label>Notification topic</label>
											   <input type='text' required="required" class="form-control border-input" name='topic' placeholder='Heading'/>
									    </div>
										</div>
										<div class="col-md-1">
										<div class="form-group">
                                        </div>
								        </div> 
										
                                        <div class="col-md-2">
										<div class="form-group">
                                               <label><center>This Notification is for</center></label>
										 <select required="required" class="form-control border-input" name="name" style="font-size:14pt;width:320px;">
										<option value=''> <option value='All'>All <option value='super_user'> Master <option value='user'> Student </select></form>
										  </div>
										</div>
										
                                    </div>
									<div class="row">
									    
                                        <div class="col-md-1">
                                            <div class="form-group">
                                        </div></div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Content</label>
												<textarea rows="3" required="required" class="form-control border-input" name="cont" placeholder="Contents" > </textarea>
                                            </div>
                                        </div>
                                    </div>
								<div class="row">	
                                      <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name='SEND' value='sub'>SEND</button>
                                    </div>
									</div>
                                    </div>
                                </form></center>
								<?php
								if(isset($_POST['SEND']))
								{
									$cont=$_POST['cont'];
									$name=$_POST['name'];
								    $topic=$_POST['topic'];
								    if($name=='')
									{
										echo"<script>alert('Please select the People to send Notification ')</script>";
									}
									elseif($topic=='')
									{
									    echo"<script>alert('Please enter the topic of the Notification ')</script>";
									}
									else
									{
										 $query="insert into super_admin_notification (topic,content,send_to,status) values ('$topic','$cont','$name','y')";
	     if(mysqli_query($link,$query))
	     {
		 echo "<h3> Notification is send sucessfully,...!</h3>";
		 }
	     else
	    {
		  echo "<h3>Error in sending Notification...!</h3>";
	    }
									}
								}
	?>
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