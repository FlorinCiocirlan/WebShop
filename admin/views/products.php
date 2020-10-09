<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Static/css/admin.css"/>

</head>
<body>
<div class="adminmenu">
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="users.php">View Users</a></li>
        <li><a href="user.php">Add Users</a></li>
        <li><a href="products.php">View Products</a></li>
        <li><a href="product.php">Add Product</a></li>
        <li><a href="product.php">View Categories</a></li>
        <li><a href="product.php">Add Category</a></li>
        <li><a href="product.php">View Orders</a></li>
        <li><a href="../shop/logout.php">Logout</a></li>

    </ul>

</div>
<div class="content">

    <table cellpadding="10" align="center">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Image</th>
            <th>Edit</th>
            <th>(Un)Delete</th>
        </tr>

        <?php
        foreach ($products as $product):
            ?>
            <tr>
                <td><?=$product['name'] ?></td>
                <td><?=$product['description'] ?></td>
                <td><?=$product['category_name'] ?></td>
                <td><?=$product['brand'] ?></td>
                <td><?=$product['stock'] ?></td>
                <td><?=$product['price'] ?></td>
                <td><img src="../images/<?=$product['image'] ?>"/></td>

                <td><a href="product.php?id=<?=$product['id'] ?>" >Edit</a></td>
                <td><?=$product['deleted'] ?></td>

            </tr>

        <?php
        endforeach;
        ?>





    </table>



</div>

<?php
paging("product", TRUE);
?>
</body>
</html>



