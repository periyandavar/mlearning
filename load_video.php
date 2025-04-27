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
										
									$sql='SELECT url,topic From video where classcode="'.$gg.'"and staffcode="'.mysql_result($result1,$j,'staffcode').'"and subjectcode="'.mysql_result($result1,$j,'papercode').'" and status="y" limit '.$no.',10';
                                    $select=mysql_query($sql);  
									 $sqll='SELECT subjectname from subject where subjectcode="'.mysql_result($result1,$j,'papercode').'"';
		                            $result7=mysql_query($sqll,$link); 
                                     while($row=mysql_fetch_array($select))
                                    { $url=explode('/',$row['url']);
								    if($k==0){ echo'<div class="content table-responsive table-full-width">
                                <table class="table table-striped">
									<tbody>';}
																		echo' <tr>
                                        	<td>
											<div class="content">
                                        	    <div class="col-md-12">
                        <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                     <table width="100%"><tr><td> <span><b> <br> <color:orange"><iframe width="500" height="255" src="https://www.youtube.com/embed/'.$url[3].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </a></b></span></td><td><b>'.mysql_result($result7,0,'subjectname').'<br>'.$row['topic'] .'</b></span> <i class="ti-bell"></i>
 </table>                    </div></div>   </td>
                                                                           	
											</tr>';
									 $k=10;
									}}echo'</tbody></table>';
										
    exit();
  }
									?>