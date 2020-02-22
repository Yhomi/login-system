<?php
session_start();
require_once "controllers/logout_controller.php";
require_once 'config/db.php';

if(!isset($_SESSION['id'])){
    header('Location:login.php');
    exit();
}

if(isset($_GET['token'])){
    $token=$_GET['token'];
    verifyUser($token);
}
function verifyUser($token){
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM system_info WHERE token=?");
    $stmt->bind_param('s',$token);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->num_rows;
    if($row >0){
        $user=$result->fetch_assoc();
        $up_id=$user['id'];
        $update_query="UPDATE system_info SET verified=1 WHERE id=$up_id";
        if(mysqli_query($conn, $update_query)){
                $_SESSION['id']=$user['id'];
                $_SESSION['username']=$user['username'];
                $_SESSION['email']=$user['email'];
                $_SESSION['verified']=1;
                $_SESSION['message']="Your email address was successfully verified!";
                $_SESSION['msgClass']="alert alert-success";
        }else{
            echo "User Not Found";
        }
    }
   
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="container"></div>
    <div class="row mt-5">
        <div class="col-md-12 offset-md-4">
        <?php if(isset($_SESSION['message'])): ?>
            <div class="<?php echo $_SESSION['msgClass']; ?> w-25">
                <p><?php echo $_SESSION['message']; ?> 
                <?php unset($_SESSION['message']); ?></p>
            </div>
            
        <?php endif; ?>
        <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
        <a href="index.php?logout=1" class="text-danger">logout</a><br>
        <?php if(!$_SESSION['verified']): ?>
            <div class="jumbotron w-25">
                
                <p>You need to verify your account before you have full access to our site
                sign in to your email account and click on the verification link, we just emailed you at
                <strong><?php echo $_SESSION['email']; ?></strong>
                </p>
                
        <?php endif; ?>
        <?php if($_SESSION['verified']): ?>
                <button type="submit" class="btn btn-primary">Verify Account</button>
        <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>