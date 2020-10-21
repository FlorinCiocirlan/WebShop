<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Static/css/add.css"/>

</head>
<body>

<div class="container">

    <form id="contact" method="post" action="category.php" enctype="multipart/form-data">
        <h3>Category Information</h3>
        <h4>Please fill in all fields</h4>

        <?php if (isset($id)): ?>
            <fieldset><input type="hidden" name="id" value="<?= $id ?>"/></fieldset>
        <?php endif; ?>
        <fieldset>Name: <input type="text" name="name" value="<?= $name ?>" required/></fieldset>
        <fieldset>Description: <textarea name="description"><?=$description ?></textarea></fieldset>


        <fieldset><button type="submit" id="contact-submit" data-submit="...Saving" >Save</button></fieldset>


    </form>


</div>


</body>
</html>



