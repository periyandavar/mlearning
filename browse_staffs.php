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
    <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	

    <title>Browse </title>
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
      url: 'loadr.php',
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
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
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
					$sql='Update super_user set status="'.$st.'" Where Staff_id="'.$id.'"'	;
                    (mysqli_query($link,$sql));
				  }
?>
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
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Profile</p>
                    </a>
                </li>
				
                <li class='active'>
                    <a href="browse_staffs.php">
                        <i class="ti-text"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px">Browse</p>
                    </a>
                </li>
				<li>
                    <a href="new_staff.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Add Staff</p>
                    </a>
                 </li>			
                <li>
                    <a href="new_class.php">
                        <i class="ti-export"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">New Class</p>
                    </a>
                </li>
				
                <li>
                    <a href="new_paper.php ">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Add Paper</p>
                    </a>
                </li>
				
				<li >
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Manage Paper</p>
                    </a>
                </li>
				<li>
                    <a href="admin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Log out</p>
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
                     <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Add Staff</a>
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
<h3>Search for a Staff </h3><br>
<?php
if(isset($_POST['eb5']))
				  {
					  if($_POST['t']=='t'){
					$id=$_POST['eb5'];
					$sql='SELECT staff_name From super_user where staff_id="'.$id.'"';
	                $result=mysqli_query($link,$sql);if(mysqli_num_rows($result)>0){
	                $rs=mysqli_fetch_array($result);
	                $name=$rs['staff_name'];}
	 				$sql='Delete from super_user Where staff_id="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						echo$name.' Staff id is Deleted Successfully,...!';
						$sql='update admin set Staffscount=staffscount-1 where id='.$_SESSION['value2'].'"';
						(mysqli_query($link,$sql));
						$sql="Delete from link where staff_id='".$id."'";
					     mysqli_query($link,$sql);

					}
					else
					{
						echo'Unable to Delete the '.$name.' staff id ,...!';
					  }}
				  }?>

<?php
                    if(isset($_POST['eb10']))
				  {
					  
					$i=$_POST['eb10'];
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
					$sql='Update user set status="'.$st.'" Where student_id="'.$id.'"'	;
                    (mysqli_query($link,$sql));
					}
?>
				 <form action="browse_staffs.php" method="POST">
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-2">
										<div class="form-group">
                                               <label><h5>Staff Name</h5></label>
									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
                                        <select class="form-control border-input" name="name" style="font-size:14pt;width:320px;">
										<option>
										<?php
										$sql='SELECT staff_Name,Staff_id From super_user where DepartmentCode="'.$_SESSION['value2'].'"';
										$result=mysqli_query($link,$sql);
										while($row=mysqli_fetch_assoc($result))
										{
										$dname=$row['staff_Name'];
										$did=$row['Staff_id'];
										echo "<option value='$did'> $dname ";
									    }	  
									   ?>
									   </select>
                                        </div>
								        </div> 
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Go' value='Create'> Go </button>
                                    </div>
                                   </div>
                              
                                    </div>
									</div>
                                    </div>
									<script>
											function submitform1()
											{
												if(confirm('Are sure you want to delete the Department Deleting the Department will delete all the records under the department..?')){
												document.getElementById("t").value = "t";}
												else{document.getElementById("t").value = "f";
												}
												
											}
											</script>
									
