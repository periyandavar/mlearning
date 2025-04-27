<?php
echo'llllllllllll';
if (isset($_POST['getresult'])){
echo$_POST['getresult'];
echo'yes';}
?>



<script>
function set()
    {
      var val = document.getElementById("set").value;
	  var val2 = document.getElementById("jk").value;
      $.ajax({
      type: 'post',
      url: 'inc.php',
      data: {
       getresult:val
	   ret:val2
      },
      success: function (response) {
	  var content = document.getElementById("all_rows");
      content.innerHTML = content.innerHTML+response;

      }
      });
    }</script>

		<input style="font-size:14pt;width:30px;" type='text' name='set' id='set' >
											<a class="btn btn-info btn-fill btn-wd" onclick="set();" > + </a>
                                            