<?php
  require('connect.php');
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
?>

<?php
 				  if(isset($_POST['eb']))
				  {
					  
					$i=$_POST['eb'];
				    $st=$_POST[(($i+1)*-1)];
					if($st=='Disabled')
					{
						$st='n';
					}
					else
					{
						$st='y';
					}
					$id=$_POST[$i];
					
					$sql='Update super_admin_notification set status="'.$st.'" Where id="'.$id.'"'	;
                  
				   (mysqli_query($link,$sql));
				  }
				 
				
				?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
  <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam" rel="stylesheet">
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Notifications</title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
	 	 <script type="text/javascript" src="jquery.js"></script>
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
    <script type="text/javascript">
    $(window).scroll(function ()
    {
	  if($(document).height() <= $(window).scrollTop() + $(window).height())
	  {
		loadmore();
	  }
    });

    function loadmore()
    {
      var val = document.getElementById("row_no").value;
      $.ajax({
      type: 'post',
      url: 'get_result.php',
      data: {
       getresult:val
      },
      success: function (response) {
	  var content = document.getElementById("all_rows");
      content.innerHTML = content.innerHTML+response;

      // We increase the value by 10 because we limit the results by 10
      document.getElementById("row_no").value = Number(val)+10;
      }
      });
    }
</script>

 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</head>

<body style="background-color:#f7e0ff;">


    <!-- ##### Header Area Start ##### -->
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
               </td><td><h5 style="font-family: 'Courgette', cursive;">KING
<?php
         $id=$_SESSION['value2'];
         $sql='SELECT College_Name From super_admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['College_Name'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?>                      
                 
                </a>
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
				 <li>
                    <a href="edit.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family:'Kalam', cursive;color:'black';font-size:14px"> Edit Page</p>
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
                <li  class="active">
                    <a href="sadmin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Charm', cursive;color:'black';font-size:14px">View Notifications</p>
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Notifications</a>
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
<br>
<center>
<h3> Notifications </h3><br>
 <div class="container-fluid">
 <script>
											function submitform()
											{
												if(confirm('Are sure you want to delete the Notification..?')){
												document.getElementById("t").value = "t";}
												else{document.getElementById("t").value = "f";
												}
												
											}
											</script>

<?php
 if(isset($_POST['eb2']))
				  {
					  $i=$_POST['eb2'];
					  if($_POST['t'.$i]=='t'){
					$id=$_POST[$i];
	 				$sql='Delete from super_admin_notification Where id="'.$id.'"'	;		
					if(mysqli_query($link,$sql))
					
					{
						echo' Notification is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the Notification ,...!';
					}
				  }}?>
 
                           	<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Notifications</h4>
                                <p class="category">Notification sent by us</p>
                            </div>
                            <div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                        <th> Notification </th>
                                    	<th>To</th>
                                    	<th>Status</th>
                                    	<th>Action </th>
                                    </thead>
                                    <tbody>
									<script>
											function submitform(a)
											{
												if(confirm("Are sure you want to delete the Department Deleting the Department will delete all the records under the department..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>
									
								<?php
									$sql='SELECT  * From super_admin_notification  limit 0,10 ';
                                    $select=mysqli_query($link,$sql);  
                                    $i=-1;   while($row=mysqli_fetch_array($select))
                                    { $i=$i+1;
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.$row['Topic'].'<br> </b> <i class="ti-bell"></i><h5>'.$row['Content'].'</h5></td>
                                        	<td>'.$row['send_to'].'</td>
';
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="sadmin_notification.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									  
									}
									?></tbody>  </table><div id="all_rows"></div>
									<input type="hidden" id="row_no" value="10">
                              

</div></div>
                        </div>
                    </div>
					</div>
					


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>