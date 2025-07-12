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
    <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Manage Paper </title>
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
                    <a href="#">
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
				
				<li class="active">
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Charm', cursive; font-size:14px">Manage Paper</p>
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
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Manage Paper</a>
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
<br><center>
									<h3> Manage the subject </h3><br>
									<?php
									if(isset($_POST['e2']))
									{
										$i=$_POST['e2'];
										$j=$_POST[$i];
										$_SESSION['value4']=$j;
										$q2='select papercode from link where id="'.$j.'"';
										$result1=mysqli_query($link,$q2);
										($row=mysqli_fetch_assoc($result1));
                                        $j=$row['papercode'];
										$q2='select subjectname from subject where subjectcode="'.$j.'"';
										$result1=mysqli_query($link,$q2);
                                        ($row=mysqli_fetch_assoc($result1));$j=$row['subjectname'];
										echo'<form action="manage_paper.php" method="POST" >
 <div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-4">
										<div class="form-group">
                                               <label>Subject Name</label>
											 <input type="text" name="sbid" disabled class="form-control border-input" value="'.$j.'">
									    </div>
										</div>
										
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Staff Name</label>
											  <select name="sid" required="required" class="form-control border-input"><option value="">';

$sql='SELECT Staff_Name From super_user where DepartmentCode="'.$id.'"';
	  $result=mysqli_query($link,$sql);
      while($row=mysqli_fetch_assoc($result))
	  {
	  $dname=$row['Staff_Name'];
	  echo "<option value='$dname'> $dname ";
	  }
	  
echo'
</select>
									    </div>
										</div>
										
										</div><div class="row">
										<div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
											<label> Class Name </label>
											<select required="required" name="cid" class="form-control border-input" > <option value=""> ';
											if($j!=""){
	$sql='SELECT offeredto From subject where SubjectName="'.$j.'"';
	$results=mysqli_query($link,$sql);
	($rows=mysqli_fetch_assoc($results));
	  $key=$rows['offeredto'];
      $sql='SELECT ClassName From class where departmentcode="'.$key.'"';
	  $result=mysqli_query($link,$sql);
	  while($rows=mysqli_fetch_assoc($result))
    {
	  $clname=$rows['ClassName'];
	  echo "<option value='$clname'> $clname ";
	  }
	}
	echo'								</select>
 </div>
                                        </div>
										</div>
										<div class="row">
                                      <div class="col-md-12">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name="update3" value="Create"> change </button>
                                    </div>
                                   </div>
								   </div>
								   </div>
								   </div></form>';
								   }
?>
										   
<?php
    if(isset($_POST['update2']))
    {
	 $id=$_SESSION['value2'];
	 $clid=$_POST['update2'];
	 $del=$_POST[$clid];
	 $sub=$_POST['subj'.$clid];
	 $cla=$_POST['class'.$clid];
		 $query='Delete from link2 where ClassCode="'.$cla.'" and papercode="'.$sub.'"';
	     if(!(mysqli_query($link,$query)))
		 {
		  echo "<h3> failed Network Error...!.</h3>";
	   }else
	 {
		 $query="Delete from link where id='".$del."'";
			if( mysqli_query($link,$query)){
			echo "<h3>Success,...!</h3>";}
			else
			{echo '<h3>unable to update,...!</h3>' ;}
	 }
	 
}
?>	 								     
						     
<br>
<?php
									$sql='SELECT  * From link where departmentCode="'.$_SESSION['value2'].'"';
		                            $result=mysqli_query($link,$sql);
									echo'<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Update Subject </h4>
                                <p class="category">Subjects offered in our department</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> Subject Name </th>
										<th> Staff Name Name </th>
                                    	<th> Class Name</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>';
									while($row=mysqli_fetch_assoc($result))
									{
										$a=$row['PaperCode'];
										$q1='select subjectname from subject where subjectcode="'.$a.'"';
										$b=$row['StaffCode'];
										$q2='select staff_name from super_user where staff_id="'.$b.'"';
										$result1=mysqli_query($link,$q1);
                                        $result2=mysqli_query($link,$q2);	
										 $nm=mysqli_num_rows($result2);$nn=mysqli_num_rows($result1);
									if(($nm>0) and ($nn>0))							{ $i=0;
									   ($row1=mysqli_fetch_assoc($result1));
                                       ($row2=mysqli_fetch_assoc($result2));
                                        echo'<tr>
                                           <td>'.$row1['subjectname'].'</td>
                                        	<td>'.$row2['staff_name'].'</td>'.
											'<td>'.$row['ClassCode'].'</td> <td><form id="myform" action="update.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
												<input type="hidden" name="class'.$i.'" value="'.$row['ClassCode'].'" >
											<input type="hidden" name="subj'.$i.'" value="'.$row['PaperCode'].'" >
										
											  <button  type="submit" class="btn btn-info btn-fill btn-wd" name="e2" value="'.$i.'">'.'EDIT'.'</button><button  type="submit" name="update2" value="'.$i.'">'.'X'.'</button>
                                     </form>
											 
                                      </td>  </tr>';
									}
									    $i++;
									}
									echo'</tbody>
									
                                </table>';
?>
</center>
</body>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>
	<script src="assets/js/paper-dashboard.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>

</html>