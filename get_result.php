<?php					
    require('connect.php');
if(isset($_POST['getresult']))
  {
   
   $k=0;
    $no = $_POST['getresult'];
    $select=mysqli_query($link,"SELECT  * From super_admin_notification limit $no,10");
                            $i=$no; 
    		                            while($row=mysqli_fetch_array($select))
                                    {  $i=$i+1;
										if($k==0 and empty($row['Number'])){
                                        echo'<div class="content table-responsive table-full-width" >
                                <table class="table table-striped">
                                   <thead>
                                        <th> Notification </th>
                                    	<th>To</th>
                                    	<th>Status</th>
                                    	<th>Action </th>
                                    </thead>
                                     <tbody>';
										}
                                        	echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.$row['Topic'].'<br> </b> <i class="ti-bell"></i>'.$row['Content'].'</td>
                                        	<td>'.$row['send_to'].'</td>
';
											if(($row['Status'])=='y')
											{ $y='Enabled'; $y1='Enable'; $n='Disabled'; $n1='Disable'; }
										    else
										    { $n='Enabled'; $n1='Enable'; $y='Disabled'; $y1='Disable'; }	
											echo'<td>'.$y.'</td>
											<td>';
											echo'
<form id="myform" action="sadmin_notification.php" method="POST">
											 <input type="hidden" name="'.$i.'" value="'.$row['id'].'" >
											 <input type="hidden" name="'.(($i+1)*-1).'" value="'.$n.'" >
											 <button type="submit" class="btn btn-info btn-fill btn-wd" name="eb" value="'.$i.'">'.$n1.'</button>
											 <input type="hidden" name="t'.$i.'" id="'.$i.'" value="'.$i.'">
											 <button id="click" onclick="submitform('.$i.');" name="eb2" value="'.$i.'">'.'X'.'</button></form>
                                      </td>  </tr>';
									 $k=1;
									    
									}
    echo'</thbody></table></div></div>';
	
    exit();
  }
?>