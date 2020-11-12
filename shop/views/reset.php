<!doctype html>
<html lang="en">
<?php require "../layout/header.php"?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="reset.php" class="w-50 h-50 border rounded m-3 p-2 ml-auto mr-auto">
    <div class="form-group">
    <label for="reset" >Email</label>
    <input type="email" name="email" id="reset" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-sm btn-info"> Reset Password</button>
</form>
</body>
<?php require "../layout/footer.php" ?>
</html>
