<?php
  require('connect.php');
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
    <title> Master </title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	  
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
     <link href="css/ml2.css" rel="stylesheet"/>
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
			<b><table style=' font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
               </td><td><a href="superuser.php"><h5 style="font-family: 'Courgette', cursive;color:white;">MASTER 
			   
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT Staff_Name From super_user where Staff_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['Staff_Name'];
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
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle">
                        <span  class="sr-only">Toggle navigation</span>
                        <span  class="icon-bar bar1"></span>
                        <span  class="icon-bar bar2"></span>
                        <span  class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Welcome</a>
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
<center>
<h3> Welcome 
<?php
 echo" ".$name." </h3></center>";
 ?><center>
 <h3>Share a Post </h3></center><center>
                 <div class="container-fluid">

<form action="#file" method="POST" enctype="multipart/form-data">

                            <div class="content">
                                    <div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
											<label> Share with </label>
											<select name="clid" required="required" class="form-control border-input" > <option value=''> 
											<option value='G'>All (Classes under your department )
			                                             <?php
	for($i=0;$i<count($red);$i++)
	  {
	      if(isset($red[$i])){
	  echo'<option value="'.$red[$i].'">'. $red[$i];}
	  }  
?>										
										
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
                                           <td><textarea required="required" name="topic" rows='3' cols='8' font-face='Lucida Handwriting' class="form-control border-input"></textarea>
									    </div>
										</div></div>
										<div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
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
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Add' value='ADD'>POST NOW</button>
                                                                      </div>
                                   </div>
                              
                                    </div>
									</div>
                                    </div>

</form>
<br>
<?php
								 if(isset($_POST['eb2']))
				  {
					$i=$_POST['eb2'];
					$id=$_POST[$i];
					$sql='SELECT code,from1 From post  where id="'.$id.'"';
	                $result=mysqli_query($link,$sql);
	                $row=mysqli_fetch_assoc($result);
					if(($row['code'])=='user' or ($row['from1'])==$_SESSION['value2'])
	                {	
					$sql='Delete from post Where id="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						echo' Post is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the Post ,...!';
					}
				  }
				  else{echo'<script> alert("You can not delete this post ")</script>';
				  }
				  }
				  
				 ?>
<?php
                  if(isset($_POST['eb1']))
				  {  
					$i=$_POST['eb1'];
					$id=$_POST[$i];
					$sql='SELECT code,from1 From post  where id="'.$id.'"';
	                $result=mysqli_query($link,$sql);
	                $row=mysqli_fetch_assoc($result);
					if(($row['code'])=='user' or ($row['from1'])==$_SESSION['value2'])
	                {
					$sql='Update post set status="'.$_POST[(($i+1)*-1)].'" Where id="'.$id.'" '	;
                    (mysqli_query($link,$sql));
					}
					else
					{
						echo'<script>alert("You can not alter this post,...!")</script>';
					}
				  }
?>
	
<?php
if(isset($_POST['Add']))
    {
	 $id=$_SESSION['value2'];
	 $clid=$_POST['clid'];
	 $topic=$_POST['topic'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
	$chat='chat/'.$id;
	  $new=' ';
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
	$sql='SELECT staff_name from super_user  where staff_id="'.$_SESSION['value2'].'"';
	                $result=mysqli_query($link,$sql);
	                $rs=mysqli_fetch_array($result);
					$stname=$rs['staff_name'];
	  date_default_timezone_set('Asia/Kolkata');
	  $date=date("Y-m-d H-i-s");
	  $chat=$chat.$date.'.txt';
	  $handle=fopen($chat,'w') or die('error ,...');
	  fwrite($handle,$topic.'`'.date("Y-m-d H-i-s").'`'.$stname.'('.$_SESSION['value2'].')`');
	  fwrite($handle,"\r\n");
	  fclose($handle);
      $query="insert into post (from1,to1,Code,file,ptr,Status) values ('$id','$clid','super_user','$sy','$chat','y')";
		if((mysqli_query($link,$query)))
		 {
		  echo "<h3>posted Successfully...!.</h3>";
	     }
		 else{
			 echo"<h3>Error in posting,...!</h3>";
		 }
	 }
}

?>
<br><div class="table-responsive"  >
<table width='990' ><tr><td class="un_first">
                           	<?php
								$sql='SELECT  * From post where status="y"  ';
		                            $result=mysqli_query($link,$sql);

            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Posts</h4>
                                <p class="category"> Available posts </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" style="background-color:#ffffff;">
                                    <thead>
                                        <th> From </th>
										<th> Message </th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>';
                                    $i=0;
									while($row=mysqli_fetch_assoc($result))
									{
										$msg=$row['ptr'];
										$handle= @fopen($msg,'r');
				                        $msg= $handle ? fgets($handle) : '';
										$sg=explode("`",$msg);
                                        if (empty($msg)) {
                                            continue; // Skip empty lines
                                        }
										fclose($handle);
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                   <span><b> '.$row['from1'] .'<br> </b></span></td><td>'.$sg[0].' on '.$sg[1].'
                                    
                     </div></div>   </td>   	
											 <td><form action="superuser.php" method="POST">
											<input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											<input type="hidden" name="'.(($i+1)*-1).'" value="n" >
											<button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">Disable</button>
											<center> <button  type="submit" name="eb2" value="'.$i.'">'.'REMOVE'.'</button></center>
                                      </td> </form>	</tr><tr><td></td><td><center><form action="post.php" method="POST">
									  <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
									  <button class="btn btn-info btn-fill btn-wd" type="submit" name="re2" value="'.$i.'">REPLY</button></form></center> </td><td></td></tr>';
										
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
					</td><td style="width:27px;"></td><td class="un_age">
                           	<?php
								$sql='SELECT  * From post where status="n"';
		                            $result=mysqli_query($link,$sql);
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Posts</h4>
                                <p class="category"> Posts needs Approval </p>
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
										fclose($handle);
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                   
                                    <span><b> '.$row['from1'] .'<br> </b></span></td><td>'.$sg[0].' on '.$sg[1].'
                     </div></div>   </td>   <td><form action="superuser.php" method="POST">
											<input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											<input type="hidden" name="'.(($i+1)*-1).'" value="y" >
											<button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">Enable</button>
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
                    </div></td></tr></table></div>';

								
 ?></center>
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