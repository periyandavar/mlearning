<?php			session_start();
			  if(isset($_POST['getresult']))
  {
require('connect.php');
   $k=0;
    $no = $_POST['getresult'];
   	$sql='SELECT  * From video where StaffCode="'.$_SESSION['value2'].'" limit '.$no.',10 ';
                                    $select=mysqli_query($link,$sql);  
                                                        $i=$no; 
    		                            while($row=mysqli_fetch_array($select))
                                    {  $i=$i+1;
										if($k==0 and empty($row['Number'])){
											
                                        echo'<div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                   <thead>
                                       <th> Subject Name </th>
										<th> class </th>
                                    	<th> Topic</th>
										<th> Video</th>
                                    	<th>Status</th>
										<th>Action</th>
                                    </thead>
                                     <tbody>';
										}
											
                                       $q1='select subjectname from subject where subjectcode="'.$row['SubjectCode'].'"';
										$result1=mysqli_query($link,$q1);if(mysqli_num_rows($result1)>0){
                                             ($rw=mysqli_fetch_assoc($result1));
                                        echo'<tr>
                                        	<td>'.$rw['subjectname'].'</td>';
											
                                        $url=explode('/',$row["Url"]);
										echo'
                                        	<td>'.$row['ClassCode'].'</td>
                                        	<td>'.$row['Topic'].'</td>
											<td>'.'<iframe width="500" height="255" src="https://www.youtube.com/embed/'.$url[3].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </td>';
											if(($row['status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="videography.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									   $k=1;
									
								
										}
									    
									}
    echo'</thbody></table></div></div>';
	
    exit();
  }
?>