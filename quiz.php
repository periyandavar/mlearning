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
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    <meta name="description" content="">
    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Great+Vibes|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam|Noto+Sans+KR|Tangerine" rel="stylesheet">	
    <!-- Favicon -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
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
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title> Quiz </title>
	 <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
      
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
      url: 'get_quiz.php',
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
               </td><td><a href="superuser.php"><h5 style="font-family: 'Courgette', cursive; color:white;">MASTER
			   
<?php
         $id=$_SESSION['value2'];
    $sql='SELECT Staff_Name From super_user where Staff_id="'.$id.'"';
	  $result=mysqli_query($link,$sql);
	    $rs=mysqli_fetch_array($result);
	  $name=$rs['Staff_Name'];
	  echo "<br>".$name." (".$id.")</h5></td></tr></table><b>";
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
				<li >
                    <a href="notes.php">
                        <i class="ti-panel"></i>
                        <p style="font-family: 'Kalam', cursive; font-size:14px">Notes</p>
                    </a>
                </li>
                <li class="active">
                    <a href="quiz.php">
                        <i class="ti-text"></i>
                        <p style="font-family: 'Charm', cursive; font-size:14px">Quiz</p>
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
                     <a class="navbar-brand" style="color:#ffffff;font-family: 'IBM Plex Serif', serif;" href="#">Quiz</a>
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
		  									<script>
											function submitform1()
											{

												document.forms["myform"].submit();
												
											}
											</script>
                                          
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
					$sql='Update quiz set status="'.$st.'" Where id="'.$id.'" and staffcode="'.$_SESSION['value2'].'"'	;
                    (mysqli_query($link,$sql));
				  }
?>
	                                        
<center><h3>Add Quiz Question</h3><br>

                  <div class="container-fluid"> 
                            <div class="content">

						 <div class="row">
<div class="col-md-2">
                                            <div class="form-group">
											 </div>
                                        </div>      <?php 
										 $sbid="";
										 if(isset($_POST['sub']))
										 { $sbid=$_POST['sub'];}
									      echo'
                                        <div class="col-md-4">
										<div class="form-group"><form id="myform" action="quiz.php" method="POST">
                                               <label>Subject Name</label>
											   <select required="required" onchange="submitform1();" name="sub" class="form-control border-input"><option value='.$sbid.'>'.$sbid;
    $sql='SELECT PaperCode From link where StaffCode="'.$id.'"';
	$results=mysqli_query($link,$sql);
	  while($rs=mysqli_fetch_array($results))
	{
	  $key=$rs['PaperCode'];
      $sql='SELECT SubjectName From subject where SubjectCode="'.$key.'"';
	  $result=mysqli_query($link,$sql);
	  while($ros=mysqli_fetch_array($result))
	  {
	  $sbname=$ros['SubjectName'];
	  if($sbname!=$sbid)
	  {
	  echo "<option value='$sbname'> $sbname ";
	  }}
	}
$sql='SELECT DepartmentCode From super_user where Staff_ID="'.$id.'"';
	$results=mysqli_query($link,$sql);
	  $rs=mysqli_fetch_array($results);
	$t=$rs['DepartmentCode'];
    $sql='SELECT subjectname From subject where offeredto="All" and DepartmentCode="'.$t.'"';
	$results=mysqli_query($link,$sql);
	while($rs=mysqli_fetch_array($results))
	{ $sbname=$rs['subjectname'];if($sbname!=$sbid)
		{
	 
	  echo "<option value='$sbname'> $sbname ";
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
$sql='SELECT SubjectCode,offeredto,units From subject where SubjectName="'.$sbid.'"';
	  $result=mysqli_query($link,$sql);
	    $rs=mysqli_fetch_array($result);
	  $ll=$rs['SubjectCode'];
      $ab=$rs['offeredto'];
	  $uni=$rs['units'];
      if($ab=="All")
	  {		echo "<option value=All> All ";  }else{ echo'<option value=""> ';	  
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
	  }  }
	}
	}  
echo'
</select>'.'</div></div>
                                             </div>
                                        ';
                        ?> <div class="container-fluid"> 
                            <div class="content">

										<div class="row">
										<div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										
										<div class="col-md-8">
										<div class="form-group">
										<label> Question </label>
                                           <td><textarea name="question" charset="utf-8" required="required" rows="3" cols="8" class="form-control border-input"></textarea>
									    </div>
										</div></div>
										<div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>option A</label>
											   <input type="text" required="required" charset="utf-8"  name="A" class="form-control border-input"/>   
									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Option B</label>
											   <input type="text" required="required" charset="utf-8"  name="B" class="form-control border-input"/>   
									    </div>
										</div>
										</div>
										<div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Option C</label>
											   <input type="text" required="required"  charset="utf-8" name="C" class="form-control border-input"/>   
									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Option D</label>
											   <input type="text" required="required" charset="utf-8" name="D" class="form-control border-input"/>   
									    </div>
										</div>
										</div>
										<div class="row">
									    <div class="col-md-2">
                                            <div class="form-group">
                                             </div>
                                        </div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Answer</label>
											   <select name="ans" required="required" class="form-control border-input" ><option value=""> <option value="A"> A <option value="B"> B <option value="C"> C <option value="D"> D </select>

									    </div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
                                             <label>Unit</label>
											   <input type="NUMBER" required="required" min='01' max='<?php if (isset($uni)) echo $uni; ?>' name="unit" class="form-control border-input"/>   
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
									<button type="submit" class="btn btn-info btn-fill btn-wd" name='Add' value='ADD'>ADD </button>
                                    </div>
                                   </div>
                              
                                    </div>
									</div>
                                    </div>
