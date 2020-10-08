<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Static/css/add_user.css"/>

</head>
<body>

<div class="container">

    <form id="contact" method="post" action="user.php">
        <h3>User Information</h3>
        <h4>Please fill in all fields</h4>

        <?php if (isset($id)): ?>
            <fieldset><input type="hidden" name="id" value="<?= $id ?>"/></fieldset>
        <?php endif; ?>
        <fieldset>Name: <input type="text" name="name" value="<?= $name ?>" required/></fieldset>
        <fieldset>Email: <input type="email" name="email" value="<?= $email ?>" required/></fieldset>
        <fieldset>Address: <textarea name="address"><?= $address ?></textarea></fieldset>
        <fieldset>Phone: <input type="tel" name="phone" value="<?= $phone ?>" required/></fieldset>
        <fieldset>Administrator: <input type="checkbox" name="admin" value="admin" <?php if ($admin) echo "checked"; ?>/> </fieldset>
        <fieldset><button type="submit" id="contact-submit" data-submit="...Saving" >Save</button></fieldset>


    </form>


</div>


</body>
</html>



