<?php				
require('connect.php');
if(isset($_POST['getresult']))
  {
   $k=0;
    $no = $_POST['getresult'];
    $select=mysqli_query($link,"SELECT  * From admin limit $no,10");
                            $i=$no; 
    		                            while($row=mysqli_fetch_array($select))
                                    {  $i=$i+1;
										if($k==0 and empty($row['Number'])){
                                        echo'<div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                    <thead>
                                        <th> Id </th>
                                    	<th>Department Name</th>
                                    	<th>Head</th>
                                    	<th>Mail id </th>
										<th>Staffs Count</th>
                                    	<th>Papers Count</th>
										<th>Status</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>';
										}
                                        	echo'<tr><td>'.$row['id'].'</td>
                                        	<td>'.$row['Name'].'</td>
                                        	<td>'.$row['head'].'</td>
                                        	<td>'.$row['MailId'].'</td>
                                        	<td>'.$row['StaffsCount'].'</td>
											<td>'.$row['PapersCount'].'</td>';
											if(($row['status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											$k=10;
											echo$i.'<form id="myform" action="dep.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
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