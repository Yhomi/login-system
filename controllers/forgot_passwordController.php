<?php
require_once "config/db.php";
require_once "controllers/emailController.php";
$msg="";
$msgClass="";
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    if(empty($email)){
        $msg="Empty Field. Please enter your email";
        $msgClass="alert alert-danger";
    }else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $msg="Invalid email";
            $msgClass="alert alert-danger";
        }else{
            $sql="SELECT * FROM system_info WHERE email=?";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result=$stmt->get_result();
            $user=$result->fetch_assoc();
            $token=$user['token'];
            sendPasswordReset($email,$token);
            header("Location:message.php");
        }
    }
}

?>