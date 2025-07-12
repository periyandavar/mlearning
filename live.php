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
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <link href="css/pre.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam" rel="stylesheet">
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Live Stream</title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
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
    <script type="text/javascript" src="jquery.js"></script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</head>

<body style="background-color:#f7e0ff">

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
			<b><table style='color:white; '><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
               </td><td><a  href="superuser.php"><h5 style="font-family: 'Courgette', cursive;color:#ffffff">MASTER
<?php
     $id=$_SESSION['value2'];
    $sql='SELECT Staff_Name From super_user where Staff_id="'.$id.'"';
	$result=mysqli_query($link,$sql);
	($row=mysqli_fetch_assoc($result));
	$name=$row['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5></td></tr></table><b>";
?>       
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li>
                    <a href="superuser_profile.php">
                        <i class="ti-user" ></i>
                        <b><p style="font-family:'Kalam', cursive; font-size:14px"> Profile</p></b>
                    </a>
                </li>
                
				<li>
                    <a href="superuser.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Post </p>
                    </a>
                </li>
				
				<li class="active">
                    <a href="live.php">
                        <i class="ti-control-forward font-size:14px" ></i>
                        <p style="font-family: 'Charm', cursive;font-size:14px;">GO LIVE</p>
                    </a>
                <li>
                
				<li >
                    <a href="notes.php">
                        <i class="ti-panel" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Notes</p>
                    </a>
                </li>
                <li>
                    <a href="quiz.php">
                        <i class="ti-text" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Quiz</p>
                    </a>
                </li>
                <li>
                    <a href="modelquestions.php">
                        <i class="ti-view-list-alt" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Model Questions</p>
                    </a>
                </li>
                <li>
                    <a href="photography.php">
                        <i class="ti-map" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Photography</p>
                    </a>
                </li>
                <li>
                    <a href="videography.php">
                        <i class="ti-export" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Videography</p>
                    </a>
                </li>
				<li >
                    <a href="assignment.php">
                        <i class="ti-pencil-alt2" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Assignments</p>
                    </a>
                </li>
				<li>
                    <a href="notification.php">
                        <i class="ti-bell" ></i>
                        <p style="font-family:'Kalam', cursive;font-size:14px;">Notifications</p>
                    </a>
                </li><li>
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
                                            <div class="content">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Live stream</a></div>
                    
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
            </div></div>
        </nav>
<center>
<br><h3 >Live Stream </h3>
<h4><a href='https://www.youtube.com' target="white" ><i class="ti-control-forward" ></i> ! Please use this link to start your live stream </a></h4>
											<h4><a ><i class="ti-pencil" ></i> ! Then fill the form to invite your student to live  </a></h4>     <br>                                   
   <div class="container-fluid" style="background-color:#f7e0ff;"> 
                            <div class="header">
                            </div>
                            										
		                                             <?php
    $sql='SELECT Classcode From link where staffcode="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $arr=[];
	  $i=0;
   while($row=mysqli_fetch_assoc($result))
	  {
	  $dname=$row['Classcode'];
	  $arr[$i]= $dname ;
	  $i++;
	  }
	 $sql='SELECT departmentcode From super_user where staff_id="'.$_SESSION['value2'].'"';
	 $result=mysqli_query($link,$sql);
	 ($ow=mysqli_fetch_assoc($result));
	  $dname=$ow['departmentcode'];
    $sql='SELECT ClassName From class where departmentcode="'.$dname.'"';
	  $result=mysqli_query($link,$sql);
   while($row=mysqli_fetch_assoc($result))
	  {
	  $dname=$row['ClassName'];
	   $arr[$i]= $dname ;
	  $i++;
	  }
	  $red=array_values(array_unique($arr));
	  
?>

											<form action="live.php" method="POST">
										 <div class="row">
										      <div class="col-md-1">
                                            <div class="form-group">
                                             </div>
                                        </div>
									
										<div class="col-md-4">
                                            <div class="form-group">
											
                                               <label >Select the Class to Invite</label>
																					<select name="clid" required="required" class="form-control border-input" > <option value=''> 
											<option value='G'>All( Classes under your Department )
		                                             <?php
	for($i=0;$i<count($red);$i++)
	  {
	      if(isset($red[$i])){
	  echo'<option value="'.$red[$i].'">'. $red[$i];}
	  }  
?></select>
                                        
										</div></div>
										<div class="col-md-5">
										<div class="form-group">
										<label > Topic </label>
                                           <td><textarea maxlength="35" name="topic" rows='1' cols='7' class="form-control border-input"></textarea>
									    </div>
										</div></div>
										<div class="row">
									    <div class="col-md-3">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-5">
										<div class="form-group">
                                             <label >Live video URL</label>
											   <input required="required" type="url" name="url"  class="form-control border-input"/>   
									    </div>
										</div>
										</div>
										<div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd"  name='Add' value='ADD'>ADD </button>
                                    </div>
                                   </div>
                              
                                    </div>
									</div>
                                    
</form>
<br>
	
	
<?php
if(isset($_POST['Add']))
    {
	 $id=$_SESSION['value2'];
	$clid=$_POST['clid'];
	 $topic=$_POST['topic'];
	 $url=$_POST['url'];
      $query="insert into live (StaffCode,sto,url,topic) values ('$id','$clid','$url','$topic')";
	     if((mysqli_query($link,$query)))
		 {
		  echo "<h3>Students are invited Successfully...!</h3>";
	     }
		 else{
			 echo"<h3>Error in network connection,...!</h3>";
		 }
	 }


?>
       </center>                   </div>  </div>
</body>
       <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>


</html>