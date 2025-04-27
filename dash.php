
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.jpg">
  <link href="https://fonts.googleapis.com/css?family=Charm|Copse|Courgette|Cutive+Mono|Happy+Monkey|IBM+Plex+Serif:300i,400,600i|Kalam" rel="stylesheet">
    <!-- Core Stylesheet -->
    <!-- Title -->
    <title>King </title>
     <link href="css/mu.css" rel="stylesheet"/>
	 <link href="css/paper-dashboard.css" rel="stylesheet"/>
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

	 </head>
<body style="background-color:#f7e0ff;">
<!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>
    <!-- ##### Header Area Start ##### -->
	<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="warning">
    	<div class="sidebar-wrapper">
		  <div class='imageing' style="background-image: url('img/user-img-background.jpg');">
			<div class='image' >
			<div class="logo">
			<b><table style='color:white; font-family:courier;'><tr><td> <div class="image">
                    <img src="img/user.png" width="48" height="48" alt="User" /></div>
               </td><td><h5 style="font-family: 'Courgette', cursive;">KING
<?php
      //$id=$_SESSION['value2'];
      //$sql='SELECT College_Name From super_admin where id="'.$id.'"';
	  //$result=mysqli_query($link,$sql);
	  //$name2=mysqli_fetch_array($result);
	  //$name=$name2['College_Name'];
	  echo "<br>Raj kumar". ")</h5></table></b>";
?>       
            </div>
			</div>
			</div>
            <ul class="nav">
                <li>
                    <a href="#">
                        <i class="ti-user"></i>
                        <p style="font-family:'Kalam', cursive;color:'black'"> Profile</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-export"></i>
                        <p style="font-family:'Kalam', cursive;color:'black'">New Department</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-view-list-alt"></i>
                        <p style="font-family:'Kalam', cursive;color:'black'">View Departments</p>
                    </a>
                </li>
				<li>
                    <a href="#">
                        <i class="ti-pencil-alt2"></i>
                        <p style="font-family:'Kalam', cursive;color:'black'">Create Notification</p>
                    </a>
                <li>
                    <a href="#">
                        <i class="ti-bell"></i>
                        <p style="font-family:'Kalam', cursive;color:'black'">View Notifications</p>
                    </a>
                </li>		
				<li >
                    <a href="#">
                        <i class="ti-panel"></i>
                        <p style="font-family:'Kalam', cursive;color:'black'">Log out</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <div class="main-panel" style="background-color:#f7e0ff;">
        <nav class="navbar navbar-default" style="background-color:#00a0ff;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" style="font-family: 'IBM Plex Serif', serif;" href="#">Welcome</a>
                </div>
            </div>
        </nav>
		<br> 
<h3><center style="font-family: 'Copse', serif;"> Welcome to Home page
<?php
echo'ram kumar <center></h3><br><br>';
?>   </div></div>
</body>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>