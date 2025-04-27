<?php
    header("Content-Typee:text/html; charset=utf-8",true);
    require('connect.php');
    session_start();
    if($_SESSION['value2']=='')
  {
	header('Location:login.php');
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
?>	
   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Favicon -->
    <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
    <link rel="icon" href="img/core-img/logo.jpg">
	
    <!-- Core Stylesheet -->
    <!-- Title -->
	 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

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

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

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
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
  

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
               </td><td><h5  style="font-family: 'Courgette', cursive;">HEAD
<?php
         $id=$_SESSION['value2'];
   $sql='SELECT Name From admin where id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($result);
	  $name=$rs['Name'];
	  echo "<br>".$name." (".$id.")</h5></table><b>";
?>             
                 
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li>
                    <a href="admin_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px"> Profile</p>
                    </a>
                </li>
				
                <li>
                    <a href="browse_staffs.php">
                        <i class="ti-text"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Browse</p>
                    </a>
                </li>
				<li>
                    <a href="new_staff.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px"> Add Staff</p>
                    </a>
                 </li>			
                <li>
                    <a href="new_class.php">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">New Class</p>
                    </a>
                </li>
				
                <li class="active">
                    <a href="new_paper.php ">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Charm', cursive; font-size:14px">Add Paper</p>
                    </a>
                </li>
				
				<li >
                    <a href="manage_paper.php">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Manage Paper</p>
                    </a>
                </li>
				<li>
                    <a href="admin_notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="superadmin.php?logout=true">
                        <i class="ti-shift-left"></i>
                        <p style="font-family:'Kalam', cursive; font-size:14px">log out</p>
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
                   <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">New Paper</a>
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
<br>
<center>
									<h3>Create New Subject </h3><br>
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
											   <input type='text' required="required" class="form-control border-input" placeholder='Subject Code' name='sbid'>
									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group"><label>Subject Name</label>
										<input type="text" required="required" class="form-control border-input" placeholder="Subject Name" name="sbname"> 
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
											<select name="part" id='part' required="required" onchange="get();" class="form-control border-input" > <option value=''> <option value='LANGUAGE '> I LANGUAGE<option value='CORE'> II CORE <option value='ALLIED'> III ALLIED <option value='NME'> IV NON-MAJOR </select>
                                             </div>
                                        </div>
                                        <div class="col-md-4">
										<div class="form-group">
										<label> Offered To </label>
                                             <select name="to" id='sel' required="required" class="form-control border-input" ><option value=''>

</select>							    </div>
										</div>
										
										 <div class="col-md-3">
                                            <div class="form-group"><label> </label><br>
											 </div>
                                        </div>
                                       </div>
									   <div class="row"><div class="col-md-2"><div id="all_rows"></div></div></div>
										<div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        <div class="col-md-3">
										<div class="form-group">
                                               <label>Number of units</label>
											   <input type="number" min='01' name="units" required="required" style="font-size:14pt;width:270px;" placeholder="Number of Units" class="form-control border-input" />
									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Upload the Syllabus</label>
											   <input id="file" type="file" name="file" accept="application/pdf" required="required" style="font-size:14pt;width:270px;"/>   
									    </div>
										
										<script> var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 307200){
       alert("File is too big! please select the file less than 3 MB of size");
       this.value = "";
    };
};</script>
										</div>
										</div>
										<div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Create' value='Create'> CREATE </button>
                                    </div>
                                   </div>
                              
									</div>
                                    </div>
									</div></form>
