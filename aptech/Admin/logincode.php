<?php
include("conn.php");
session_start();

if(isset($_POST['loginbtn'])){
    $email =$_POST['email'];
    $password =$_POST['password'];
    $log_qu ="SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $qu_run=mysqli_query($con,$log_qu);
    if(mysqli_num_rows($qu_run)>0){
        $row=mysqli_fetch_array($qu_run);
        $usr_id = $row[0];
        $usr_name = $row[1];
        $usr_email = $row[2];
        $usr_phone = $row[3];
        $role_as = $row[5];

        $_SESSION['auth']= "$role_as";
        $_SESSION['auth-user']=[
            'usr_id'=>$usr_id,
            'usr_name'=>$usr_name,
            'usr_email'=>$usr_email,
            'usr_phone'=>$usr_phone
        ];
        $_SESSION['status'] = "Logged in successfully";
        header("location: index.php");

    }else{
        $_SESSION['status'] = "invalid email or password ";
        header("location:login.php");

    }
    
}else{
    $_SESSION['status'] = "Access Denied";
    header("location:login.php");
}






?>