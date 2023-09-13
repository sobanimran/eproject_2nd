<?php
$con=mysqli_connect("localhost","root","","adminpanel") or die('margaya');
if(!$con){
header("location:error.php");
die();
}

?>
