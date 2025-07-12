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
    <title>Profile</title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
          <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
		 <script> function load()
    {
      var val = document.getElementById("datepicker").value;
	  document.getElementById("age").value=((new Date()).getFullYear()-(Number(val.split('-',1))));
    }</script>
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

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
                <li class='active'>
                    <a href="userview.php">
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
                
				<li >
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
                <li>
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
                    <a class="navbar-brand" href="#">Edit Profile</a>
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
								<?php
								if(isset($_POST['sub']))
								{

									$name=$_POST['name'];
									$age=$_POST['age'];
									$addr=$_POST['addr'];
									$pass=$_POST['pass'];
									$mail=$_POST['mail'];
									$blood=$_POST['blood'];
									$dob=$_POST['dob'];
									$gen=$_POST['gen'];
									if($mail=='')
									{
										 echo"<script>alert('You can not leave the mail id field as blank ')</script>";
									}
									elseif($gen=='')
									{
										 echo"<script>alert('You can not leave the gender field as blank ')</script>";
									}
									elseif($pass=='')
									{
										 echo"<script>alert('You can not leave the password field as blank ')</script>";
									}
									else{
									$q='update user set gender="'.$gen.'", Student_Name="'.$name.'",dob="'.$dob.'",age="'.$age.'",address="'.$addr.'",password="'.$pass.'",mailid="'.$mail.'",blood="'.$blood.' "where Student_id="'.$id.'" ';
									if(mysql_query($q))
									{
										echo'Your Profile is updated,....!';
									}
									else
									{
										echo'Failed to update your information ,....!'.$q;
									}
								}
								}
								?>
            
        <div class="content"><h3>Edit Profile</h3>
            <div class="container-fluid"> 
                            <div class="header">
                               
                            </div>
                            <div class="content">
                                <form action='user_profile.php' method='POST'>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Register Number </label>
												<?php
                                                echo '<input type="text" "name="reg" class="form-control border-input" disabled placeholder="Company" value="'.$id.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Student Name</label>
												<?php
                                                echo '<input type="text" name="name" class="form-control border-input" placeholder="Student Name" value="'.$name.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Class </label>
												<?php
												 $sql='SELECT ClassCode From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $name=mysql_result($result,0,'ClassCode');
												 $sql='SELECT Classname From class where ClassCode="'.$name.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $name=mysql_result($result,0,'Classname');
                                                 echo'<input type="text" class="form-control border-input" name="class" disabled placeholder="class" value="'.$name.'">';
												?>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Department </label>
												<?php
												 $sql='SELECT DepartmentCode From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $name=mysql_result($result,0,'DepartmentCode');
												 $sql='SELECT name From admin where id="'.$name.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $name=mysql_result($result,0,'name');
                                                 echo'<input type="text" class="form-control border-input" name="dept" disabled placeholder="'.$name.'" value="'.$name.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Date Of Birth as(yyyy-mm-dd) </label>
												<?php
                                                $sql='SELECT dob From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $age=mysql_result($result,0,'dob');
												  echo'
      <script>
         $(function() {
			$("#datepicker").datepicker({
  changeMonth: true,
  changeYear: true,
  dateFormat: "yy-mm-dd",
  defaultDate:new Date('.(date('Y')-37).',0,1),
  yearRange: "'.(date('Y')-37).':'.(date('Y')-17).'"
});
         });
      </script>'; 
	  echo'<input type="text" id="datepicker" onchange="load()" class="form-control border-input" name="dob" placeholder="'.'D-O-B'.'" value="'.$age.'">'; 
												?>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for='inputdob'>Age </label>
												<?php
												 $sql='SELECT age From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $age=mysql_result($result,0,'age');
												 echo'<input id="age" readonly type="number" class="form-control border-input" name="age" placeholder="'.'Age'.'" value="'.$age.'">'; 
												 ?>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
												<?php
												 $sql='SELECT address From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $add=mysql_result($result,0,'address');
												 echo'<textarea rows="3" class="form-control border-input" name="addr" placeholder="'.'Addreess'.'" >'.$add.'</textarea>'; 
												 ?>
                                        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
									    <div class="col-md-1">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Blood</label>
                                                <?php
												 $sql='SELECT blood From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
	                                             $bl=mysql_result($result,0,'blood');
												 echo'<input type="text" class="form-control border-input" placeholder="'.'Blood Group'.'"name="blood" value="'.$bl.'">'; 
												 ?>
                                            </div>
                                        </div>
										<div class="col-md-2">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <?php
												 $sql='SELECT gender From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $bl=mysql_result($result,0,'gender');
												 if($bl=='M')
												 { $c1=' ' ; $d1='F'; }
											     elseif($bl=='F')
												 { $c1=' ' ; $d1='M'; }
											     else
												 { $c1='M' ; $d1='F'; }
												 echo'<select name="gen" class="form-control border-input" > <option value="'.$bl.'">'.$bl.'<option value="'.$c1.'">'.$c1.'<option value="'.$d1.'">'.$d1.'</select>'; 
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mail Id</label>
                                                <?php
												 $sql='SELECT mailid From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $mail=mysql_result($result,0,'mailid');
												 echo'<input type="email" class="form-control border-input" placeholder="'.'E-Mail Id'.'" name="mail" value="'.$mail.'">'; 
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <?php
												 $sql='SELECT Password From user where Student_id="'.$id.'"';
	                                             $result=mysql_query($sql,$link);
                                           	     $num_rows=mysql_num_rows($result);
	                                             $pass=mysql_result($result,0,'Password');
												 echo'<input type="text" class="form-control border-input" placeholder="'.'Password'.'"name="pass" value="'.$pass.'">'; 
												 ?>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="text-center">
									     
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name='sub' value='sub'>Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>



    </div>
	
</body>
</html>