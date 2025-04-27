<?php
  session_start();
  if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value1']!='SU')
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
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    
<meta charset="UTF-8">
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Profile </title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

	 </head>
<body>
<!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
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
               </td><td><h5><a href="superuser.php">Super User
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT * From super_user where Staff_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $row=mysqli_fetch_assoc($result);
	  $name=$row['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5></a></td></tr></table><b>";
?>               
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li class="active">
                    <a href="suser.php">
                        <i class="ti-user"></i>
                        <p> Profile</p>
                    </a>
                </li>
				<li >
                    <a href="notes.php">
                        <i class="ti-panel"></i>
                        <p>Notes</p>
                    </a>
                </li>
                <li>
                    <a href="quiz.php">
                        <i class="ti-text"></i>
                        <p>Quiz</p>
                    </a>
                </li>
                <li>
                    <a href="modelquestions.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Model Questions</p>
                    </a>
                </li>
                <li>
                    <a href="photography.php">
                        <i class="ti-map"></i>
                        <p>Photography</p>
                    </a>
                </li>
                <li>
                    <a href="videography.php">
                        <i class="ti-export"></i>
                        <p>Videography</p>
                    </a>
                </li>
				<li>
                    <a href="assignment.php">
                        <i class="ti-pencil-alt2"></i>
                        <p>Assignments</p>
                    </a>
                <li>
                    <a href="notification.php">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>M Learning</p>
                            </a>
                        </li>
						<li>
                              <a href="superadmin.php?logout=true">
								<i class="ti-settings"></i>
								<p>Log out</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
<center>
	<h3>My Profile </h3><br>
	<table border="0" width="520" height="380" style="font-size:14pt;">
	<?php
	  $sname=mysql_result($result,0,'Staff_Name');
	  $sid=mysql_result($result,0,'Staff_id');
	  $did=mysql_result($result,0,'DepartmentCode');
      $dob=mysql_result($result,0,'DOB');                     	
	  $age=mysql_result($result,0,'Age');
	  $quli=mysql_result($result,0,'Qualification');
	  $mail=mysql_result($result,0,'MailId');
	  $blood=mysql_result($result,0,'Blood');
	  $pass=mysql_result($result,0,'Password');
      $ad=mysql_result($result,0,'Address');
	  $spec=mysql_result($result,0,'Specification');
	  $status=mysql_result($result,0,'Status');
	  if($status=='y')
	  {
		  $status='Enabled';
	  }
	  else
	  {
		  $status='Disabled';
	  }
	  $sql='SELECT Name From admin Where id="'.$did.'"';
	  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  $dname=mysql_result($result,0,'Name');
	  
	echo"<tr><td> Staff Name </td><td>".$sname."</tr>";
	echo"<tr><td> Staff id </td><td>".$sid."</tr>";
	echo"<tr><td> Department Name </td><td>".$dname."</tr>";
	echo"<tr><td> Department id </td><td>".$did."</tr>";
	echo"<tr><td> Qualification </td><td>".$quli."</tr>";
	echo"<tr><td> Specification </td><td>".$spec."</tr>";
	echo"<tr><td> Password </td><td>".$pass."</tr>";
	echo"<tr><td> Mail id </td><td>".$mail."</tr>";
	echo"<tr><td> Blood </td><td>".$blood."</tr>";
	echo"<tr><td> Date Of Birth </td><td>".$dob."</tr>";
	echo"<tr><td> Age </td><td>".$age."</tr>";
	echo"<tr><td> Address </td><td>".$ad."</tr>";
	echo"<tr><td> Status </td><td>".$status."</tr>";
	
	
	
	?>
	</table>
	<form><br>
	<a href="superuser_profile.php"><input type="button" value=" Edit " style="font-size:14pt;width:120px;"></a><br><br>
	</form>
	</center>
	
</body>
</html>