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
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
    <!-- Title -->
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

    <title> Notes </title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>

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
      var val2 = document.getElementById("row_no0").value;
      $.ajax({
      type: 'post',
      url: 'get_notes.php',
      data: {
       getresult:val
       getresult2:val2
       
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
               </td><td><a href="superuser.php"><h5 style="font-family: 'Courgette', cursive; color:white;">MASTER

<?php
         $id=$_SESSION['value2'];
    $sql='SELECT Staff_Name From super_user where Staff_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);
	  $name=$row['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5></a></td></tr></table><b>";
?>                      
                 
                </a>
            </div>
			</div>
			</div>

            <ul class="nav">
                <li>
                    <a href="superuser_profile.php">
                        <i class="ti-user"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Profile</p>
                    </a>
                </li>
                <li>
                    <a href="superuser.php">
                        <i class="ti-pencil"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Post </p>
                    </a>
                </li>
								<li>
                    <a href="live.php">
                        <i class="ti-control-forward"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px"> Go Live </p>
                    </a>
                </li>
				<li class="active">
                    <a href="notes.php">
                        <i class="ti-panel"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px">Notes</p>
                    </a>
                </li>
                <li>
                    <a href="quiz.php">
                        <i class="ti-text"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Quiz</p>
                    </a>
                </li>
                <li>
                    <a href="modelquestions.php">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Model Questions</p>
                    </a>
                </li>
                <li>
                    <a href="photography.php">
                        <i class="ti-map"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Photography</p>
                    </a>
                </li>
                <li>
                    <a href="videography.php">
                        <i class="ti-export"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Videography</p>
                    </a>
                </li>
				<li>
                    <a href="assignment.php">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Assignments</p>
                    </a>
                <li>
                    <a href="notification.php">
                        <i class="ti-bell"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Notifications</p>
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
                    <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Notes</a>
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

<center><h3>Add Notes </h3>
	
<div class="container-fluid"> 
	<script>
											function submitform1()
											{
												
												document.forms["myform"].submit();
												
											}
											</script>
                            <div class="content">
                                    <div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<?php 
										 $sbid="";
										 if(isset($_POST['sub']))
										 { $sbid=$_POST['sub'];}
									      echo'
                                        <div class="col-md-4">
										<div class="form-group"><form id="myform" action="notes.php" method="POST">
                                               <label>Subject Name</label>
											   <select onchange="submitform1();" required="required" name="sub" class="form-control border-input"><option value='.$sbid.'>'.$sbid;
    $sql='SELECT PaperCode From link where StaffCode="'.$id.'"';
	$results=mysqli_query($link,$sql);
	while($row=mysqli_fetch_assoc($results))
	{
	  $key=$row['PaperCode'];
      $sql='SELECT SubjectName From subject where SubjectCode="'.$key.'"';
	  $result=mysqli_query($link,$sql);
	  while($row=mysqli_fetch_assoc($result))
	  {
	  $sbname=$row['SubjectName'];
	  if($sbname!=$sbid)
	  {
	  echo "<option value='$sbname'> $sbname ";
	  }}
	}
	$sql='SELECT DepartmentCode From super_user where Staff_ID="'.$id.'"';
	$results=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($results);
	$t=$row['DepartmentCode'];
    $sql='SELECT SubjectCode, subjectname From subject where offeredto="All" and DepartmentCode="'.$t.'"';
	$results=mysqli_query($link,$sql);
	while($row=mysqli_fetch_assoc($results))
	{ $sbname=$row['subjectname'];
	$scode=$row['SubjectCode'];if($sbname!=$sbid)
		{
	  echo "<option value='$scode'> $sbname ";
		}
	}	
echo'</select></form>
											<form action="#file" method="POST" enctype="multipart/form-data">
											<input type="hidden" name=sbid value="'.$sbid.'">
									    </div>
										</div>
										<div class="col-md-4">
                                            <div class="form-group">
											<label> Class Name </label>
											<select required="required" name="clid" class="form-control border-input" >  ';
											if($sbid!=""){
	$sql='SELECT SubjectCode,offeredto From subject where SubjectName="'.$sbid.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);
	  $ll=$row['SubjectCode'];
      $ab=$row['offeredto'];
      if($ab=="All")
	  {		echo "<option value=All> All ";  }else{echo'<option value=""> ';
    $sql='SELECT ClassCode From link where StaffCode="'.$id.'" and papercode="'.$ll.'"';
	$results=mysqli_query($link,$sql);
	while($row=mysqli_fetch_assoc($results))
	{
	  $key=$row['ClassCode'];
      $sql='SELECT ClassName From class where ClassCode="'.$key.'"';
	  $result=mysqli_query($link,$sql);
	  while($rows=mysqli_fetch_assoc($result))
	  {
	  $clname=$rows['ClassName'];
	  echo "<option value='$clname'> $clname ";
	  }
	  }}
	}  
echo'
</select>'.'
';
                        ?>                
				</div></div></div><div class="row">
										<div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-8">
										<div class="form-group">
										<label> Topic </label>
                                           <td><textarea required="required" name="topic" rows='4' cols='8' class="form-control border-input"></textarea>
									    </div>
										</div></div>
										<div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Upload the Notes</label>
											   <input required="required" type="file" id="file" name="file"  accept="application/pdf" style="font-size:14pt;width:270px;"/>   
									    </div>
										</div>
										
										<script> var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 3007200){
       alert("File is too big! please select the file less than 3 MB of size");
       this.value = "";
    };
};</script>
										</div>
										<div class="row">
									    <div class="col-md-4">
                                            <div class="form-group">
                                             </div>
                                        </div>
                                        
										<div class="col-md-3">
										<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Add' value='ADD'>ADD </button>
                                    </div>
                                   </div>
                              
                                    </div>
									</div>
                                    </div>
</form>
<br><br>
	</center>
	
<?php			   if(isset($_POST['eb1']))
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
					$sql='Update notes set status="'.$st.'" Where id="'.$id.'" and staffcode="'.$_SESSION['value2'].'"'	;
                    (mysqli_query($link,$sql));
				  }

