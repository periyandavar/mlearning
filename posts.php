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
if(!(isset($_POST['re2'])) and !(isset($_POST['Send'])))
{
	header('Location:superuser.php');
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
    <title>User </title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
  
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</head>

<body onload="window.location.hash ='ft'">

<!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
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
               </td><td><h5><a href='user.php'>User
<?php
         $id=$_SESSION['value2'];
         $link=mysql_connect("localhost","root","") ;
    mysql_select_db("mlearning",$link) or die (mysql_error());
    $sql='SELECT Student_Name From user where Student_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $name=mysql_result($result,0,'Student_Name');
	  echo "<br>".$name." (".$id.")</h5></a></td></tr></table><b>";
?>               
                 
                </a>
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
                    <a class="navbar-brand" href="#">Reply</a>
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
<br><center>
    				 <div class="container-fluid"> 
<div class="content">

<?php
$sql='SELECT student_name from user  where student_id="'.$_SESSION['value2'].'"';
	                $result=mysql_query($sql,$link);
					$stname=mysql_result($result,0,'student_name');
				
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
	                $result=mysql_query($sql,$link);
					$chat=(mysql_result($result,0,'ptr'));
					$handle=fopen($chat,'r') or die ('Error in Reading the message,....!');
					$msg=fgets($handle);
					$sg=explode("`",$msg);
					echo'<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-warning">
                                   
                                    <span><b> '. $sg[0].'<br> </b></span></td><td>'.'posted by '.$sg[2].' on '.$sg[1].'
                     </div></div> </div>';
					 fclose($handle);				 
				  }?>
				 <?php  if (isset($_POST['Send']))
				  {
					  $cnt=$_POST['replay'];
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
                                <p align="'.$ali.'" > <span><b>'.$line[0]. '<br> </p></b></span> by '.$by.' on '.$line[1].' <p align="'.$ali.'" >
                   </div>  </div></div>';
					  }
				  }
				  fclose($handle);
				 ?>
				 </div></div>
				 <div id='ft'>
				 <br><br><br>
				 <div class="container-fluid"> 
				 <div class="content">
				                  <div class="footer" style="position:fixed;left:1;text_align:center;bottom:0;width:100%;">                 
				  <form action="post.php" method="POST">
				  <div class="row">
										<div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
								    <div class="col-md-1">
                                            <div class="form-group"> Reply
                                             </div>
                                        </div>
									    <div class="col-md-4">
                                            <div class="form-group">
											<input type="text" class="form-control border-input" name="replay">
                                             </div>
                                        </div>
										<div class="col-md-3">
										<div class="text-center">
								<?php	echo'<button type="submit"  class="btn btn-info btn-fill btn-wd" name="Send" value="'.$id.'">SEND </button>'; ?>
                                    </div>
                                   </div>
                              
                                    </div></div>
									</form>
					</div></div></div></div></div></div>
				 </center>
				 </body>
				 </html>