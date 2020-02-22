<?php
$msg="";
$msgClass="";
require_once "config/db.php";

if(isset($_GET['password_token'])){
    $password_token=$_GET['password_token'];

    echo $password_token.'<br>';
    
    $sql="SELECT * FROM system_info WHERE token=?";
     $stmt=$conn->prepare($sql);
     $stmt->bind_param('s',$password_token);
     $stmt->execute();
     $result=$stmt->get_result();
     $user=$result->fetch_assoc();
    //  print_r($result);
     echo $user['email'];

     
}

if(isset($_POST['submit'])){
    $password=$_POST['password'];

    echo $password;
}

?>