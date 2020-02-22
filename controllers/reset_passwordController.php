<?php
$msg="";
$msgClass="";
require_once "config/db.php";

if(isset($_GET['password_token'])){
    $password_token=$_GET['password_token'];

    // echo $password_token.'<br>';
    
    $sql="SELECT * FROM system_info WHERE token=?";
     $stmt=$conn->prepare($sql);
     $stmt->bind_param('s',$password_token);
     $stmt->execute();
     $result=$stmt->get_result();
     $user=$result->fetch_assoc();
    //  print_r($result);
     $email=$user['email'];

     
}

if(isset($_POST['submit'])){
    $password=$_POST['password'];
    $ConfPassword=$_POST['Confpassword'];

    if(empty($password)|| empty($ConfPassword)){
        $msg="Empty Fields. Please enter your password";
        $msgClass="alert alert-danger";
    }else{
        if($password != $ConfPassword){
            $msg="Password do not match";
            $msgClass="alert alert-danger";
        }else{
            $hash_password=password_hash($password,PASSWORD_DEFAULT);
            $sql="UPDATE system_info set password=? WHERE email=?";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param('ss',$hash_password,$email);
            $stmt->execute();
            header("Location:login.php");
        }
    }

    
}

?>