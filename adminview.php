<?php
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

require_once('db.php');

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
    <title>Admin </title>
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
               </td><td><h5>Admin
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT * From admin where id="'.$id.'"';
	  $result=mysqli_query($link, $sql);
	  $result=mysqli_fetch_assoc($result);
      $name = $result['Name'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?>             
                 
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li class="active">
                    <a href="adminview.php">
                        <i class="ti-user"></i>
                        <p> Profile</p>
                    </a>
                </li>
				
                <li>
                    <a href="browse_staffs.php">
                        <i class="ti-text"></i>
                        <p>Browse</p>
                    </a>
                </li>
				<li>
                    <a href="new_staff.php">
                        <i class="ti-pencil-alt2"></i>
                        <p> Add Staff</p>
                    </a>
                 </li>			
                <li>
                    <a href="new_class.php">
                        <i class="ti-export"></i>
                        <p>New Class</p>
                    </a>
                </li>
				
                <li>
                    <a href="new_paper.php ">
                        <i class="ti-view-list-alt"></i>
                        <p>Add Paper</p>
                    </a>
                </li>
				
				<li >
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p>Manage Paper</p>
                    </a>
                </li>
				<li>
                    <a href="admin_notification.php">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>Analytics</p>
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
<br>
	<center>
	<h3>My Profile </h3><br>
	<table border="0" width="520" style="font-size:14pt;" height="380">
	<?php
	  $did=$result['id'];
	  $dname=$result['Name'];
	  $hod=$result['head'];
      $scount=$result['StaffsCount'];                     	
	  $pcount=$result['PapersCount'];
	  $ccode=$result['CollegeCode'];
	  $pass=$result['Password'];
	  $mail=$result['Mailid'];
	  $status=$result['Status'];
	  if($status=='y')
	  {
		  $status='Enabled';
	  }
	  else
	  {
		  $status='Disabled';
	  }
	echo"<tr><td> Department Name </td><td>".$dname."</tr>";
	echo"<tr><td> Department id </td><td>".$did."</tr>";
	echo"<tr><td> Head of The Department </td><td>".$hod."</tr>";
	
	echo"<tr><td> Password </td><td>".$pass."</tr>";
	echo"<tr><td> Mail id </td><td>".$mail."</tr>";
	echo"<tr><td> Number of Staffs </td><td>".$scount."</tr>";
	echo"<tr><td> Papers offered </td><td>".$pcount."</tr>";
	echo"<tr><td> status </td><td>".$status."</tr>";
	?>
	</table><br>
	<form>
	<a href="admin_profile.php"><input type="button" value=" Edit " style="font-size:14pt;width:120px;"></a><br><br>
	</form>
	</center>
</body>
</html>