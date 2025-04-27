<?php
  session_start();
  if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value1']!='SU' )
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
if(!(isset($_POST['re2'])) and !(isset($_POST['Send'])))
{
	header('Location:superuser.php');
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
 <link href="css/pre.css" rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	  
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
    <title>Super User </title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


	 </head>

<body onload="window.location.hash ='ft'" style="background-color:#f7e0ff;">

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
               </td><td><a href="superuser.php"><h5 style="font-family: 'Courgette', cursive;color:white;">Master 
			   
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT Staff_Name From super_user where Staff_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);$name=$row['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5></a></td></tr></table><b>";
?>               
                
            </div>
			</div>
			</div>
<ul class="nav">
                <li>
                    <a href="superuser_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Profile</p>
                    </a>
                </li>
                				<li class="active">
                    <a href="superuser.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px"> Post </p>
                    </a>
                </li>
                <li>
                    <a href="live.php">
                        <i class="ti-control-forward" ></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">GO LIVE</p>
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
                        <p>Quiz</p>
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
                </li>
                <li>   <a href="notification.php">
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Reply</a>
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

<center>
<div class="content">
<?php
$sql='SELECT staff_name from super_user  where staff_id="'.$_SESSION['value2'].'"';
	                $result=mysqli_query($link,$sql);
	                $row=mysqli_fetch_assoc($result);
					$stname=$row['staff_name'];
				
								 if(isset($_POST['re2']) or isset($_POST['Send']))
				  {
					  if(isset($_POST['re2']))
					  {
					$i=$_POST['re2'];
					$id=$_POST[$i];
					  }
					  elseif((isset($_POST['Send'])))
					  {

						  $id=$_POST['Send'];
					  }
						  
					$sql='SELECT ptr from post  where id="'.$id.'"';
	                $result=mysqli_query($link,$sql);
					$row=mysqli_fetch_assoc($result);
					$chat=$row['ptr'];
					$handle=fopen($chat,'r') or die ('Error in Reading the message,....!');
					$msg=fgets($handle);
					$sg=explode("`",$msg);
					echo'
					<div class="col-md-8"></div>
                                        	    <div class="col-md-12">
                        <div class="alert alert-warning">
                                   
                                    <span><b> '. $sg[0].'<br> </b></span></td><td>'.'posted by '.$sg[2].' on '.$sg[1].'
                     </div>  ';
									fclose($handle);
				 
				  }
				   if (isset($_POST['Send']))
				  {
					  $cnt=$_POST['reply'];
					  if($cnt=='')
					  {
						  echo'<script> alert("Please enter the Message to send ,.....") </script>';
					  }else{
				    date_default_timezone_set('Asia/Kolkata');
	                $date=date("Y-m-d H-i-s");
	                $handle=fopen($chat,'a') or die('error ,...');
	                fwrite($handle,$cnt.'`'.date("Y-m-d H-i-s").'`'.$stname.'('.$_SESSION['value2'].')`');
	                fwrite($handle,"\r\n");
					fclose($handle);
					  echo'<br>success,..!<br>';  }
				  }
				  $handle=fopen($chat,'r');
					  fgets($handle);
				  while(!(feof($handle)))
				  {
					  $line=fgets($handle);
					  $line=explode("`",$line);
					  if((count($line))==4){
					  $line1=explode("(",$line[2]);
					  if($stname==$line1[0])
					  { $ali='right'; $al='info'; $by='you'; $si=6;}else{$ali='left'; $al='success'; $by=$line[2]; $si=0;}
					  echo'			
                    				  <div class="content"><div  class="row">
                                         <div  class="col-md-'.$si.'"></div><div  class="col-md-6">
                        <div class="alert alert-'.$al.'">
                                   
                                <p align="'.$ali.'" > <span><b>'.$line[0] .'<br> </p></b></span> by '.$by.' on '.$line[1].' <p align="'.$ali.'" >
                   </div>  </div></div>';
					  }
				  }
				  fclose($handle);
				 ?><div id='ft'>
				 <br><br><br>
			
				                  <div class="footer" style="position:fixed;left:1;text_align:center;bottom:0;width:100%;">                 

				  <form action="post.php" method="POST">
				      	 <div class="container-fluid"> 
				 <div class="content">
				  <div class="row">
										
									    <div class="col-md-1">
                                            <div class="form-group">
                                             </div>
                                        </div>
								    <div class="col-md-1">
                                            <div class="form-group"> Reply
                                             </div>
                                        </div>
									    <div class="col-md-4">
                                            <div class="form-group">
											<input type="text" class="form-control border-input" name="reply">
                                             </div>
                                        </div>
										<div class="col-md-3">
										<div class="text-center">
								<?php	echo'<button type="submit"  class="btn btn-info btn-fill btn-wd" name="Send" value="'.$id.'">SEND </button>'; ?>
                                    </div>
                                   </div>
                              
                                    </div>
									</form>
									</div>
                                    </div></div>
				 </center>
				 </body>
				 

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

				 </html>