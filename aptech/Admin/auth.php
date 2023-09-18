<?php
session_start();
if(!isset($_SESSION['auth'])){
    $_SESSION['authstatus']="login to Access Dashboard";
    header("location:../index.php");
    
exit(0);
}else{
    if( $_SESSION['auth'] == "1"){
      
        //header("location:index.php");
        //exit(0);
    }else{
        $_SESSION['status']="you are not have admin right";
        header("location:../index.php");
        exit(0);
    }
}



?>