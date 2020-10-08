<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Static/css/admin.css"/>

</head>
<body>

<div class="content">

    <table cellpadding="10" align="center">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Administrator</th>
            <th>Edit</th>
            <th>(Un)Delete</th>
        </tr>

        <?php
        foreach ($users as $user):
        ?>
        <tr>
            <td><?=$user['name'] ?></td>
            <td><?=$user['email'] ?></td>
            <td><?=$user['address'] ?></td>
            <td><?=$user['phone'] ?></td>
            <td><?=$user['isadmin'] ?></td>
            <td><a href="user.php?id=<?=$user['id'] ?>" >Edit</a></td>
            <td><?=$user['deleted'] ?></td>

        </tr>

        <?php
        endforeach;
        ?>





    </table>



</div>

<?php
paging("users", TRUE);
?>
</body>
</html>



