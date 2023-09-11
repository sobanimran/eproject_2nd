<?php
$con=mysqli_connect("localhost","root","","adminpanel");
if(!$con){
header("location:error.php");
die();
}

?>