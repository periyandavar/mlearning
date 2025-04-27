<?php
  require('connect.php');
  session_start();
  if(isset($_POST['getresult']))
  {

   $k=0;
    $no = $_POST['getresult'];
    $sql='SELECT  * From super_user where departmentCode="'.$_SESSION['value2'].'" limit '.$no.',10 ';
                                    $select=mysqli_query($link,$sql);                  $i=$no; 
    		                            while($row=mysqli_fetch_array($select))
                                    {  $i=$i+1;
										if($k==0){
                                        echo'<div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                    <th> Id </th>
                                    	<th>Staff Name</th>
                                    	<th>Qualification</th>
                                    	<th>Specification </th>
										<th>Age</th>
                                    	<th>Blood</th>
										<th>Mail id</th>
										<th>Status</th>
										<th>Action</th>
                                     </thead>
                                    <tbody>';
										}
                                        	echo'<tr>
                                        	<td>'.$row['Staff_id'].'</td>
                                        	<td>'.$row['Staff_Name'].'</td>
                                        	<td>'.$row['Qualification'].'</td>
											<td>'.$row['Specification'].'</td>
                                        	<td>'.$row['Age'].'</td>
                                        	<td>'.$row['Blood'].'</td>
                                        	<td>'.$row['MailId'].'</td>';
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											$k=10;
											echo'
<form id="myform" action="browse_staffs.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['Staff_id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb1" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									    
									}
    echo'</thbody></table></div></div>';
	
    exit();
  }
?>