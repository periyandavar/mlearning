
<?php
  session_start();
  require('connect.php');
  include('get_results.php');
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
    <title>Create Department</title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
	 <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript">
    $(window).scroll(function ()
    {
	  if($(document).height() <= $(window).scrollTop() + $(window).height())
	  {
		loadmore();
	  }
    });

    function loadmore()
    {
      var val = document.getElementById("row_no").value;
      $.ajax({
      type: 'post',
      url: 'get_results.php',
      data: {
       getresult:val
      },
      success: function (response) {
	  var content = document.getElementById("all_rows");
      content.innerHTML = content.innerHTML+response;

      // We increase the value by 10 because we limit the results by 10
      document.getElementById("row_no").value = Number(val)+10;
      }
      });
    }
</script>
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
</div>	<div class="wrapper">
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
	  echo "<br>".$rs['College_Name']." (".$id.")</h5></table><b>";
?>                  
            </div>
			</div>
			</div>
            <ul class="nav">
                <li>
                    <a href="sadminedit.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:13px"> Profile</p>
                    </a>
                </li>
                <li>
                    <a href="edit.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:13px"> Edit Page</p>
                    </a>
                </li>
                
                <li  class="active">
                    <a href="department.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Charm', cursive;color:'black';font-size:13px">New Department</p>
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
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:15px">Log out</p>
                    </a>           </li>
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">New Department</a>
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
<h3>Create New Department </h3><br>
<form action="department.php" method="POST">
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group"></div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Department Code </label>
                                                <input type="text" name="did" required="required" class="form-control border-input"  placeholder="Department Code">
                                            </div>
                                        </div>
								         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Department Name</label>
											    <input type="text" name="dname" required="required" class="form-control border-input"  placeholder="Department Name">
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Head </label>
												 <input type="text" class="form-control border-input" required="required" name="hod" placeholder="Head">
                                            </div>
                                        </div>
                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <label>  Mail Id </label>
												<input type="email" class="form-control border-input" required="required" name="mail" placeholder=" E-Mail">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                             </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control border-input" required="required" placeholder="Password " name="pass" > 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control border-input" required="required" placeholder="Retype Password "name="pass1" > 
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
									
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" required="required" name='Create' value='Create'> Create</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form></center><br><br><br>
<?php
    if(isset($_POST['Create']))
    {
   	 $did=strtoupper($_POST['did']);
	 $dname=$_POST['dname'];
	 $hod=$_POST['hod'];
	 $mail=$_POST['mail'];
	 $pass=$_POST['pass'];
	 $pass1=$_POST['pass1'];
     $col=$_SESSION['value2'];
     if($pass!=$pass1)
	 {
		 echo"<script>alert('The passwords are dismatch ')</script>";
	 }
	 elseif(strlen($pass1>=12 and$pass1<=6))
	 {
	    echo"<script>alert('The password must be six to tweleve charecters long ')</script>";
	 }	 
	 elseif($did=='')
	 {
		 echo"<script>alert('Please enter the department id ')</script>";
	 }
	 elseif($dname=='')
	 {
		 echo"<script>alert('Please enter the department name ')</script>";
	 }
	 elseif($hod=='')
	 {
		 echo"<script>alert('Please enter the head name ')</script>";
	 }
     else
	 {
	    $query="insert into admin (id,Name,Head,Password,status,MailId,CollegeCode) values ('$did','$dname','$hod','$pass1','y','$mail','$col')";
	     if(mysqli_query($link,$query))
	{
		 echo "<h3> New Department is added sucessfully,...!</h3>";
         $sql='Update super_admin set Departments=Departments+1 Where id="'.$_SESSION['value2'].'"'	;
         mysqli_query($link,$sql);
	 }
	 else
	 {
		  echo "<h3>Registeration is failed due to Invalid duplicate data...!</h3>";
	 }
	 }
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
					$sql='Update admin set status="'.$st.'" Where id="'.$id.'"'	;
                   (mysqli_query($link,$sql));
				  }
				  if(isset($_POST['eb2']))
				  {
					  $i=$_POST['eb2'];
					  if($_POST['t'.$i]=='t'){
					$id=$_POST[$i];
               $sql='SELECT Name From admin where id="'.$id.'"';
	                $result=mysqli_query($link,$sql);
	                $rs=mysqli_fetch_array($result);
	                $name=$rs['Name'];
	 				$sql='Delete from admin Where id="'.$id.'"'	;		
					if(mysqli_query($link,$sql))					
					{
						echo$name.' Department is Deleted Successfully,...!';
					}
				   else
					{
						echo'Unable to Delete the '.$name.' Department ,...!';
					}
				  }}
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Available Departments </h4>
                                <p class="category">Departments in our college</p>
                            </div>
                            <div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                        <th> Id </th>
                                    	<th>Department Name</th>
                                    	<th>Head</th>
                                    	<th>Mail id </th>
										<th>Staffs Count</th>
                                    	<th>Papers Count</th>
										<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<script>
											function submitform(a)
											{
												if(confirm("Are sure you want to delete the Department Deleting the Department will delete all the records under the department..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>
									
								<?php
									$sql='SELECT  * From admin  limit 0,10 ';
                                    $select=mysqli_query($link,$sql);  
                                    $i=-1;   while($row=mysqli_fetch_array($select))
                                    { $i=$i+1;
                                        echo'<tr>
                                        	<td>'.$row['id'].'</td>
                                        	<td>'.$row['Name'].'</td>
                                        	<td>'.$row['head'].'</td>
                                        	<td>'.$row['MailId'].'</td>
                                        	<td>'.$row['StaffsCount'].'</td>
											<td>'.$row['PapersCount'].'</td>';
											if(($row['status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="department.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									  
									}
									?></tbody>  </table><div id="all_rows"></div>
									<input type="hidden" id="row_no" value="10">
                              

</div></body>

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