?>
	
<?php
if(isset($_POST['Add']))
    {
	 $id=$_SESSION['value2'];
	 if(isset($_POST['clid']))
	 {
	 $clid=$_POST['clid'];}
	 $sbid=strtoupper($_POST['sbid']);
	 $topic=$_POST['topic'];
	 $jk=0;
	 $name=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
	$position=strpos($name,".");
	$fileextension=substr($name,$position+1);
	$fileextension=strtolower($fileextension);
	date_default_timezone_set('Asia/Kolkata');
	$new=date("Y-m-d H-i-s");
	$path='uploads/notes/';
	  $sbj=str_replace(array('/',"/"),"",$sbid);
	  $sy=$sbj.$new.'.'.$fileextension;	
	  $syh=str_replace(array(' ','<','>',':',"'",'?','*','|','"'),"",$sy);
	  $sy=$path.$syh;
	if(isset($name))
	{
		if($fileextension!='pdf'){  $name=''; }
	if(!empty($name))
	{  
		if(!(move_uploaded_file($tmp_name,$sy)))
		{
			$jk=1;
			echo"Error in uploading Notes <br>This may be due to Larger file size";
		}
		else
		{
			//set_time_limit(0);
ini_set('memory_limit', '-1');
// Include the main TCPDF library and TCPDI.
/*require_once($_SERVER["DOCUMENT_ROOT"].'/vendor/setasign/tcpdf/tcpdf.php');

require_once($_SERVER["DOCUMENT_ROOT"].'/vendor/setasign/tcpdf/tcpdi.php');
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
$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/mlearning/uploads/notes/'.$syh, 'F');
*/		
		}
	}
	}	
	 if($topic=='')
	 {
		 echo"<script>alert('Please enter the topic ')</script>";
	 }
	 elseif($name=='')
	 {
		 echo"<script>alert('Please select the Notes ')</script>";
	 }
	 elseif($sbid=='')
	 {
		  echo"<script>alert('Please provide the subject Name ')</script>";
	 }
	elseif(!isset($clid)){
	}elseif(isset($clid) and $clid==''){ echo"<script>alert('Please select the class Name ')</script>";
	} else	 
	 {
	  if($clid!='All'){
	  $sql='SELECT ClassCode From Class where ClassName="'.$clid.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);
	  $clid=$row['ClassCode'];}
	  $sql='SELECT SubjectCode From subject where SubjectName="'.$sbid.'"';
	  $result=mysqli_query($link,$sql);
	  $row=mysqli_fetch_assoc($result);
	  $sbid=$row['SubjectCode'];		
      $query="insert into notes (StaffCode,ClassCode,SubjectCode,Notes,topic,Status) values ('$id','$clid','$sbid','$sy','$topic','y')";
	     if($jk==0)
		 {if((mysqli_query($link,$query)))
		 {
		  echo "<h3>Notes added Successfully...!.</h3>";
	     }
		 else{
			 echo"<h3>Error in adding the Notes,...!</h3>";
		 }
		 }
		 else{
			 echo"<h3>Error in adding the Notes,...!</h3>";
		 }
	 }
}

?>

<?php
								if(isset($_POST['eb2']))
				  {
					  $i=$_POST['eb2'];
					  if($_POST['t'.$i]=='t'){
					$id=$_POST[$i];
					$q='select notes from notes where id="'.$id.'"';
				    $res=mysqli_query($link,$q);
				    $row=mysqli_fetch_assoc($res);
					$file=$row['notes'];
                    $sql='Delete from notes Where id="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						unlink($file);
						echo' notes Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the notes ,...!';
					}
				  }}
				  
				 ?>

								<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Available Notes </h4>
                                <p class="category">Notes upload by us</p>
                            </div>
                            <div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                        <th> Subject  </th>
										<th> Class </th>
                                    	<th> Topic</th>
										<th> Notes</th>
                                    	<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<script>
											function submitform(a)
											{
												if(confirm("Are sure you want to delete the notes..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>
									
								<?php
									$sql='SELECT  * From notes where StaffCode="'.$_SESSION['value2'].'" limit 0,10 ';
                                    $select=mysqli_query($link,$sql);  
                                    $i=-1;   while($row=mysqli_fetch_array($select))
                                    
                                { $j=0;
                                    $i=$i+1;
								$q1='select subjectname from subject where subjectcode="'.$row['SubjectCode'].'"';
										$result1=mysqli_query($link,$q1);
										if($rowd=mysqli_fetch_assoc($result1)){
                                        echo'<tr>
                                        	<td>'.$rowd['subjectname'].'</td>'.
											' 
                                        	<td>'.$row['ClassCode'].'</td>
                                        	<td>'.$row['Topic'].'</td>
											<td><a target="_blank" href="'.$row['Notes'].'" >click here to view pdf'.'</a></td>';
											$j++;
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="notes.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									  
										}}
							//	echo'<input type="hidden" id="row_no0" value="'.$j.'">'	?></tbody>  </table><div id="all_rows"></div>
									
									<input type="hidden" id="row_no" value="10">
									<script>

									     if(document.getElementById("row_no0").value==0)
    {
        loadmore();
    }
									</script>
                              

</div>
                            </div>

 
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