<?php
                    if(isset($_POST['Go']))
								{
								    $name=$_POST['name'];
									if($name=='')
									{
										echo"<script>alert('Please select the Staff name ')</script>";
									}
									$sql='SELECT  * From super_user where staff_id="'.$name.'"';
		                            $result=mysqli_query($link,$sql);
		                            $rs=mysqli_fetch_array($result);
									echo'<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Results</h4>
                                <p class="category">Here is your search results</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    
                                    <thead>
                                        <th> Id </th>
                                    	<th>Staff Name</th>
                                    	<th>Qualification</th>
                                    	<th>Specification </th>
										<th>Age</th>
                                    	<th>Blood</th>
										<th>Mail id</th>
										<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>'.$rs['Staff_id'].'</td>
                                        	<td>'.$rs['Staff_Name'].'</td>
                                        	<td>'.$rs['Qualification'].'</td>
                                        	<td>'.$rs['Specification'].'</td>
                                        	<td>'.$rs['Age'].'</td>
											<td>'.$rs['Blood'].'</td>
											<td>'.$rs['MailId'].'</td>';
											if($rs['Status']=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>
											
											<form id="myform" action="browse_staffs.php" method="POST">
											 <input type="hidden" name="id" value="'.$rs['Staff_id'].'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb" value="'.$n.'">'.$n1.'</button>
											 <input type="hidden" name="t" id="t">
											 <button id="click" onclick="submitform1();" type="submit" name="eb5" value="'.$rs['Staff_id'].'">'.'X'.'</button></form>
                                      </td>  </tr>
                                     </tbody>
                                </table>

                            </div>
                        </div>
                    </div>';
								}


								 if(isset($_POST['eb6']))
				  {
					$i=$_POST['eb6'];
					$id=$_POST[$i];
					$name=$id;
	 				$sql='Delete from user Where student_id="'.$id.'"'	;					
	               if(mysqli_query($link,$sql))
					{
						echo$name.' Staff id is Deleted Successfully,...!';
						$sql='update admin set Staffscount=staffscount-1 where id='.$_SESSION['value2'];
						(mysqli_query($link,$sql));
						$sql="Delete from link where staff_id='".$id."'";
					   mysqli_query($link,$sql);

					}
					else
					{
						echo'Unable to Delete the '.$name.' staff id ,...!';
					  }
				  }  
				 ?>
				 				<h3>Add a single Student </h3><br></form>
								<form action="browse_staffs.php" method="POST">
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-1">
										<div class="form-group">
                                               <label><h5>Class </h5></label>
									    </div>
										</div>
										<div class="col-md-2">
										<div class="form-group">
                                        <select class="form-control border-input" name="name1" >
										<option>
										<?php
										$sql='SELECT classcode From class where DepartmentCode="'.$_SESSION['value2'].'"';
										$result=mysqli_query($link,$sql);
										while($row=mysqli_fetch_assoc($result)){
										$dname=$row['classcode'];
										echo "<option value=$dname> $dname ";
									    }	  
									   ?>
									   </select>
                                        </div>
								        </div> 
										<div class="col-md-1">
                                            <div class="form-group">
											<label>Number</label>
                                             </div>
                                        </div>
                                        <div class="col-md-2">
										<div class="form-group">
                                               <input type='number'  min='01' class="form-control border-input" placeholder='last two digits of Reg.no' name='r1'>
									    </div>
										</div>
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Go3' value='Create'> ADD </button>
                                    </div>
                                   </div>
                                    </div>
									</div>
                                    </div>
                                </form>
								<?php
                   			if(isset($_POST['Go3']))
								{
									$id=$_SESSION['value2'];
									$reg=$_POST['r1'];
						            $name=$_POST['name1'];
									if($name=='')
									{
										echo"<script>alert('Please select the class name ')</script>";
									}
									elseif($reg=='')
									{
										echo"<script>alert('Please enter the last two digit of the student register number ')</script>";
									}
									else
									{
										$query="insert into user (Student_id,ClassCode,DepartmentCode,Password,Status,MailId) values ('$name$reg','$name','$id','$name$reg','y','$name$reg@gmail.com')";
								        if(mysqli_query($link,$query))
										{
											echo'A Student is added successfuly';
										}
										else
										{
											echo'unable to add a student may be invalid data';
										}
									}
									}
							?>	
									<h3>Search for a Student </h3><br></form>
								<form action="browse_staffs.php" method="POST">
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-1">
										<div class="form-group">
                                               <label><h5>Prifix</h5></label>
									    </div>
										</div>
										<div class="col-md-2">
										<div class="form-group">
                                        <select class="form-control border-input" name="name1" >
										<option>
										<?php
										$sql='SELECT classcode From class where DepartmentCode="'.$_SESSION['value2'].'"';
										$result=mysqli_query($link,$sql);
										while($row=mysqli_fetch_assoc($result)){
										$dname=$row['classcode'];
										echo "<option value=$dname> $dname ";
									    }	  
									   ?>
									   </select>
                                        </div>
								        </div> 
										<div class="col-md-1">
                                            <div class="form-group">
											<label>Number</label>
                                             </div>
                                        </div>
                                        <div class="col-md-2">
										<div class="form-group">
                                               <input type='number' min='01'  class="form-control border-input" placeholder='last two digits of Reg.no' name='r1'>
									    </div>
										</div>
										
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Go2' value='Create'> Go </button>
                                    </div>
                                   </div>
                              
                                    </div>
									</div>
                                    </div>

                                </form></center>
								<?php
                   			if(isset($_POST['Go2']))
								{
									$reg=$_POST['r1'];
						            $name=$_POST['name1'];
									if($name=='')
									{
										echo"<script>alert('Please select the class name ')</script>";
									}
									else{
									if($reg=='')
									{
										$sql='select * from user where Classcode="'.$name.'"';
									}
									else
									{
										$sql='select * from user where student_id="'.$name.$reg.'"';
									}
									mysqli_query($link,$sql);
									$result=mysqli_query($link,$sql);
		                            $num_rows=mysqli_num_rows($result);
									if($num_rows==0)
									{
										echo'<center><h4>no records found,.....!</h4><center>';
									}
									else{
									echo'<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Results</h4>
                                <p class="category">Here is your search results</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    
                                    <thead>
                                        <th> Id </th>
                                    	<th>Student Name</th>
                                    	<th>Age</th>
                                    	<th>Blood</th>
										<th>Mail id</th>
										<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>';
										while($row=mysqli_fetch_assoc($result))
										{
										    $i=0;
											echo'
                                        	<td>'.$row['Student_Id'].'</td>
                                        	<td>'.$row['Student_Name'].'</td>
                                        	<td>'.$row['Age'].'</td>
											<td>'.$row['Blood'].'</td>
											<td>'.$row['MailId'].'</td>';
											if($row['Status']=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td><form id="myform" action="browse_staffs.php" method="POST"> 
                                              <input type="hidden" name="'.$i.'" value="'.$row['Student_Id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb10" value="'.$i.'">'.$n1.'</button>
											 <button  type="submit" name="eb6" value="'.$i.'">'.'X'.'</button>
                                      </td>  </tr></form>';
									$i++;
									}
									  echo'
                                     </tbody>
                                </table>

                            </div>
                        </div>
                    </div>';

									}}
								}
								
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
					$sql='Update super_user set status="'.$st.'" Where staff_id="'.$id.'"'	;
                    ((mysqli_query($link,$sql)));
				  }
				?>
								<?php
								  if(isset($_POST['eb2']))
				  {
					  $i=$_POST['eb2'];
					  if($_POST['t'.$i]=='t'){
					$id=$_POST[$i];
					 $sql='SELECT Staff_Name From super_user where staff_id="'.$id.'"';
	                $result=mysqli_query($link,$sql);
	                $rs=mysqli_fetch_array($result);
	                $name=$rs['Staff_Name'];
	 				$sql='Delete from super_user Where staff_id="'.$id.'"'	;		
					if(mysqli_query($link,$sql))
					{
						echo$name.' Staff id is Deleted Successfully,...!';
						$sql='update admin set Staffscount=staffscount-1 where id="'.$_SESSION['value2'].'"';;
						(mysqli_query($link,$sql));
						$sql="Delete from link where staff_id='".$id."'";
					  mysqli_query($link,$sql);
					}
					else
					{
						echo'Unable to Delete the '.$name.' staff id ,...!';
					  }
				  }}
				 ?>


								<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Available Staffs </h4>
                                <p class="category">Staffs in our Department</p>
                            </div>
                            <div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                    <th> Id </th>
                                    	<th>Staff Name</th>
                                    	<th>Qualification</th>
                                    	<th>Specification </th>
										<th>Age</th>
                                    	<th>Blood</th>
										<th>Mail id</th>
										<th>Status</th>
										<th>Action</th>
                                     </thead>
                                    <tbody>
									<script>
											function submitform(a)
											{
												if(confirm("Are sure you want to delete the Staff Id..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>
									
								<?php
									$sql='SELECT  * From super_user where departmentCode="'.$_SESSION['value2'].'" limit 0,10 ';
                                    $select=mysqli_query($link,$sql);  
                                    $i=-1;   while($row=mysqli_fetch_array($select))
                                    { $i=$i+1;
                                        echo'<tr>
                                        	<td>'.$row['Staff_id'].'</td>
                                        	<td>'.$row['Staff_Name'].'</td>
                                        	<td>'.$row['Qualification'].'</td>
											<td>'.$row['Specification'].'</td>
                                        	<td>'.$row['Age'].'</td>
                                        	<td>'.$row['Blood'].'</td>
                                        	<td>'.$row['MailId'].'</td>';
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="browse_staffs.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['Staff_id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									  
									}
									?></tbody>  </table><div id="all_rows"></div>
									<input type="hidden" id="row_no" value="10">
                              

</div>
                            </div>

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