</form>	</center>
	
<?php
if(isset($_POST['Add']))
    {
	 $a=$_POST['A'];
	 $b=$_POST['B'];
	 $c=$_POST['C'];
	 $d=$_POST['D'];
	 $ans=$_POST['ans'];
	 $id=$_SESSION['value2'];
	 if(isset($_POST['clid'])){
	 $clid=$_POST['clid'];}
	 $sbid=($_POST['sbid']);
	 $question=$_POST['question'];
	 $unit=$_POST['unit'];
	  if(($a=='') and($b=='')and($c=='')and($d=='') )
	 {
		 echo"<script>alert('Please enter all the four options ')</script>";
	 }
	 elseif($unit=='')
	 {
		 echo"<script>alert('Please enter the unit number for the question ')</script>";
	 }
	elseif(!isset($clid)){
	 echo"<script>alert('Please select the class Name ')</script>";}
	 elseif(isset($clid) and $clid==''){ echo"<script>alert('Please select the class Name ')</script>";
	} elseif($sbid=='')
	 {
		 echo"<script>alert('Please enter the Subject id ')</script>";
	 }
	 elseif($question=='')
	 {
		 echo"<script>alert('Please enter the question ')</script>";
	 }
	 elseif($ans=='')
	 {
		 echo"<script>alert('Please enter the correct Answer ')</script>";
	 }
	 else
	 {
		if($clid!='All'){
	  $sql='SELECT ClassCode From Class where ClassName="'.$clid.'"';
	  $result=mysqli_query($link,$sql);
	  ($row=mysqli_fetch_assoc($result));
		$clid=$row['ClassCode'];}
	  $sql='SELECT SubjectCode From subject where SubjectName="'.$sbid.'"';
	  $result=mysqli_query($link,$sql);
	  ($w=mysqli_fetch_assoc($result));
	  $sbid=$w['SubjectCode'];		
       if($ans=='A')
	   { $ans=$a;	}
       elseif($ans=='B')
	   { $ans=$b; }
       elseif($ans=='C')
	   { $ans=$c; }
       elseif($ans=='D')
	   { $ans=$d; }
          	   
      $query="insert into quiz (StaffCode,ClassCode,SubjectCode,Questions,Option1,Option2,Option3,Option4,Answer,unit,Status) values ('$id','$clid','$sbid','$question','$a','$b','$c','$d','$ans','$unit','y')";
			 if((mysqli_query($link,$query)))
		 {
		  echo "<h3>Question added Successfully...!</h3>";
	     }
		 else{
			 echo"<h3>Error in adding the questions,...!</h3>";
		 }
	 
	 }
}

?>

<?php
              
					if(isset($_POST['eb2']))
				  {
					  $i=$_POST['eb2'];
					  if($_POST['t'.$i]=='t'){
					$id=$_POST[$i];	$sql='Delete from quiz Where id="'.$id.'"'	;
					if(mysqli_query($link,$sql))
					{
						echo' question is Deleted Successfully,...!';
					}
					else
					{
						echo'Unable to Delete the question ,...!';
					}
				  }}
				  
				 ?>

		
		

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Available Questions </h4>
                                <p class="category">Questions send by us</p>
                            </div>
                            <div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                      <th> Subject  </th>
										<th> Class </th>
                                    	<th> Question</th>
										<th> Answer</th>
										
                                    	<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<script>
											function submitform(a)
											{
												if(confirm("Are sure you want to delete the quiz..?")){
												document.getElementById(a).value = "t";}
												else{document.getElementById(a).value = "f";
												}
												
											}
											</script>
									
								<?php
									$sql='SELECT  * From quiz where StaffCode="'.$_SESSION['value2'].'" limit 0,10 ';
                                    $select=mysqli_query($link,$sql);  
                                    $i=-1;   while($row=mysqli_fetch_array($select))
                                    { $i=$i+1;
								$q1='select subjectname from subject where subjectcode="'.$row['SubjectCode'].'"';
										$result1=mysqli_query($link,$q1);
										if($row1=mysqli_fetch_assoc($result1))
{
                                        echo'<tr>
                                        	<td>'.$row1['subjectname'].'</td>'.
											' 
                                        	<td>'.$row['ClassCode'].'</td><td>'.$row['Questions'].'</td>
                                        	<td>'.$row['Answer'].'</td>
											';
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="quiz.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									  
									}}
									?></tbody>  </table><div id="all_rows"></div>
									<input type="hidden" id="row_no" value="10">
                              

</div>
                            </div>
</body>

    <!--   Core JS Files   -->
    
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

</html>