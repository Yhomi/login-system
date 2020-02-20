<?php
session_start();
require 'config/db.php';
require 'emailController.php';
$msg="";
$msgClass="";
if(isset($_POST['submit'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordConf=$_POST['confpass'];
    if(empty($name)|| empty($email)|| empty($password) || empty($passwordConf)){
        $msg="Please Fill in All Field";
        $msgClass="alert alert-danger";
    }else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $msg="Please use a Valid Email";
            $msgClass="alert alert-danger";
        }else{
            if($password !== $passwordConf){
                $msg="Your Password do not match";
                $msgClass="alert alert-danger";
            }else{
                $emailQuery="SELECT * FROM system_info WHERE email=? LIMIT 1";
                $stmt=$conn->prepare($emailQuery);
                $stmt->bind_param('s',$email);
                $stmt->execute();
                $result=$stmt->get_result();
                $usercount=$result->num_rows;
                $stmt->close();
                if($usercount > 0){
                    $msg="Email already exist";
                    $msgClass="alert alert-danger";
                }else {
                    $password=password_hash($password,PASSWORD_DEFAULT);
                    $token=bin2hex(random_bytes(50));
                    $verified=false;
                    $sql="INSERT into system_info(username,email,verified,token,password) VALUES(?,?,?,?,?)";
                    $stmt=$conn->prepare($sql);
                    $stmt->bind_param('ssbss',$name,$email,$verified,$token,$password);
                   if( $stmt->execute()){
                       $msg="Sign up Successful";
                       $msgClass="alert alert-danger";
                       $user_id=$conn->insert_id;
                       $_SESSION['id']=$user_id;
                       $_SESSION['username']=$name;
                       $_SESSION['email']=$email;
                       $_SESSION['verified']=$verified;
                       sendVerificationEmail($email,$token);
                       $_SESSION['message']="You are logged in";
                       $_SESSION['msgClass']="alert alert-success";

                       header('Location:index.php');
                       exit();
                   }else{
                       $msg="Sign up failed";
                       $msgClass="alert alert-success";
                   }
                }
            }
        }
    }
}

