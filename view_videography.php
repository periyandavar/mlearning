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
    <meta charset="UTF-8">
    <meta name="description" content="">
    
<meta charset="UTF-8">
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>Video</title>
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
      $.ajax({
      type: 'post',
      url: 'load_video.php',
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
                
				<li>
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
                <li  class="active">
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
                    <a class="navbar-brand" href="#">Videos</a>
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
<h3> Videos </h3>
<form action="view_videography.php" method="POST"><h5>Search For Part I Papers</h5>
<table border="0" width="850" height="70">
<tr><td style="font-size:14pt;width:150px;">Subject Name</td><td><select name="sbid" style="font-size:14pt;width:450px;"><option>
<?php
  $sql='select subjectname from subject where part="LANGUAGE"';
  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  { echo'<option value="'.mysql_result($result,0,'subjectname').'" >'.mysql_result($result,0,'subjectname');
	  }
?>
</select></td><td style="font-size:14pt;width:220px;"><input type='submit' value='Go' name='Go'></td></tr></table></form>
<form action="view_videography.php" method="POST"><h5>Search For Part IV Papers</h5>
<table border="0" width="850" height="70">
<tr><td style="font-size:14pt;width:150px;">Subject Name</td><td><select name="sbid" style="font-size:14pt;width:450px;"><option>
<?php
  $sql='select subjectname from subject where part="NME"';
  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  for($i=0;$i<$num_rows;$i++)
	  { echo'<option value="'.mysql_result($result,0,'subjectname').'" >'.mysql_result($result,0,'subjectname');
	  }
?>
</select></td><td style="font-size:14pt;width:220px;"><input type='submit' value='Go' name='Go'></td></tr></table></form>
<h5>For Part III Papers</h5>

<form action="view_videography.php" method="POST">
<table border="0" width="850" height="70">
<tr><td style="font-size:14pt;width:150px;">Subject Name</td><td><select name="sbid" style="font-size:14pt;width:450px;"><option>
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
</select><td>   </td>

<td style="font-size:14pt;width:220px;"> <input type="submit" name='Go' value='Go'/> </tr>	</table></form><div class="container-fluid">
<?php
if(isset($_POST['Go']))
    {
	 
	 $id=$_SESSION['value2'];
	 $sbid=($_POST['sbid']);
	 if($sbid=='')
	 {
		 echo"<script>alert('Please enter the Subject Name ')</script>";
	 }
	
	 else	 
	 {
		 $flag=0;
		  $sql='SELECT ClassCode From user where Student_id="'.$id.'"';
	  $result=mysql_query($sql,$link);
	  $num_rows=mysql_num_rows($result);
	  $name=mysql_result($result,0,'ClassCode');
      $sql='SELECT SubjectCode,offeredto From subject where SubjectName="'.$sbid.'"';
	  $results=mysql_query($sql,$link);
	  $name3=mysql_result($results,0,'SubjectCode');
	  $name4=mysql_result($results,0,'offeredto');
	  if($name4!='All'){
      $sql='SELECT StaffCode From link where PaperCode="'.$name3.'"';
	  $res=mysql_query($sql,$link);
	  $num_row=mysql_num_rows($res);
	  echo '<h3> '.$sbid."</h3>";
	  for($i=0;$i<$num_row;$i++)
	  {		  
	  $sname=mysql_result($res,$i,'StaffCode');
      $sql='SELECT url, Topic From video where SubjectCode="'.$name3.'"'.'and StaffCode ="'.$sname.'"and ClassCode="'.$name.'" and status="y"' ;
	  $rt=mysql_query($sql,$link);
	  $num=mysql_num_rows($rt);
	  
   	  for($j=0;$j<$num;$j++)
	  {
	  $flag++;
	  $a=mysql_result($rt,$j,'topic');
	  $b=mysql_result($rt,$j,'url');
	  	  $url=explode('/',$b);
	  echo ' <table width="75%"><tr><td> <span><b> <br> <color:orange"><iframe width="500" height="255" src="https://www.youtube.com/embed/'.$url[3].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </a></b></span></td><td><b>'.$sbid.'<br>'.$a.'</b></span> <i class="ti-bell"></i>
 </table>  ';
	  
	  }
	  
	  
	  }
	  if($flag==0)
	  {
		  echo"<script>alert('Videos are not yet uploaded for this unit,..!')</script>";
	  }
	  }else{echo '<h3> '.$sbid."</h3>";
	  $sql='SELECT url, Topic From video where SubjectCode="'.$name3.'" and status="y"' ;
	  $rt=mysql_query($sql,$link);
	  $num=mysql_num_rows($rt);
	  
   	  for($j=0;$j<$num;$j++)
	  {
	  $flag++;
	  $a=mysql_result($rt,$j,'topic');
	  $b=mysql_result($rt,$j,'url');
	  $url=explode('/',$b);
	  echo ' <table width="75%"><tr><td> <span><b> <br> <color:orange"><iframe width="500" height="255" src="https://www.youtube.com/embed/'.$url[3].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </a></b></span></td><td><b>'.$sbid.'<br>'.$a.'</b></span> <i class="ti-bell"></i>
 </table>  ';
	  }
	  
	   if($flag==0)
	  {
		  echo"<script>alert('Videos are not yet uploaded for this unit,..!')</script>";
	  }
	  }
      
	 }
	}
	?>
	                           	<?php
								$sql2='SELECT  classcode From user where student_id="'.$_SESSION['value2'].'"';
		                            $result2=mysql_query($sql2,$link);
		                            $gg=mysql_result($result2,0,'classcode'); 
								$sql1='SELECT staffcode,papercode From link where classcode="'.$gg.'"';
		                            $result1=mysql_query($sql1,$link);
		                            $num_rows1=mysql_num_rows($result1);
									
            echo'  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Videos</h4>
                                <p class="category">Available Videos </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th> Videos </th>
                                    	
                                    </thead>
                                    <tbody>';
									for($j=0;$j<$num_rows1;$j++)
									{
								$sql='SELECT url,topic From video where classcode="'.$gg.'"and staffcode="'.mysql_result($result1,$j,'staffcode').'"and subjectcode="'.mysql_result($result1,$j,'papercode').'" and status="y" limit 0,10';
		                             $select=mysql_query($sql);  
									  $sqll='SELECT subjectname from subject where subjectcode="'.mysql_result($result1,$j,'papercode').'"';
		                            $result7=mysql_query($sqll,$link); 
		                          while($row=mysql_fetch_array($select))
									
									{
										$url=explode('/',$row['url']);
                                       echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <table width="100%"><tr><td> <span><b> <br> <color:orange"><iframe width="500" height="255" src="https://www.youtube.com/embed/'.$url[3].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </a></b></span></td><td><b>'.mysql_result($result7,0,'subjectname').'<br>'.$row['topic'] .'</b></span> <i class="ti-bell"></i>
 </table>                    </div></div>   </td>
                                        	
											</tr>';
									}
									}
                                    echo' </table><div id="all_rows"></div>
									<input type="hidden" id="row_no" value="10">
</div>
                        </div>
                            </div>
                        </div>
                    </div>';

								
								?>
                        </div>
                            </div>
                        </div>
                    <br>
	</body>
</html>