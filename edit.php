<?php
  session_start();
  if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value1']!='SA')
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
    <meta name="viewport" content="width=device-width" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
      <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam" rel="stylesheet">
    <title>King </title>
     <link href="css/mu.css" rel="stylesheet"/>
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
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
<body style="background-color:#f7e0ff;" >
<div  id="loading" style="background-color:#FDFDFF;opacity:1;position:'absolute'"><div  style="background: url('pre.gif') no-repeat center center;width:100%;height:100%">

</div></div>
    <!-- ##### Header Area Start ##### -->
	<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="warning">
    	<div class="sidebar-wrapper">
		  <div class='imageing'style="background-image: url('img/user-img-background.jpg');">            
			<div class='image' >
			<div class="logo">
			<b><table style='color:white; font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
                    </td><td><h5 style="font-family: 'Courgette', cursive;">KING
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT * From super_admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	   $rs=mysqli_fetch_array($result);
	  echo "<br>".$rs['College_Name']." (".$id.")</h5></table><b>";
?>          
            </div>
			</div>
			</div>
            <ul class="nav">
                <li>
                    <a href="sadminedit.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px"> Profile</p>
                    </a>
                </li>
                <li class="active">
                    <a href="edit.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family:'Charm', cursive;color:'black';font-size:14px"> Edit Page</p>
                    </a>
                </li>
                
				<li>
                    <a href="department.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">New Department</p>
                    </a>
                </li>
                <li>
                    <a href="browse_department.php">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">View Departments</p>
                    </a>
                </li>
				<li>
                    <a href="notifications.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:13px">Create Notification</p>
                    </a>
                <li>
                    <a href="sadmin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">View Notifications</p>
                    </a>
                </li>
				<li >
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px">Log out</p>
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Edit Home Page</a>
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
	<center>
	
	<?php
	                       
								if(isset($_POST['sub']))
								{
									$cname=$_POST['cname'];
									$addr=$_POST['addr'];
											 $name=$_FILES['file']['name'];
											 if($name!='')
									{
	$tmp_name=$_FILES['file']['tmp_name'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
										function compress_image($source_url, $destination_url, $quality) {

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);
	      if ($info['mime'] == 'image/jpg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);
          imagejpeg($image, $destination_url, $quality);
		 
          return $destination_url;
        }
  if($fileextension!='jpg' and $fileextension!='jpeg' and $fileextension!='png' and $fileextension!='gif'){  $name=''; }
		else{	$filename = compress_image($_FILES["file"]["tmp_name"], 'img/log4.png', 80);}
	}
			 $name=$_FILES['wm']['name'];
											 if($name!='')
									{
	$tmp_name=$_FILES['wm']['tmp_name'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
										function compress_image($source_url, $destination_url, $quality) {

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);
	      if ($info['mime'] == 'image/jpg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);
          imagejpeg($image, $destination_url, $quality);
		 
          return $destination_url;
        }
  if($fileextension!='jpg' and $fileextension!='jpeg' and $fileextension!='png' and $fileextension!='gif'){  $name=''; }
		else{	$filename = compress_image($_FILES["wm"]["tmp_name"], 'uploads/cust/wm.png', 80);}
	}
						$name=$_FILES['pdf']['name'];
						if($name!=''){
	$tmp_name=$_FILES['pdf']['tmp_name'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
if(!(move_uploaded_file($tmp_name,'uploads/cust/gmlas.pdf')))
		{
			echo"Error in uploading syllabus";
		}
						}
									$q='update info set name="'.$cname.'",des="'.$addr.'" ';
									if(mysqli_query($link,$q))
										
									{
										
										echo'updated successfully';
									}
									else
									{
										echo'error in updation';
									}
								}
								?>

	<div class="content"><h3>Edit Home page</h3>
	            <div class="container-fluid"> 
                            <div class="header">      
                            </div>
                            <div class="content">
                                <form action="#file" method="POST" enctype="multipart/form-data">
                                    <div class="row">
									<div class="col-md-2"></div>
                                         <div class="col-md-8">
                                            <div class="form-group">
                                                <label>College Name</label>
												<?php
																					    $sql='SELECT * From info';
	                                    $result=mysqli_query($link,$sql);
	                                     $rs=mysqli_fetch_array($result);
                                                echo '<input type="text" required name="cname" class="form-control border-input" placeholder="Student Name" value="'.$rs['name'].'">';
												?>
                                            </div>
                                        </div></div><div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Description content</label>
												<?php
												 echo'<textarea rows="4" required class="form-control border-input" name="addr" placeholder="'.'Addreess'.'" value="'.$rs['des'].'">'.$rs['des'].'</textarea>'; 
												 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>College Logo </label><br>
												<a target="white" href="img/log4.png"><img src="img/log4.png"> </a><br>change
												 <input type="file" id="file" name="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" style="font-size:14pt;width:270px;" name="logo" placeholder="Place">
											
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                               <label for='inputdob'>watermark </label><br>
												<a target="white" href="uploads/cust/wm.png"><img src="uploads/cust/wm.png"></a> <br>change 
												 <input type="file"  id="file1" name="wm" accept="image/x-png,image/gif,image/jpeg,image/jpg"  placeholder="'.'Phone'.'" type="file" style="font-size:14pt;width:270px;" >
												
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                             </div>
                                        
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>pdf front page</label><br>
												<a target='white' href="uploads/cust/gmlas.pdf">current pdf</a><br>change<br>
												 <input type="file" accept="application/pdf" id="file2" style="font-size:14pt;width:270px;" placeholder="'.'Password'.'"name="pdf" value="'.mysql_result($result,0,'password').'">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name='sub' value='sub'>Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div><br>
                                </form>
                            </div>
                        </div>
                    </div>
					</div>
            </div>
        </div>
    </div>
	</center>
</body>
<script>
var uploadField1 = document.getElementById("file");

uploadField1.onchange = function() {
    if(this.files[0].size > 3072000){
       alert("File is too big! please select the file less than 3 MB of size");
       this.value = "";
    };
};
var uploadField = document.getElementById("file1");

uploadField.onchange = function() {
    if(this.files[0].size > 3072000){
       alert("File is too big! please select the file less than 3 MB of size");
       this.value = "";
    };
};
var uploadField2 = document.getElementById("file2");

uploadField2.onchange = function() {
    if(this.files[0].size > 3072000){
       alert("File is too big! please select the file less than 3 MB of size");
       this.value = "";
    };
};
</script>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>
	<script src="assets/js/paper-dashboard.js"></script>


</html>