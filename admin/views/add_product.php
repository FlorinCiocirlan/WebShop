<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Static/css/add.css"/>

</head>
<body>

<div class="container">

    <form id="contact" method="post" action="product.php" enctype="multipart/form-data">
        <h3>Product Information</h3>
        <h4>Please fill in all fields</h4>

        <?php if (isset($id)): ?>
            <fieldset><input type="hidden" name="id" value="<?= $id ?>"/></fieldset>
        <?php endif; ?>
        <fieldset>Name: <input type="text" name="name" value="<?= $name ?>" required/></fieldset>
        <fieldset>Description: <textarea name="description"><?=$description ?></textarea></fieldset>
        <fieldset>Category:
            <select name="category">
                <?php foreach ($categories as $category):?>
                    <option value="<?=$category['name'] ?>" <?php if ($category['name']==$category_name) echo ("selected");?>><?=$category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </fieldset>


        <fieldset>Brand: <input type="text" name="brand" value="<?= $brand ?>" required/></fieldset>
        <fieldset>Stock: <input type="number" name="stock" value="<?= $stock ?>" required/></fieldset>
        <fieldset>Price: <input type="number" name="price" value="<?= $price ?>" required/></fieldset>
        <fieldset>Image: <input type="file" name="image" /></fieldset>

        <fieldset><button type="submit" id="contact-submit" data-submit="...Saving" >Save</button></fieldset>


    </form>


</div>


</body>
</html>



