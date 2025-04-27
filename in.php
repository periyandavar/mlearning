<?php
    session_start();
if(isset($_POST['getresult']))
{
require('connect.php');
if($_POST['getresult']=='CORE')
	{
		  $sql='SELECT Name From admin where id="'.$_SESSION['value2'].'"';
	  $result=mysqli_query($link,$sql);
	    $rs=mysqli_fetch_array($result);
	$dname=$rs['Name'];
	echo'<option value="'.$dname.'">'.$dname;}elseif($_POST['getresult']=='ALLIED'){
		 echo "<option value=''> ";
	$sql='SELECT Name From admin where id != "'.$_SESSION['value2'].'"';
	  $result=mysqli_query($link,$sql);
	  while($row=mysqli_fetch_assoc($result))
	  {
	  $dname=$row['Name'];
	  echo "<option value='$dname'> $dname ";
	  }
	}
	else{echo'<option value="All">All';}
}  
?>