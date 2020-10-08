<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php
    if ($color && $feedBack){
        echo '<p style="color:'.$color.'">'.$feedBack.'</p>';
    }
?>
<form method="post" action="../shop/login">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password"></label>
    <input type="password" name="password" id="password">
    <button type="submit">Sign In</button>
</form>
</body>
</html>
