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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    <meta name="description" content="">
    
<meta charset="UTF-8">
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title> Quiz </title>
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
         $link=mysql_connect("localhost","root","") ;
    mysql_select_db("mlearning",$link) or die (mysql_error());
    $sql='SELECT Student_Name From user where Student_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $name=mysql_result($result,0,'Student_Name');
	  echo "<br>".$name." (".$id.")</a></h5></table></b>";
?>       
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
				
                <li class="active">
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
                    <a class="navbar-brand" href="#">Quiz</a>
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
<h3> Quiz </h3>
<form action="view_quiz.php" method="POST"><h6>Search for Part I papers</h6>
<table border="0" width="750" height="70">
<tr><td style="font-size:14pt;width:320px;">Subject Name</td><td><select name="sbid" style="font-size:14pt;width:320px;"><option>
<?php
  $sql='select subjectname from subject where part="LANGUAGE"';
  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  { echo'<option value="'.mysql_result($result,0,'subjectname').'" >'.mysql_result($result,0,'subjectname');
	  }
?>
</select><td style="font-size:14pt;width:100px;">   </td>
<td style="font-size:14pt;width:260px;">Unit Number</td><td><select name="unid" style="font-size:14pt;width:70px;"><option value='1'>
I<option value='2'>II<option value='3'>III<option value='4'>IV<option value='5'>V<option></select></td><td style="font-size:14pt;width:120px;">   </td>
<td> <input style="font-size:14pt;width:50px;" type="submit" name='Go' value='Go'/> </tr>	</table></form>
<form action="view_quiz.php" method="POST"><h6>Search for Part IV papers</h6>
<table border="0" width="750" height="70">
<tr><td style="font-size:14pt;width:320px;">Subject Name</td><td><select name="sbid" style="font-size:14pt;width:320px;"><option>
<?php
  $sql='select subjectname from subject where part="NME"';
  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  { echo'<option value="'.mysql_result($result,0,'subjectname').'" >'.mysql_result($result,0,'subjectname');
	  }
?>
</select><td style="font-size:14pt;width:100px;">   </td>
<td style="font-size:14pt;width:260px;">Unit Number</td><td><select name="unid" style="font-size:14pt;width:70px;"><option value='1'>
I<option value='2'>II<option value='3'>III<option value='4'>IV<option value='5'>V<option></select></td><td style="font-size:14pt;width:120px;">   </td>
<td> <input style="font-size:14pt;width:50px;" type="submit" name='Go' value='Go'/> </tr>	</table></form>
<form action="view_quiz.php" method="POST"><h6>Search for Part III Papers</h6>
<table border="0" width="750" height="70">
<tr><td style="font-size:14pt;width:320px;">Subject Name</td><td><select name="sbid" style="font-size:14pt;width:320px;"><option>
<?php
	$sql='SELECT ClassCode From user where Student_id="'.$id.'"';
	 $result=mysql_query($sql,$link);
	 $num_rows=mysql_num_rows($result);
	 $id2=mysql_result($result,0,'ClassCode');
    $sql='SELECT PaperCode From link2 where ClassCode="'.$id2.'"';
	  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  {
	  $idname=mysql_result($result,$i,'PaperCode');
	  $sql='SELECT SubjectName From subject where SubjectCode="'.$idname.'"';
	   $results=mysql_query($sql,$link);
	  $num_row=mysql_num_rows($results);
	  $dname=mysql_result($results,0,'SubjectName');
	  echo "<option value='$dname'> $dname ";
	  }
