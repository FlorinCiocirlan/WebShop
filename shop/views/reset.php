<!doctype html>
<html lang="en">
<?php require "../layout/header.php"?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../../Static/js/reset.js" defer></script>
    <title>Reset</title>
</head>
<body>
<form method="POST" action="reset.php" class="w-50 h-50 border rounded m-3 p-2 mr-auto ml-auto">
    <div class="form-group">
    <label for="password">New Password</label>
    <input type="password" name="password" id="password" class="form-control">
    <label for="confirmPassword">Confirm Password</label>
    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
    </div>
    <button type="submit" class="btn btn-sm btn-info">Save</button>
</form>
</body>
<?php require "../layout/footer.php" ?>
</html>