<br>
<?php
if(isset($_POST['Create']))
    {
	$sbid=strtoupper($_POST['sbid']);
	$name=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
	$path='uploads/syllabus/';
	$sbj=str_replace(array('/',"/"),"",$sbid);
	  $sbj=str_replace(array('/',"/"),"",$sbid);
	  $sy=$sbj.'.'.$fileextension;	
	  $syh=str_replace(array(' ','<','>',':',"'",'?','*','|','"'),"",$sy);
	  $sy=$path.$syh;
	if(isset($name))
	{
		$path='uploads/syllabus/';
	if(!empty($name))
	{
		if(!(move_uploaded_file($tmp_name,$path.$sbj.'.'.$fileextension)))
		{
			echo"Error in uploading syllabus";
		}
		else
		{
//			set_time_limit(0);
ini_set('memory_limit', '-1');
// Include the main TCPDF library and TCPDI.
/*require_once('vendor\setasign\tcpdf\tcpdf.php');
require_once('vendor\setasign\tcpdf\tcpdi.php');

// Create new PDF document.

$pdf = new TCPDI();

$files = [
'uploads/cust/gmlas.pdf',
        $sy,
	'uploads/cust/gmlas.pdf'	
		
];

foreach ($files as $file) {
    $pageCount = $pdf->setSourceFile($file);

    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $tplidx = $pdf->importPage($pageNo, '/BleedBox');
		$size = $pdf->getTemplatesize($tplidx);
		$orientation = ($size['w'] > $size['h']) ? 'L' : 'P';
        $pdf->AddPage($orientation);
        $s = $pdf->useTemplate($tplidx, 10, 10, 200);
    }
}

$file = uniqid().'.pdf';
unlink($sy);
$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/mlearning/uploads/syllabus/'.$syh, 'F');
*/		}
	}
	if($fileextension!='pdf'){  $name=''; }
	}
	 $id=$_SESSION['value2'];
	 $sbname=$_POST['sbname'];
	 $units=$_POST['units'];
	 $part=$_POST['part'];
	 $sbid=strtoupper($_POST['sbid']);
	 $to=$_POST['to'];
	  if($sbname=='')
	 {
		 echo"<script>alert('Please enter the subject name ')</script>";
	 }	 
	 elseif($name=='')
	 {
		 echo"<script>alert('Please select the Syllabus ')</script>";
	 }
	 elseif($sbid=='')
	 {
		 echo"<script>alert('Please enter the subject code')</script>";
     }
	 elseif($name=='')
	 {
		echo"<script>alert('Please Select the syllabus to upload')</script>";
	 }		
	 elseif($units=='')
	 {
		 echo"<script>alert('Please enter the number of units ')</script>";
	 }
	 elseif($part=='')
	 {
		echo"<script>alert('Please select the part ')</script>"; 
	 }
	 elseif($to=='')
	 {echo"<script>alert('Please select offered to department')</script>";
	 }
   	else
	 {if($to!="All"){
		$sql='SELECT id From admin where Name ="'.$to.'"';
	  $result=mysqli_query($link,$sql);
	  ($row=mysqli_fetch_assoc($result));
	  $to=$row['id']; }
	     $query="insert into subject (SubjectCode,SubjectName,DepartmentCode,Units,Status,Part,Syllabus,Offeredto) values ('$sbid','$sbname','$id',$units,'y','$part','$sy','$to')";
	  if((mysqli_query($link,$query)))
		{
		     echo "<h3>New Paper added Successfully,...!</h3>";
	    }
		else
		 {
		  echo "<h3>Registeration is failed Invalid data...!</h3>";
		 }
	 }	 
}
?>

<?php			  if(isset($_POST['eb1']))
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
					$sql='SELECT subjectName,syllabus From subject where subjectcode="'.$id.'"';
	                $result=mysqli_query($link,$sql);
					if($row=mysqli_fetch_assoc($result)){
	                $name=$row['subjectName'];$file=$row['syllabus'];}
	 				$sql='Delete from subject Where subjectcode="'.$id.'"'	;		
					if(mysqli_query($link,$sql))
					{
						unlink($file);
						$sql='Delete from link Where papercode="'.$id.'"'	;		
					(mysqli_query($link,$sql));
					$sql='Delete from link2 Where papercode="'.$id.'"'	;		
					(mysqli_query($link,$sql));
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
											<td><a target="_blank" href="'.$row['Syllabus'].'">'.'click me to view pdf'.'</td></a>
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
</div></center></div>
</body>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

</html>