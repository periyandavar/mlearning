<?php
echo'
<script>
function hideLoader() {';
echo"$('#loading').hide();
}



// Strongly recommended: Hide loader after 20 seconds, even if the page hasn't finished loading
setTimeout(hide, 6* 1000);
function hide(){
$(window).ready(hideLoader);
}
</script> ";
echo"
<div  id='loading' style='background-color:#FDFDFF;opacity:1;position:'absolute''>kkkkkkkkkkk<div  style='background: url('img\pre.gif') no-repeat center center;width:100%;height:100%'>
<style>
 #loading {
    
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999999;
}
</style>
</div>
</div>";
?>