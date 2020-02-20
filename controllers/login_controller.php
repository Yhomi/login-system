<?php
session_start();
require_once 'config/db.php';
$msg="";
$msgClass="";
    if(isset($_POST['submit'])){
        $username=$_POST['email'];
        $password=$_POST['password'];
        if(empty($username) || empty($password)){
            $msg="Please Fill all Fields";
            $msgClass="alert alert-danger";
        }else{
            $sql="SELECT * FROM system_info WHERE username=? OR email=? LIMIT 1";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param('ss',$username,$username);
            $stmt->execute();
            $result=$stmt->get_result();
            $user=$result->fetch_assoc();
            if(password_verify($password,$user['password'])){
                $msg="Login Successful";
                $msgClass="alert alert-success";
                $_SESSION['id']=$user['id'];
                $_SESSION['username']=$user['username'];
                $_SESSION['email']=$user['email'];
                $_SESSION['verified']=$user['verified'];
                $_SESSION['message']="You are now logged in!";
                $_SESSION['msgClass']="alert alert-success";
                header("Location:index.php");

            }else{
                $msg="Wrong Credentials";
                $msgClass="alert alert-danger"; 
            }
        }
    }
?>