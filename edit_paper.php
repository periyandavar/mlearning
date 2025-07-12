<?php
    session_start();
    if($_SESSION['value2']=='')
  {
	header('Location:login.php');
  }
  if($_SESSION['value12']=='')
  {
	header('Location:new_paper.php');
  }
  if($_SESSION['value1']!='A')
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
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	

	
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>New Paper </title>
		 <script type="text/javascript" src="jquery.js"></script>
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
      url: 'get.php',
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

     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>


 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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

<body style="background-color:#f7e0ff;">


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
               </td><td><h5 style="font-family: 'Courgette', cursive;">Admin
<?php
    $id=$_SESSION['value2'];
   $sql='SELECT Name From admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	 $name=$rs['Name'];
      $id=$_SESSION['value2'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?>             
                 
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li>
                    <a href="adminview.php">
                        <i class="ti-user"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">  Profile</p>
                    </a>
                </li>
				
                <li>
                    <a href="browse_staffs.php">
                        <i class="ti-text"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Browse</p>
                    </a>
                </li>
				<li>
                    <a href="new_staff.php">
                        <i class="ti-pencil-alt2"></i>
                    <p style="font-family: 'Kalam', cursive; font-size:14px">  Add Staff</p>
                    </a>
                 </li>			
                <li>
                    <a href="new_class.php">
                        <i class="ti-export"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> New Class</p>
                    </a>
                </li>
				
                <li class="active">
                    <a href="new_paper.php ">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px"> Add Paper</p>
                    </a>
                </li>
				
				<li >
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Manage Paper</p>
                    </a>
                </li>
				<li>
                    <a href="admin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">  Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> log out</p>
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Update Subject</a>
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
									<h3> Update Subject </h3><br></form>
								<form action="#file" method="POST" enctype="multipart/form-data">
 <div class="container-fluid"> 
                            <div class="content">
															
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-3">
										<div class="form-group">
                                               <label>Subject Code</label>
											 <?php echo'  <input type="text" class="form-control border-input"  value="'.$_SESSION['value12'].'" disabled  name="sbid">'; 
											 $sql='SELECT * From subject where subjectcode="'.$_SESSION['value12'].'"';
	                                         $result=mysqli_query($link,$sql);
	                                         $row=mysqli_fetch_assoc($result);
	                                         ?>
									    </div>
										</div>
										<div class="col-md-5">
										    	<div class="form-group">
                                               <label>Subject Name</label>
												  <?php echo'<input required type="text" class="form-control border-input" value="'.$row['SubjectName'].'" placeholder="Subject Name" name="sbname">';
?>											   
									    </div>
										</div>
										</div><div class="row">
										<div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
									<script>
function get()
    {
      var val = document.getElementById("part").value;
      $.ajax({
      type: 'post',
      url: 'in.php',
      data: {
       getresult:val
      },
      success: function (response) {
	  var content = document.getElementById("sel");
      content.innerHTML = response;

      }
      });
    }</script>
	
										<div class="col-md-3">
                                            <div class="form-group">
											<label> Part </label>
											<select name="part" id='part' disabled  class="form-control border-input" > <option value=''> <?php echo $row['Part'];?></select>
                                             </div>
                                        </div>
                                        <div class="col-md-4">
										<div class="form-group">
										<label> Offered To </label>
                                             <select name="to" id='sel' disabled class="form-control border-input" ><option value=''><?php echo $row['Offeredto'];?>

</select>							    </div>
										</div>
										
										 <div class="col-md-3">
                                            <div class="form-group"><label> </label><br>
											 </div>
                                        </div>
                                       </div>
									   <div class="row"><div id="all_rows"></div></div>
										<div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-3">
										<div class="form-group">
                                               <label>Number of units</label>
											   <input type="number" min='0' required value="<?php echo $row['Units'];?>" name="units" style="font-size:14pt;width:270px;" placeholder="Number of Units" class="form-control border-input" />
									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Update the Syllabus</label>
											   <input type="file" name="file" accept="application/pdf"  style="font-size:14pt;width:270px;"/>   
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
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Create' value='Create'> Update </button>
                                    </div>
                                   </div>
                              
                                    </div>
									</div>
                                    </div>
</center><br>
<?php
    if(isset($_POST['Create']))
    {
	$sbid=$_SESSION['value12'];
	$name=$_FILES['file']['name'];
	if($name=='')
	{
		$name=$row['Syllabus'];
	}
	$tmp_name=$_FILES['file']['tmp_name'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
	$path='uploads/syllabus/';
	$sy=$path.$sbid.'.'.$fileextension;
	if(isset($name))
	{
		$path='uploads/syllabus/';
	if(!empty($name))
	{
		if(!(move_uploaded_file($tmp_name,$path.$sbid.'.'.$fileextension)))
		{
		//	echo"Error in uploading syllabus";
		}
	}
	if($fileextension!='pdf'){  $name=''; }
	}
	 $id=$_SESSION['value2'];
	 $sbname=$_POST['sbname'];
	 $units=$_POST['units'];
	 
	 $sbid=strtoupper($sbid);
	 
	    $query="update subject set SubjectName='$sbname', units='$units',Syllabus='$sy' where subjectcode='".$_SESSION['value12']."'";
	  if((mysqli_query($link,$query)))
		{
		     echo "<h3> Subject is updated Successfully,...!</h3>";
	    }
		else
		 {
		  echo "<h3>Failed to update the Subject...!</h3>";
		 }
	 	 
}
?>

<?php
				  if(isset($_POST['eb1']))
				  {
					  
					$i=$_POST['eb1'];
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
					$sql='Update subject set status="'.$st.'" Where subjectcode="'.$id.'"'	;
                    (mysqli_query($link,$sql));
				  }
?>

<?php
				  if(isset($_POST['eb2']))
				  {
					  $i=$_POST['eb2'];
					  if($_POST['t'.$i]=='t'){
					$id=$_POST[$i];
                    $sql='SELECT subjectName From subject where subjectcode="'.$id.'"';
	                $result=mysqli_query($sql,$link);
	                $row=mysqli_fetch_assoc($result);
	                $name=$row['subjectName'];
	 				$sql='Delete from subject Where subjectcode="'.$id.'"'	;		
					if(mysqli_query($link,$sql))					
					{
						echo$name.' Subject is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the '.$name.' subject ,...!';
					}
				  }}  
				 ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Available Subjects </h4>
                                <p class="category">Subjects offers by our Department</p>
                            </div>
                            <div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                       <th> Subject Code </th>
										<th> Subject Name </th>
                                    	<th> Units</th>
										<th> Part</th>
										<th> offered to</th>
										<th>syllabus</th>
                                    	<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<script>
											function submitform(a)
											{
												if(confirm("Are sure you want to delete the Subject..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>
									
								<?php
									$sql='SELECT  * From subject where DepartmentCode="'.$_SESSION['value2'].'" limit 0,10 ';
                                    $select=mysqli_query($link,$sql);  
                                    $i=-1;   while($row=mysqli_fetch_array($select))
                                    { $i=$i+1;
                                        echo'<tr>
                                        	<td>'.$row['SubjectCode'].'</td>
                                        	<td>'.$row['SubjectName'].'</td>
                                        	<td>'.$row['Units'].'</td>
                                        	<td>'.$row['Part'].'</td>
                                        	<td>'.$row['Offeredto'].'</td>
											<td><a target="_blank" href="'.$row['Syllabus'].'">'.'click me to view syllabus'.'</td></a>
											';
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="new_paper.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['SubjectCode'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">';
											 $_SESSION['value12']=$row['SubjectCode'];
											 echo'<table><tr><td width="75%"><a href="edit_paper.php"><h5> Edit</h5> </a></td><td>
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></td></tr></table></form>
                                      </td>  </tr>';
									  
									}
									?></tbody>  </table><div id="all_rows"></div>
									<input type="hidden" id="row_no" value="10">
                              

</div>

</body>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>



</html>