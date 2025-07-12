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

<?php
                   if(isset($_POST['eb']))
				  {
				    $st=$_POST['eb'];
					if($st=='Disabled')
					{
						$st='n';
					}
					else
					{
						$st='y';
					}
					$id=$_POST['id'];
					$sql='Update super_admin_notification set status="'.$st.'" Where id="'.$id.'"'	;
                    ((mysql_query($link,$sql)));
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
         <link href="css/ml2.css" rel="stylesheet"/>
    <title>Notifications</title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	

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
               </td><td><a href="superuser.php"> <h5 style="font-family: 'Courgette', cursive; color:white;">MASTER
<?php
         $id=$_SESSION['value2'];
		     $sql='SELECT Staff_Name From super_user where Staff_id="'.$id.'"';
      $result=mysqli_query($link,$sql);
      ($row=mysqli_fetch_assoc($result));
	  $name=$row['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5></a></td></tr></table><b>";
?>       
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li>
                    <a href="superuser_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px"> Profile</p>
                    </a>
                </li>
                <li>
                    <a href="superuser.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Post </p>
                    </a>
                </li>
								<li>
                    <a href="live.php">
                        <i class="ti-control-forward"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Go Live </p>
                    </a>
                </li>
				<li >
                    <a href="notes.php">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Notes</p>
                    </a>
                </li>
                <li>
                    <a href="quiz.php">
                        <i class="ti-text"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Quiz</p>
                    </a>
                </li>
                <li>
                    <a href="modelquestions.php">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Model Questions</p>
                    </a>
                </li>
                <li>
                    <a href="photography.php">
                        <i class="ti-map"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Photography</p>
                    </a>
                </li>
                <li>
                    <a href="videography.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Videography</p>
                    </a>
                </li>
				<li>
                    <a href="assignment.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Assignments</p>
                    </a>
                <li class="active">
                    <a href="notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Charm', cursive; font-size:14px">Notifications</p>
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Notifications</a>
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
<h3> Notifications </h3><br>
 <div class="container-fluid">
<?php
if(isset($_POST['eb5']))
				  {
					$id=$_POST['eb5'];
                    $sql='SELECT topic From super_admin_notification where id="'.$id.'"';
	                $result=mysqli_query($sql,$link);
	                ($row=mysqli_fetch_assoc($result));
	                $name=$row['topic'];
	 				$sql='Delete from super_admin_notification Where id="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						echo$name.' Notification is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the '.$name.' Department ,...!';
					}
				  }?><div class="table-responsive">
                     <table width='990'><tr><td>
                           	<?php
								$sql='SELECT  * From super_admin_notification where send_to="All" or send_to="super_user"  ';
		                            $result=mysqli_query($link,$sql);
		                            
									
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category"> College Notifications </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> Notification </th>
                                    	
                                    </thead>
                                    <tbody>';
									while($row=mysqli_fetch_assoc($result))
									{
										if($row['Status']=='y')
										{
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.$row['Topic'] .'<br> </b> <i class="ti-bell"></i><h5>'.$row['Content'].'</h5></span>
                     </div></div>   </td>
                                        	
											</tr>';
										}}
                                    echo' </tbody>
                                </table>
</div>
                        </div>
                            </div>
                        </div>
                    </div>';

								
								?>
					</td><td width='22'></td><td>
                           	<?php
								$sql='SELECT  * From admin_notification where sendto="All" or sendto="super_user"';
		                            $result=mysqli_query($link,$sql);
		                            
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category"> Department Notifications </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table height="75%" class="table table-striped">
                                    <thead>
                                        <th> Notification </th>
                                    	
                                    </thead>
                                    <tbody>';
									while($row=mysqli_fetch_assoc($result))
									{if($row['Status']=='y')
										{
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.$row['Topic'] .'<br> </b> <i class="ti-bell"></i><h5>'.$row['content'].'</h5></span>
                     </div></div>   </td>
                                        	
											</tr>';
									}}
                                    echo' </tbody>
                                </table>
</div>
                        </div>
                            </div>
                        </div>
                    </div></td></tr></table></div>';

								
								?>
								
                    </div>
					</div>
				


</body>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

</html>