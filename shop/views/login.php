<!doctype html>
<html lang="en">
<?php require "../layout/head.php"?>
<body>
<?php
    if (isset($color) && isset($feedBack)){
        echo '<p style="color:'.$color.'">'.$feedBack.'</p>';
    }
?>
<form method="post" action="../shop/login.php">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password"></label>
    <input type="password" name="password" id="password">
    <button type="submit">Sign In</button>
</form>
</body>
</html>
