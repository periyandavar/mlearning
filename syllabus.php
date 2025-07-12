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
    <title>Syllabus</title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
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
         
    $sql='SELECT Student_Name From user where Student_id="'.$id.'"';
	  $result=mysqli_query($link, $sql);
	  $name=mysqli_fetch_assoc($result)['Student_Name'];
	  echo "<br>".$name." (".$id.")</a></h5></table></b>";
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
			    <li class="active">
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
                    <a class="navbar-brand" href="#">Syllabus</a>
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
<center><h4> Syllabus List</h4>
<form action="syllabus.php" method="POST"><h5>Search For Part I Papers</h5>
<table border="0" width="850" height="70">
<tr><td style="font-size:14pt;width:150px;">Subject Name</td><td><select required="required" name="sbid" style="font-size:14pt;width:450px;"><option>
<?php
  $sql='select subjectname from subject where part="LANGUAGE"';
  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  { echo'<option value="'.mysql_result($result,0,'subjectname').'" >'.mysql_result($result,0,'subjectname');
	  }
?>
</select></td><td style="font-size:14pt;width:220px;"><input required="required" type='submit' value='Go' name='go'></td></tr></table></form>
<form action="syllabus.php" method="POST"><h5>Search For Part IV Papers</h5>
<table border="0" width="850" height="70">
<tr><td style="font-size:14pt;width:150px;">Subject Name</td><td><select required="required" name="sbid" style="font-size:14pt;width:450px;"><option>
<?php
  $sql='select subjectname from subject where part="NME"';
  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  { echo'<option value="'.mysql_result($result,0,'subjectname').'" >'.mysql_result($result,0,'subjectname');
	  }
?>
</select></td><td style="font-size:14pt;width:220px;"><input type='submit' value='Go' name='go'></td></tr></table></form>

<?php
 if(isset($_POST['go'])){
	 if($_POST['sbid']==''){ echo"<script>alert('Please enter the Subject Name ')</script>";}else{
	$sql='select SubjectCode,syllabus,subjectname,part from subject where subjectname="'.$_POST['sbid'].'"';
  $result=mysql_query($sql,$link); 
  echo'<h3>Result<h3>';
	  $name1=mysql_result($result,0,'Syllabus');
	  $name2=mysql_result($result,0,'SubjectName');
	  $name3=mysql_result($result,0,'SubjectCode');
	  $part=mysql_result($result,0,'part');
	  
	  echo "<h3><a a target='white' href='".$name1."' >".$part."<br>".$name3."  -  ".$name2." <br> (".$name1.")</a></h3>";  
	 }  }
?>

<?php
$sql='SELECT ClassCode From user where Student_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  $name=mysql_result($result,0,'ClassCode');
$sql='SELECT PaperCode From link2 where ClassCode="'.$name.'"';
	  $results=mysql_query($sql,$link);
	  $num_row=mysql_num_rows($results);
	  for($i=0;$i<$num_row;$i++)
	  {
	  $name3=mysql_result($results,$i,'PaperCode');
$sql='SELECT Syllabus,SubjectName, Part From subject where SubjectCode="'.$name3.'"';
	  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  if($num_rows>0){
	  $name1=mysql_result($result,0,'Syllabus');
	  $name2=mysql_result($result,0,'SubjectName');
	  $part=mysql_result($result,0,'part');
	  
	  echo "<h3><a a target='white' href='".$name1."' >".$part."<br>".$name3."  -  ".$name2." <br> (".$name1.")</a></h3>";  
	  }}
?>

</body>
</html>