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
        <li><a href="categories.php">View Categories</a></li>
        <li><a href="category.php">Add Category</a></li>
        <li><a href="orders.php">View Orders</a></li>
        <li><a href="../shop/logout.php">Logout</a></li>

    </ul>

</div>
<div class="content">

    <table cellpadding="10" align="center">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>(Un)Delete</th>
        </tr>

        <?php
        foreach ($categories as $category):
            ?>
            <tr>
                <td><?=$category['name'] ?></td>
                <td><?=$category['description'] ?></td>
                <td><a href="category.php?id=<?=$category['id'] ?>" >Edit</a></td>
                <td><?=$category['deleted'] ?></td>

            </tr>

        <?php
        endforeach;
        ?>





    </table>



</div>

<?php
paging("category", TRUE);
?>
</body>
</html>



