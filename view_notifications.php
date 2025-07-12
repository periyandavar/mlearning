<?php
  session_start();
  if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value1']!='U')
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
<meta charset="UTF-8">
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Notification</title>
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
		  <div class='imageing' style="background-image: url('img/user-img-background.jpg');">
			<div class='image' >
			<div class="logo">
			<b><table style='color:white; font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
					 </td><td><h5><a href="user.php" >STUDENT
<?php
         $id=$_SESSION['value2'];
         $link=mysql_connect("localhost","root","") ;
    mysql_select_db("mlearning",$link) or die (mysql_error());
    $sql='SELECT Student_Name From user where Student_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $name=mysql_result($result,0,'Student_Name');
	  echo "<br>".$name." (".$id.")</a></h5></table></b>";
?>       
            </div>
			</div>
			</div>
            <ul class="nav">
                <li>
                    <a href="user_profile.php">
                        <i class="ti-user"></i>
                        <p> Profile</p>
                    </a>
                </li>
				<li>
                    <a href="syllabus.php">
                        <i class="ti-palette"></i>
                        <p>Syllabus</p>
                    </a>
                </li>
				<li>
                    <a href="view_notes.php">
                        <i class="ti-panel"></i>
                        <p>Notes</p>
                    </a>
                </li>
                <li>
                    <a href="view_quiz.php">
                        <i class="ti-text"></i>
                        <p>Quiz</p>
                    </a>
                </li>
                <li>
                    <a href="view_modelquestions.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Model Questions</p>
                    </a>
                </li>
                <li>
                    <a href="view_photography.php">
                        <i class="ti-map"></i>
                        <p>Photography</p>
                    </a>
                </li>
                <li>
                    <a href="view_videography.php">
                        <i class="ti-export"></i>
                        <p>Videography</p>
                    </a>
                </li>
				<li>
                    <a href="view_assignment.php">
                        <i class="ti-pencil-alt2"></i>
                        <p>Assignments</p>
                    </a>
                <li class="active">
                    <a href="view_notifications.php">
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
                    <a class="navbar-brand" href="#">Notifications</a>
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
<h3> Notifications </h3><br>
 <div class="container-fluid">
<?php
if(isset($_POST['eb5']))
				  {
					$id=$_POST['eb5'];
					$sql='SELECT topic From super_admin_notification where id="'.$id.'"';
	                $result=mysql_query($sql,$link);
	                $name=mysql_result($result,0,'topic');
	 				$sql='Delete from super_admin_notification Where id="'.$id.'"'	;
					echo'<script> if(!(confirm("Are you sure, you want to Delete the '.$name.' Notification ,...?")))
					{
						window.location="notification.php";
					}</script>';
					if(mysql_query($sql))
					{
						echo$name.' Notification is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the '.$name.' Department ,...!';
					}
				  }?>
                     <table width='990'><tr><td>
                           	<?php
								$sql='SELECT  * From super_admin_notification where send_to="All" or send_to="user"  ';
		                            $result=mysql_query($sql,$link);
		                            $num_rows=mysql_num_rows($result);
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category"> Notifications from Super Admin </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> Notification </th>
                                    	
                                    </thead>
                                    <tbody>';
									for($i=0;$i<$num_rows;$i++)
									{
										if(mysql_result($result,$i,'status')=='y')
										{
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.mysql_result($result,$i,'topic') .'<br> </b> <i class="ti-bell"></i>'.mysql_result($result,$i,'content').'"</span>
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
								$sql='SELECT  * From admin_notification where sendto="All" or sendto="user"';
		                            $result=mysql_query($sql,$link);
		                            $num_rows=mysql_num_rows($result);
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category"> Notifications from Admin </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table height="75%" class="table table-striped">
                                    <thead>
                                        <th> Notification </th>
                                    	
                                    </thead>
                                    <tbody>';
									for($i=0;$i<$num_rows;$i++)
									{
										if(mysql_result($result,$i,'status')=='y')
										{
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.mysql_result($result,$i,'topic') .'<br> </b> <i class="ti-bell"></i>'.mysql_result($result,$i,'content').'"</span>
                     </div></div>   </td>
                                        	
											</tr>';
									}
									}
                                    echo' </tbody>
                                </table>
</div>
                        </div>
                            </div>
                        </div>
                    </div></td></tr></table>';

								
								?>
								
                    </div>
					</div>
				


</body>
</html>