<!doctype html>
<html lang="en">
<?php require "../layout/header.php"?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<div class="container">
<!--    <div>-->
<!--        <button class="btn btn-sm mt-2" style="background-color: #FAE1DF;color:black;"><a href="products.php" style="text-decoration: none; color: black; width: 100%; height: 100%">Go Home </a></button>-->
<!--    </div>-->
<form class="w-50 h-50 ml-auto mr-auto mt-5 border rounded p-3" method="post" action="../shop/login.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="form-group">
        <label for="">New Here ? <a href="register.php">Sign Up </a></label>
    </div>
    <div class="form-group">
        <label> <a href="requestReset.php">forgot password ?</a></label>
    </div>
    <button type="submit" class="btn btn-sm" style="background-color: #9EA3B0; color: black;">Sign In</button>
    <?php
        if (isset($color) && isset($feedBack)){
            echo '<p style="color:'.$color.';margin-top:10px;text-align:center;">'.$feedBack.'</p>';
        }
    ?>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php require "../layout/footer.php" ?>
</html>
