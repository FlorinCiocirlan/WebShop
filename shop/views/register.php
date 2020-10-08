<!doctype html>
<html lang="en">
<?php require "../layout/head.php"?>
<body>
<form action="../shop/register.php" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <label for="confirmPassword">Confirm password</label>
    <input type="password" name="confirmPassword" id="confirmPassword">
    <button type="submit" name="submit">Sign Up</button>
</form>

</body>
</html>

