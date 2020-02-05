<?php
    include 'controllers/sign-up_controller.php';
    // require  'config/db.php';
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
    <div class="row">
        <div class="col-md-12 offset-md-4">
            <h3 class="float-left mt-5 text-primary">Register</h3>
            <form class="mt-5 pt-5" action="sign-up.php" method="POST">
               <?php if($msg !=""): ?>
               <div class="<?php echo $msgClass; ?> w-25"> <?php echo $msg; ?> </div> 
               <?php endif ?>
                <div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" name="username"  class="form-control form-control-lg w-25">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email"  class="form-control form-control-lg w-25">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg w-25">
                </div>
                <div class="form-group">
                    <label for="confirmPass">Confirm Password</label>
                    <input type="password" name="confpass" class="form-control form-control-lg w-25">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg w-25"><i class="fa fa-user"></i>&nbsp;Sign Up</button>
                </div>
                <p class="float-left" > Already a member? <a href="login.php">Sign In</a></p>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</body>
</html>