	<?php   		session_start();
			  if(isset($_POST['getresult']))
				  
  {
   require('connect.php');
   $k=0;
   $no = $_POST['getresult'];
   $sql2='SELECT  classcode From user where student_id="'.$_SESSION['value2'].'"';
		                            $result2=mysqli_query($link, $sql2);
		                            $gg=mysql_result($result2,0,'classcode'); 
								$sql1='SELECT staffcode,papercode From link where classcode="'.$gg.'"';
		                            $result1=mysqli_query($sql1,$link);
		                            $num_rows1=mysqli_num_rows($result1);
							
									
									for($j=0;$j<$num_rows1;$j++)
									{
										
									$sql='SELECT notes,topic From notes where classcode="'.$gg.'"and staffcode="'.mysql_result($result1,$j,'staffcode').'"and subjectcode="'.mysql_result($result1,$j,'papercode').'" and status="y" limit '.$no.',10' ;
                                    $select=mysql_query($sql);  
									$sqll='SELECT subjectname from subject where subjectcode="'.mysql_result($result1,$j,'papercode').'"';
		                            $result7=mysql_query($sqll,$link); 
                                     while($row=mysql_fetch_array($select))
                                    { 
								    if($k==0){ echo'<div class="content table-responsive table-full-width">
                                <table class="table table-striped">
									<tbody>';}
																		echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> '.mysql_result($result7,0,'subjectname').$row['topic'] .'<br> <color:orange"><a href="'.$row['notes'].'"> <i class="ti-bell"></i>'.$row['notes'].'"</a></b></span>
                     </div></div>   </td>
                                        	

											</tr>';
									 $k=10;
									}}echo'</tbody></table>';										
    exit();
  }
									?>