?>
</select><td style="font-size:14pt;width:100px;">   </td>
<td style="font-size:14pt;width:260px;">Unit Number</td><td><select name="unid" style="font-size:14pt;width:70px;"><option value='1'>
I<option value='2'>II<option value='3'>III<option value='4'>IV<option value='5'>V<option></select></td><td style="font-size:14pt;width:120px;">   </td>
<td> <input style="font-size:14pt;width:50px;" type="submit" name='Go' value='Go'/> </tr>	</table></form>
<?php
if(isset($_POST['Go']))
    {
	 $flag=0;
	 $id=$_SESSION['value2'];
	 $unid=$_POST['unid'];
	 $sbid=($_POST['sbid']);
	 if($unid=='')
	 {
		 echo"<script>alert('Please enter the unit number ')</script>";
	 }
	 elseif($sbid=='')
	 {
		 echo"<script>alert('Please enter the Subject Name ')</script>";
	 }
	 else	 
	 {
		  $sql='SELECT ClassCode From user where Student_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  $name=mysql_result($result,0,'ClassCode');
      $sql='SELECT SubjectCode,offeredto From subject where SubjectName="'.$sbid.'"';
	  $results=mysql_query($sql,$link);
	  $name3=mysql_result($results,0,'SubjectCode');
	  $name4=mysql_result($results,0,'offeredto');
	  	  $arr=array('a1','a2','a3','a4','a5','a6','a7','a8','a9','a10');
	  if($name4!='All'){
     $sql='SELECT StaffCode From link where PaperCode="'.$name3.'"';
	  $res=mysql_query($sql,$link);
	  $num_row=mysql_num_rows($res);
	  echo '<h3> '.$sbid."<br>";
	  echo 'unit -'.$unid."</h3><h3>";
   	  echo'<form action="view_quiz.php" method="POST">';
	  for($i=0;$i<$num_row;$i++)
	  {  
	  $sname=mysql_result($res,$i,'StaffCode');
      $sql='SELECT questions,option1,option2,option3,option4,answer,font From quiz where SubjectCode="'.$name3.'"'.' and status="y" and StaffCode ="'.$sname.'"and ClassCode="'.$name.'"and Unit="'.$unid.'"' ;
	  $rt=mysql_query($sql,$link);
	  $num=mysql_num_rows($rt);
	  if($num>10)
	  {
		  $num=9;
	  }
	  else
	  {
	  for($j=0;$j<$num;$j++)
	  {
	  $flag++;
	  $a=mysql_result($rt,$j,'questions');
	  $b=mysql_result($rt,$j,'option1');
	  $c=mysql_result($rt,$j,'option2');
	  $d=mysql_result($rt,$j,'option3');
	  $e=mysql_result($rt,$j,'option4');
	  $f [$j]=mysql_result($rt,$j,'answer');
	  if(mysql_result($rt,$j,'font')=='Bamini'){
	  echo "<h5> ". ($j+1).") ".$a."</h5><table width='800'><tr><td style='font-family:".mysql_result($rt,$j,'font').";'><input style='width:40px limportant;height:40px limportant;' type='radio' name='".$arr[$j]."' value='".$b."'> m. ".$b."</td><td style='font-family:".mysql_result($rt,$j,'font').";'><input type='radio' name='".$arr[$j]."' value='".$c."'> M. ".$c."</td></tr><tr><td style='font-family:".mysql_result($rt,$j,'font').";'><input type='radio' name='".$arr[$j]."' value='".$d."'> ,. ".$d." </td><td style='font-family:".mysql_result($rt,$j,'font').";'> <input type='radio' name='".$arr[$j]."' value='".$e."'> <. ".$e."</td></tr></table><br>";  }
	  else{
	  echo ($j+1).")  ".$a."<br><table width='800'><tr><td style='font-family:".mysql_result($rt,$j,'font').";'>
	  <input style='width:40px limportant;height:40px limportant;' type='radio' name='".$arr[$j]."
' value='".$b."'> A. ".$b."</td><td style='font-family:".mysql_result($rt,$j,'font').";'>
<input type='radio' name='".$arr[$j]."' value='".$c."'> B. ".$c."</td></tr><tr><td ><input type='radio' name='".$arr[$j]."' value='".$d."'> C. ".$d." </td><td style='font-family:".mysql_result($rt,$j,'font').";'> <input type='radio' name='".$arr[$j]."' value='".$e."'> D. ".$e."</td></tr></table><br>";}  
   	  $_SESSION['num']=$num;
	  $_SESSION['fin']=$f;
	  $_SESSION['gg']=$arr;
	  }
	  }
	  }
	  if($flag==0)
	  {
		  echo"<script>alert('Quiz questions are not yet uploaded for this unit,..!')</script>";
	  }
	  else
	  {
		 echo "<input type='submit' value='submit' name='submit'/>";
	  }
    }else{
	  echo '<h3> '.$sbid."<br>";
	  echo 'unit -'.$unid."</h3><h3>";
   	  echo'<form action="view_quiz.php" method="POST">';
	  $sql='SELECT questions,option1,option2,option3,option4,answer,font From quiz where SubjectCode="'.$name3.'"and status="y" and Unit="'.$unid.'"' ;
	  $rt=mysql_query($sql,$link);
	  $num=mysql_num_rows($rt);
	  if($num>10)
	  {
		  $num=9;
	  }
	  else
	  {
	  for($j=0;$j<$num;$j++)
	  {
	  $flag++;
	  $a=mysql_result($rt,$j,'questions');
	  $b=mysql_result($rt,$j,'option1');
	  $c=mysql_result($rt,$j,'option2');
	  $d=mysql_result($rt,$j,'option3');
	  $e=mysql_result($rt,$j,'option4');
	  $f [$j]=mysql_result($rt,$j,'answer');
	  if(mysql_result($rt,$j,'font')=='Bamini'){
	  echo "<h5 style='font-family:".mysql_result($rt,$j,'font').";'> ". ($j+1).") ".$a."</h5><table width='800'><tr><td style='font-family:".mysql_result($rt,$j,'font').";'><input style='width:40px limportant;height:40px limportant;' type='radio' name='".$arr[$j]."' value='".$b."'> m. ".$b."</td><td style='font-family:".mysql_result($rt,$j,'font').";'><input type='radio' name='".$arr[$j]."' value='".$c."'> M. ".$c."</td></tr><tr><td style='font-family:".mysql_result($rt,$j,'font').";'><input type='radio' name='".$arr[$j]."' value='".$d."'> ,. ".$d." </td><td style='font-family:".mysql_result($rt,$j,'font').";'> <input type='radio' name='".$arr[$j]."' value='".$e."'> <. ".$e."</td></tr></table><br>";  }
	  else{
	  echo ($j+1).")  ".$a."<br><table width='800'><tr><td style='font-family:".mysql_result($rt,$j,'font').";'>
	  <input style='width:40px limportant;height:40px limportant;' type='radio' name='".$arr[$j]."
' value='".$b."'> A. ".$b."</td><td style='font-family:".mysql_result($rt,$j,'font').";'>
<input type='radio' name='".$arr[$j]."' value='".$c."'> B. ".$c."</td></tr><tr><td style='font-family:".mysql_result($rt,$j,'font').";'><input type='radio' name='".$arr[$j]."' value='".$d."'> C. ".$d." </td><td style='font-family:".mysql_result($rt,$j,'font').";'> <input type='radio' name='".$arr[$j]."' value='".$e."'> D. ".$e."</td></tr></table><br>";}  
   	  $_SESSION['num']=$num;
	  $_SESSION['fin']=$f;
	  $_SESSION['gg']=$arr;
	  }
	  }
	  
	  if($flag==0)
	  {
		  echo"<script>alert('Quiz questions are not yet uploaded for this unit,..!')</script>";
	 }
	  else
	  {
		 echo "<input type='submit' value='submit' name='submit'/>";
	  }
	}
	 }
	}
	if (isset($_POST['submit']))
	{
	    $arr=$_SESSION['gg'];
		$f=$_SESSION['fin'];
		$num=$_SESSION['num'];
		$mark=0;
		for($i=0;$i<$num;$i++)
		{ if(isset($_POST[$arr[$i]])){  
			if($f[$i]==$_POST[$arr[$i]])
			{		
				$mark++;
			}
		}
		}
		echo "Marks Scored : " .$mark;
	}
	?>
	
	</form><br>
	</h3>
</body>
</html>