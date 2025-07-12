	<?php   		session_start();
			  if(isset($_POST['getresult']))
				  
  {
	   require('connect.php');
   $k=0;
   $no = $_POST['getresult'];
   $sql2='SELECT  classcode From user where student_id="'.$_SESSION['value2'].'"';
		                            $result2=mysqli_query($link, $sql2);
		                            $gg=mysqli_fetch_assoc($result2)['classcode']; 
								$sql1='SELECT staffcode,papercode From link where classcode="'.$gg.'"';
		                            $result1=mysqli_query($link, $sql1);
									$num_rows1=mysqli_num_rows($result1);

									$result1=mysqli_fetch_assoc($result1);
									for($j=0;$j<$num_rows1;$j++)
									{
								     $sqll='SELECT subjectname from subject where subjectcode="'.$result1['papercode'].'"';
		                            $result7=mysqli_query($link,$sqll); 
									$sql='SELECT url,topic From Assignment where classcode="'.$gg.'"and staffcode="'.$result1['staffcode'].'"and subjectcode="'.$result1['papercode'].'" and status="y" limit '.$no.',10';
                                    $select=mysqli_query($link,$sql);  
                                     while($row=mysqli_fetch_array($select))
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
                                 <table width="100%"><tr><td width="55%"><b>'.mysqli_fetch_assoc($result7)['subjectname'].'<br>'.$row['topic'] .'</b> </td><td><span><br> <color:orange"><a target="white" href="'.$row['url'].'"> <i class="ti-bell"></i>'.$row['url'].'</a></b></span></td>
</td></tr></table>                     </div></div>   
                                       </td>
                                        	
											</tr>';
									 $k=10;
									}}echo'</tbody></table>';
										
    exit();
  }
									?>