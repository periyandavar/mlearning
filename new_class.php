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
    <title>Add Class </title>
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
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
                <li class="active">
                    <a href="new_class.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Charm', cursive; font-size:14px">New Class</p>
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
                        <p style="font-family:'Kalam', cursive; font-size:14px">log out</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel" style="background-color:#f7e0ff;">
        <nav class="navbar navbar-default" style="background-color:dodgerblue;opacity:.7">
            <div class="container-fluid" >
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Add Class</a>
                </div><div class="collapse navbar-collapse">
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
<h3>New Class </h3><br>
<form action="new_class.php" method="POST">
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-4">
										<div class="form-group">
                                        <label> Class Code</label>
										<input type='text' required="required" class="form-control border-input" name='cid' placeholder='Class Name'/>
										</div>
								        </div> 
										
										<div class="col-md-3">
										<div class="form-group">
                                        <label> Number of students</label>
										<input type='number' required="required" class="form-control border-input" name='stno' min='0' placeholder='Number of students'/>
										</div>
								        </div>
</div>						<div class="row">    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                    				
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Create' value='Create'> ADD </button>
                                    </div>
                                   </div>
                                    </div>
									</div>
                                    </div>
                                </form><br><br>
<?php
	if(isset($_POST['Create']))
    {
	 $id=$_SESSION['value2'];
	 $pri=strtoupper($_POST['cid']);
	 $no=$_POST['stno'];
	 $i=0;
	 		 $query="insert into class (classname,ClassCode,DepartmentCode,Strength,Status) values ('$pri','$pri','$id','$no','y')";
	     if(!(mysqli_query($link,$query)))
		 {
		  echo "<h3>Registeration is failed due to Invalid data...!</h3>";
		  $i=$i+$no;
	     }
		 else{
	 for($i=1;$i<=$no;$i++)
	 {
		 if($i<10)
		 {
			 $const=$pri."0".$i;
		 }
         else
         {
            $const=$pri.$i;
		 }			
		$const1=$const.'@gmail.com';
        $query="insert into user (Student_id,ClassCode,DepartmentCode,Password,Status,MailId) values ('$const','$pri','$id','$const','y','$const1')";
	     if(!(mysqli_query($link,$query)))
		 {
		  echo "<h3>Registeration is failed due to Invalid data...!</h3>";
		  $i=$i+$no;
	     }
	 }
	 
		 }	 
		 if($i-1==$no)
	 {
		 echo "<h3>New Class added sucessfully,...!</h3>" ; }
}
?>
<?php
				  if(isset($_POST['eb1']))
				  {					  
					$i=$_POST['eb1'];
				    $st=$_POST[(($i+1)*-1)];
					if($st=='Disabled')
					{
						$st='n';
					}
					else
					{
						$st='y';
					}
					$id=$_POST[$i];
					$sql='Update class set status="'.$st.'" Where classcode="'.$id.'"'	;
                    (mysqli_query($link,$sql));
					$sql='update user set status="'.$st.'" Where classcode="'.$id.'"'	;
				    mysqli_query($link,$sql);
				  }
?>
<?php
								 if(isset($_POST['eb2']))
				  {
					$i=$_POST['eb2'];
					 if($_POST['t'.$i]=='t'){

					$id=$_POST[$i];$name=$id;
					$sql='Delete from class Where classcode="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						$sql='Delete from user Where classcode="'.$id.'"'	;
						mysqli_query($link,$sql);
						$sql='Delete from link Where classcode="'.$id.'"'	;
						mysqli_query($link,$sql);
						$sql='Delete from link2 Where classcode="'.$id.'"';
						mysqli_query($link,$sql);
						echo$name.' Class is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the '.$name.' Class ,...!';
					}
				  }
				  }				  
				 ?>

<?php
									$sql='SELECT  * From class where departmentCode="'.$_SESSION['value2'].'"';
		                            $result=mysqli_query($link,$sql);
									echo'<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Available Classes </h4>
                                <p class="category">Classes in our Department</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> Class Code </th>
                                    	<th> Number of students </th>
                                    	<th>Status</th>
										<th>Action</th>
										
																<script>					function submitform(a)
											{
												if(confirm("Are sure you want to delete the class..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>	
                                    </thead>
                                    <tbody>';
									while($row=mysqli_fetch_assoc($result))
									{
									    $i=0;
                                        echo'<tr>
                                        <td>'.$row['ClassCode'].'</td>
                                        	<td>'.$row['Strength'].'</td>';
											if($row['Status']=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td><form id="myform" action="new_class.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['ClassCode'].'" >
																				 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form> </td>  </tr>';
									    $i++;
									}
									echo'</tbody>
									
                                </table>';
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