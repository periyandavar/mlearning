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

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
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

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
    <title>Profile </title>
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

<body style="background-color:#f7e0ff;">

      <div  id="loading" style="background-color:#FDFDFF;opacity:1;position:'absolute'"><div  style="background: url('pre.gif') no-repeat center center;width:100%;height:100%">

</div>
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
               </td><td><a href="superuser.php"><h5 style="font-family: 'Courgette', cursive; color:white;">MASTER
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT * From super_user where Staff_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);
	  $name=$row['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5 ></a></td></tr></table><b>";
?>              </a>
            </div>
			</div>
			</div>
            <ul class="nav">
                <li class="active">
                    <a href="superuser_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px"> Profile</p>
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
                        <i class="ti-control-forward" ></i>
                        <p style="font-family: 'Kalam', cursive;">GO LIVE</p>
                    </a>
                </li>
                
				<li >
                    <a href="notes.php">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Notes</p>
                    </a>
                </li>
                <li>
                    <a href="quiz.php">
                        <i class="ti-text"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Quiz</p>
                    </a>
                </li>
                <li>
                    <a href="modelquestions.php">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Model Questions</p>
                    </a>
                </li>
                <li>
                    <a href="photography.php">
                        <i class="ti-map"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Photography</p>
                    </a>
                </li>
                <li>
                    <a href="videography.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Videography</p>
                    </a>
                </li>
				<li>
                    <a href="assignment.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Assignments</p>
                    </a>
                <li>
                    <a href="notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Notifications</p>
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
                  <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Profile</a>
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
<center>
<?php
								if(isset($_POST['sub']))
								{
									$name=$_POST['name'];
									$age=$_POST['age'];
									$addr=$_POST['addr'];
									$pass=$_POST['pass'];
									$mail=$_POST['mail'];
									$blood=$_POST['blood'];
									$gen=$_POST['gen'];
									$dob=$_POST['dob'];
									$s=$_POST['spec'];
									$q=$_POST['qual'];
									$linked=$_POST['linked'];
									$twitt=$_POST['twitt'];
									$fb=$_POST['fb'];
									$web=$_POST['web'];
									$call=$_POST['call'];
									$phone=$_POST['phone'];
									if($mail=='')
									{
										 echo"<script>alert('You can not leave the mail id field as blank ')</script>";
									}
									elseif($gen=='')
									{
										 echo"<script>alert('You can not leave the Gender field as blank ')</script>";
									}
									elseif($pass=='')
									{
										 echo"<script>alert('You can not leave the password field as blank ')</script>";
									}
									else{
									$q='update super_user set phone="'.$phone.'", twitter="'.$twitt.'", fb="'.$fb.'" ,LinkedIn="'.$linked.'" ,blog="'.$web.'" ,video_call="'.$call.'" , gender="'.$gen.'", Staff_Name="'.$name.'",dob="'.$dob.'",age="'.$age.'",address="'.$addr.'",password="'.$pass.'",mailid="'.$mail.'",qualification="'.$q.'" ,specification="'.$s.'",blood="'.$blood.' "where Staff_id="'.$id.'" ';
									if(mysqli_query($link,$q))
									{
										echo'Your Profile is updated,....!';
									}
									else
									{
										echo'Failed to update your information ,....!';
									}
									}
									    $sql='SELECT * From super_user where Staff_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);
								}
								?>
	<div class="content"><h3>Edit Profile</h3>
            <div class="container-fluid" style="background-color:#f7e0ff;"> 
                            <div class="header">
                            </div>
                            <div class="content">
                                <form action='superuser_profile.php' method='POST'>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Staff Code </label>
												<?php
                                                echo '<input type="text" "name="reg" class="form-control border-input" disabled placeholder="Company" value="'.$id.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Staff Name</label>
												<?php
                                                echo '<input required="required" type="text" name="name" class="form-control border-input" placeholder="Staff Name" value="'.$name.'">';
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Department </label>
												<?php
												 $sql='SELECT name From admin where id="'.$row['DepartmentCode'].'"';
	                                             $result1=mysqli_query($link,$sql);
                                                 echo'<input type="text" class="form-control border-input" name="class" disabled placeholder="class" value="'.$row['Staff_Name'].'">';
												?>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                                                               <div class="col-md-3">
                                       <div class="form-group">                                         
                                                <label> Date Of Birth as(yyyy-mm-dd) </label>
												<?php
	                                             $age=$row['DOB'];
			
	  echo'
      <script>
         $(function() {
			$("#datepicker").datepicker({
  changeMonth: true,
  changeYear: true,
  dateFormat: "yy-mm-dd",
  defaultDate:new Date(70,0,1),
  yearRange: "1970:'.(date('Y')-22).'"
});
         });
      </script>'; 
	  echo'<input type="text" id="datepicker" onchange="load()" class="form-control border-input" name="dob" placeholder="'.'D-O-B'.'" value="'.$age.'">'; 
												?>                                                
                                            </div></div>
                                        
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for='inputdob'>Age </label>
												<?php
												 $age=$row['Age'];
												 echo'<input type="number" name="age"  id="age" readonly class="form-control border-input"   value="'.$age.'">'; 
												 ?>
                                                </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for='inputdob'>Qualification </label>
												<?php
												 $age=$row['Qualification'];
												 echo'<input type="text" class="form-control border-input" name="qual" placeholder="'.'Qualification'.'" value="'.$age.'">'; 
												 ?>
                                                </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for='inputdob'>Specification </label>
												<?php
												 $age=$row['Specification'];
												 echo'<input type="text" class="form-control border-input" name="spec" placeholder="'.'Specification'.'" value="'.$age.'">'; 
												 ?>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
												<?php
												 $add=$row['Address'];
												 echo'<textarea rows="3" class="form-control border-input" name="addr" placeholder="'.'Addreess'.'" value="'.$add.'"></textarea>'; 
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
												 $bl=$row['Blood'];
												 echo'<input type="text" class="form-control border-input" placeholder="Blood Group" name="blood" value="'.$bl.'">'; 
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <?php
												 $bl=$row['gender'];
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
												 $mail=$row['MailId'];
												 echo'<input type="email" class="form-control border-input" placeholder="'.'E-Mail Id'.'" name="mail" value="'.$mail.'">'; 
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <?php
												 $pass=$row['Password'];
												 echo'<input type="text" class="form-control border-input" placeholder="'.'Password'.'"name="pass" value="'.$pass.'">'; 
												 ?>
                                            </div>
                                        </div>
                                    </div><h4> Contacts</h4>
									<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-4">
									<div class="form-group">
									 <label> Phone </label>
									 <?php
									 $pass=$row['Phone'];
									 echo'<input type="text" pattern="[789][0-9]{9}"
" class="form-control border-input" placeholder="'.'Phone'.'"name="phone" value="'.$pass.'">'; 
									 ?>
                                  </div></div>
								 
									<div class="col-md-4">
									<div class="form-group">
									 <label> Facebook </label>
									 <?php
									 $pass=$row['fb'];
									 echo'<input type="url" class="form-control border-input" placeholder="'.'Facebook'.'"name="fb" value="'.$pass.'">'; 
									 ?>
                                  </div></div></div>
								  <div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-4">
									<div class="form-group">
									 <label> Video Call </label>
									 <?php
									 $pass=$row['video_call'];
									 echo'<input type="url"  class="form-control border-input" placeholder="'.'Video Call'.'"name="call" value="'.$pass.'">'; 
									 ?>
                                  </div></div>
								 
									<div class="col-md-4">
									<div class="form-group">
									 <label> Twitter </label>
									 <?php
									 $pass=$row['twitter'];
									 echo'<input type="url" class="form-control border-input" placeholder="'.'Twitter'.'"name="twitt" value="'.$pass.'">'; 
									 ?>
                                  </div></div></div>
								  								  <div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-4">
									<div class="form-group">
									 <label> Website </label>
									 <?php
	                                 $pass=$row['blog'];
									 echo'<input type="url"  class="form-control border-input" placeholder="'.'website'.'"name="web" value="'.$pass.'">'; 
									 ?>
                                  </div></div>
								 
									<div class="col-md-4">
									<div class="form-group">
									 <label> LinkedIn </label>
									 <?php
									 $pass=$row['Linkedin'];
									 echo'<input type="url" class="form-control border-input" placeholder="'.'linkedin'.'"name="linked" value="'.$pass.'">'; 
									 ?>
                                  </div></div></div>
								  
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


    </div></center>
	
</body>
    <!--   Core JS Files   -->
    
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

</html>