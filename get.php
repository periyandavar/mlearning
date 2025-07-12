<?php
            require('connect.php');
            session_start();
			  if(isset($_POST['getresult']))
  {
    
   $k=0;
    $no = $_POST['getresult'];
    $sql='SELECT  * From subject where DepartmentCode="'.$_SESSION['value2'].'" limit '.$no.',10 ';
                                    $select=mysqli_query($link,$sql);  
                                    
                            $i=$no; 
    		                            while($row=mysqli_fetch_array($select))
                                    {  $i=$i+1;
										if($k==0 and empty($row['Number'])){
                                        echo'<div class="content table-responsive table-full-width" >
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
                                     <tbody>';
										}
                                        	echo' <tr>
                                        	<td>'.$row['SubjectCode'].'</td>
                                        	<td>'.$row['SubjectName'].'</td>
                                        	<td>'.$row['Units'].'</td>
                                        	<td>'.$row['Part'].'</td>
                                        	<td>'.$row['Offeredto'].'</td>
											<td><a target="_blank" href="'.$row['Syllabus'].'" >'.'click me to view pdf'.'</td></a>
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
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';;
									 $k=1;
									    
									}
    echo'</thbody></table></div></div>';
	
    exit();
  }
?>