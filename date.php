
<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Datepicker functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

      <!-- Javascript -->
	  <?php
	  echo'
      <script>
         $(function() {
		// var a=((new Date()).getFullYear());
		 var a=1999;
           // $( "#datepicker-1" ).datepicker();
			$("#datepicker").datepicker({
  changeMonth: true,
  changeYear: true,
  dateFormat: "yy-mm-dd",
  yearRange: "1970:'.(date('Y')-22).'"
});
         });
      </script>'; 
	  ?>
   </head>
   
   <body>
      <!-- HTML --> 
      <p>Enter Date: <input type = "text" id = "datepicker"></p>
   </body>
</html>