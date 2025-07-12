<?php

require_once("db.php");

$link=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASS)or die (mysqli_error("Connection Error")) ;
 mysqli_set_charset($link,"utf8");
 mysqli_select_db($link,DB_NAME) or die (mysqli_error("Connection Error"));
 ?>