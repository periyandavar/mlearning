	<?php   		session_start();
			  if(isset($_POST['getresult']))
				  
  {
    $link=mysql_connect('localhost','root','');
    mysql_select_db('mlearning');
   $k=0;
   $no = $_POST['getresult'];
   $sql2='SELECT  classcode From user where student_id="'.$_SESSION['value2'].'"';
		                            $result2=mysql_query($sql2,$link);
		                            $gg=mysql_result($result2,0,'classcode'); 
								$sql1='SELECT staffcode,papercode From link where classcode="'.$gg.'"';
		                            $result1=mysql_query($sql1,$link);
		                            $num_rows1=mysql_num_rows($result1);
							
									
									for($j=0;$j<$num_rows1;$j++)
									{
										
									$sql='SELECT title,path From modelquestion where classcode="'.$gg.'"and staffcode="'.mysql_result($result1,$j,'staffcode').'"and subjectcode="'.mysql_result($result1,$j,'papercode').'" and status="y" limit '.$no.',10' ;
                                    $sqll='SELECT subjectname from subject where subjectcode="'.mysql_result($result1,$j,'papercode').'"';
		                            $result7=mysql_query($sqll,$link); 
									$select=mysql_query($sql);  
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
                                    <span><b> '.mysql_result($result7,0,'subjectname').$row['title'] .'<br> <color:orange"><a href="'.$row['path'].'"> <i class="ti-bell"></i>'.$row['path'].'"</a></b></span>
                     </div></div>   </td>
                                        	
											</tr>';
									 $k=10;
									}}echo'</tbody></table>';
										
    exit();
  }
									?>