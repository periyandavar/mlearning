<?php
  require('connect.php');
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
    <title> Student </title>
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
		  <div class='imageing'style="background-image: url('img/user-img-background.jpg');">
            
			<div class='image' >
			
			<div class="logo">
			<b><table style='color:white; font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
               </td><td><h5><a href='user.php'>STUDENT
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT Student_Name From user where Student_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['Student_Name'];
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
                    <a class="navbar-brand" href="#">Welcome</a>
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
<?php
   echo'<h4> Welcome '.$name." </h4>";
?>
<h3>Share a Post </h3>
<form action="#file" method="POST" enctype="multipart/form-data">
<div class="container-fluid"> 
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
											<label> Share with </label>
											<select required="required" name="clid" class="form-control border-input" > <option value=''> 
											<option value='L'>only class members<option value='G'>All
</select>
                                             </div>
                                        </div>
                                        
										</div><div class="row">
										<div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-8">
										<div class="form-group">
										<label> Body </label>
                                           <td><textarea required="required" name="topic" rows='3' cols='8' class="form-control border-input"></textarea>
									    </div>
										</div></div>
										<div class="row">
										<div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Add' value='ADD'>POST NOW</button>
                                    </div>
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
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
	  $new=' ';
      $path='uploads/notes/';
	  $chat='chat/'.$id;
	  $sy="";	
	  if($topic=='')
	 {
		 echo"<script>alert('Please enter the Contents of the post ')</script>";
	 }
	 elseif($clid=='')
	 {
	 echo"<script>alert('Please  provide the share with option ')</script>";
	 }
	 else	 
	 {
	  $sql='SELECT student_name from user  where student_id="'.$_SESSION['value2'].'"';
	  $result=mysql_query($sql,$link);
	  $stname=mysql_result($result,0,'student_name');
	  date_default_timezone_set('Asia/Kolkata');
	  $date=date("Y-m-d H-i-s");
	  $chat=$chat.$date.'.txt';
	  $handle=fopen($chat,'w') or die('error ,...');
	  fwrite($handle,$topic.'`'.date("Y-m-d H-i-s").'`'.$stname.'('.$_SESSION['value2'].')`');
	  fwrite($handle,"\r\n");
	  fclose($handle);
      $query="insert into post (from1,to1,Code,ptr,Status) values ('$id','$clid','user','$chat','n')";  
		if((mysql_query($query)))
		 {
		  echo "<h3>Posted Successfully...!.</h3>";
	     }
		 else{
			 echo"<h3>Error in Posting,...!</h3>";
		 }
	 }
}
?>
<br>

<?php
								 if(isset($_POST['eb2']))
				  {
					$i=$_POST['eb2'];
					$id=$_POST[$i];
					echo'<script> if(!(confirm("Are you sure, you want to Delete the post ,...?")))
					{
						window.location="user.php";
					}</script>';
					$sql='Delete from post Where id="'.$id.'"'	;
					if(mysql_query($sql))
					{
						echo' Post is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the Post ,...!';
					}
				  
				  }				  
				 ?>
	</center>
	
<br>
<table width='990'><tr><td>

                           	<?php
							    
								$sql='SELECT  ClassCode From user where student_id="'.$_SESSION['value2'].'" ';
		                            $result=mysqli_query($link,$sql);
		                            $rs=mysqli_fetch_array($result);
								$sql='SELECT  * From post where to1="G" or to1="'.$rs['ClassCode'].'"';
									$result=mysqli_query($link,$sql);
		                            $num_rows=mysqli_num_rows($result);
									
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Posts</h4>
                                <p class="category"> Available posts </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> From </th>
										<th> Message </th>
                                    </thead>
                                    <tbody>';
									while($row=mysqli_fetch_assoc($result))
									{
									    $i=0;
										if($row['status']=='y')
										{
										$msg=$row['ptr'];
										$handle= @fopen($msg,'r');
                                        if (! $handle) {
                                            continue;
                                        }
				                        $msg=fgets($handle);
										$sg=explode("`",$msg);
										fclose($handle);
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                   <span><b> '.$sg[2] .'<br> </b></span></td><td>'.$sg[0].' on '.$sg[1].'
                                    
                     </div></div>   </td>   	
                                      </form>	</tr><tr><td></td><td><center><form action="posts.php" method="POST">
									  <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
									  <button class="btn btn-info btn-fill btn-wd" type="submit" name="re2" value="'.$i.'">REPLY</button></form></center> </td><td></td></tr>';
										}
										$i++;
									}
                                    echo' </tbody>
                                </table>
</div>
                        </div>
                            </div>
                        </div>
                    </div>';

								
								?>
					</td><td style="width:27px;"></td><td>
                           	<?php
								$sql='SELECT  * From post where from1="'.$_SESSION['value2'].'"';
		                            $result=mysqli_query($link,$sql);
		                            $num_rows=mysqli_num_rows($result);
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Posts</h4>
                                <p class="category"> Posts by you </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table height="95%" class="table table-striped">
                                    <thead>
                                        <th> From </th>
                                    	<th> Posts </th>
										<th> Action </th>
                                    </thead>
                                    <tbody>';
									while($row=mysqli_fetch_assoc($result))
									{
									    $i=0;
										$msg=$row['ptr'];
										$handle=@fopen($msg,'r');
                                        if (! $handle) {
                                            continue;
                                        }
										$msg=fgets($handle);
										$sg=explode("`",$msg);
										$st=$row['status'];
										fclose($handle);
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                   
                                    <span><b> '.$sg[2]  .'<br> </b></span></td><td>'.$sg[0].' on '.$sg[1].'
                     </div></div>   </td>   <td><form action="user.php" method="POST">
											<input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											
										<center>	 <button  type="submit" name="eb2" value="'.$i.'">'.'REMOVE'.'</button></center>
                                      </td> </form>	
											</tr>';
											$i++;
										}
                                    echo' </tbody>                                </table>
</div>
                        </div>
                            </div>
                        </div>
                    </div></td></tr></table>';

								
 ?>

</body>
</html>