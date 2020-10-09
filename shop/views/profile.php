<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1> Profile information </h1>
    <div class="container">
        <div class="card">
            <br>
            <h2> Email : <?=$prod['prod']['email']?> <hr class="m-4"> </h2>
         <form class="was-validated" action="profile.php" method="post" >
                <div class="mb-3">
                    <label for="validationTextarea">Name</label>
                    <input class="form-control is-invalid" id="validationTextarea" placeholder="Required name" value="<?=$prod['prod']['name']?> " name="name" required></input>
                    <div class="valid-feedback">
                        Please enter a name in the textarea.
                    </div>
                    <label for="validationTextarea">Address</label>
                    <input class="form-control is-invalid" id="validationTextarea" placeholder="Required address" value="<?=$prod['prod']['address']?>" name="address"  required></input>
                    <div class="valid-feedback">
                        Please enter a address in the textarea.
s                    <label for="validationTextarea">Address</label>
                    <input class="form-control is-invalid" id="validationTextarea" placeholder="Required phone number" value="<?=$prod['prod']['phone']?> " name="phone" required></input>
                    <div class="valid-feedback">
                        Please enter a phone number in the textarea.
                    </div>
                </div>
                <input type="submit" class="btn btn-warning" value="Change">

            </form><br>
            <hr class="m-4">
            <h2> Role : <?php if($prod['prod']['isadmin'] == 0){echo 'Active member';}else{echo 'Admin';}?></h2>
        </div>
    </div>
</body>
</html>


<?php
//echo "this is profile ";
//var_dump($prod['prod']);