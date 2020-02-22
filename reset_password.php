<?php
session_start();
include 'controllers/reset_passwordController.php';
require_once "config/db.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="container"></div>
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <form class="mt-5 pt-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h3 class="text-center text-secondary">Reset Your Password</h3>
                <?php if($msg !=""): ?>
                    <div class="<?php echo $msgClass; ?> w-25">
                        <p><?php echo $msg; ?></p>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
               
                <div class="form-group">
                    <label for="Confirm password">Confirm Password</label>
                    <input type="password" name="Confpassword" class="form-control">
                </div>
               
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</body>
</html>