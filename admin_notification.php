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
?>

<?php
                require("connect.php");
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
					$sql='Update admin_notification set status="'.$st.'" Where id="'.$id.'"'	;
                    ((mysqli_query($link,$sql)));
				  }
				
				?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
<meta charset="UTF-8">
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
    <title>Notifications</title>
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
    $sql='SELECT Name From admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['Name'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?>
                 
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li>
                    <a href="admin_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px"> Profile</p>
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
                        <p style="font-family:'Kalam', cursive; font-size:14px">New Class</p>
                    </a>
                </li>
				
                <li>
                    <a href="new_paper.php ">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Add Paper</p>
                    </a>
                </li>
				
				<li>
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Manage Paper</p>
                    </a>
                </li>
				<li class='active'>
                    <a href="admin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Charm', cursive; font-size:14px">Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">log out</p>
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
<h3> Create Notification </h3><br>
<form action="admin_notification.php" method="POST">
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
											   <input required="required" type='text' class="form-control border-input" name='topic' placeholder='Heading'/>
									    </div>
										</div>
										<div class="col-md-1">
										<div class="form-group">
                                        </div>
								        </div> 
										
                                        <div class="col-md-3">
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
												<textarea required="required" rows="3" class="form-control border-input" name="cont" placeholder="Contents" > </textarea>
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
                                </form></center><br>
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
										  $id=$_SESSION['value2'];
										 $query="insert into admin_notification (topic,content,sendto,status,from1) values ('$topic','$cont','$name','y','$id')";
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
<?php
if(isset($_POST['eb5']))
				  {
					$id=$_POST['eb5'];
                    $sql='SELECT topic From admin_notification where id="'.$id.'"';
	                $result=mysqli_query($link,$sql);
	                $rs=mysqli_fetch_array($result);
	                $name=$rs['topic'];
	 				$sql='Delete from admin_notification Where id="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						echo$name.' Notification is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the '.$name.' Notification ,...!';
					}
				  }?>
  <div class="container-fluid">
                           	<?php
								$sql='SELECT  * From admin_notification ';
		                            $result=mysqli_query($link,$sql);
		                            
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Notification</h4>
                                <p class="category">Notifications sent by you</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> Notification </th>
                                    	<th> To</th>
                                    	<th>Status</th>
										<th> Edit status </th>
                                    </thead>
                                    <tbody>';
                                    $i=0;
									while($row=mysqli_fetch_assoc($result))
									{
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.$row['Topic'] .'<br> </b> <i class="ti-bell"></i>'.$row['content'].'</span>
                     </div></div>   </td>
                                        	<td>'.$row['sendto'].'</td>';
                                        	if($row['Status']=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }
											echo'<td>'.$y.'</td>
											<td><form action="admin_notification.php" method="POST">
											 <input type="hidden" name="id" value="'.$row['id'].'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb" value="'.$n.'">'.$n1.'</button>
											 <button " type="submit" name="eb5" value="'.$row['id'].'">'.'X'.'</button></form>
                                        </tr>';
									}
                                    echo' </tbody>
                                </table>

                            </div>
                        </div>
                    </div>';

								
								?>
								</div>
                        </div>
                    </div>
					</div>
					
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