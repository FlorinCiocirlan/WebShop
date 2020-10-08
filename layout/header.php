<?php require "../layout/head.php" ?>
<header>
    <div class="navWrap">
        <img src="../images/eStoreLogo10.png" alt="logo" class="logo" >
        <nav>
            <ul>
                <?php if(isset($_SESSION['userID']))
                {
                    echo '
                    <li><a href="#">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="#">Cart</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Logout</a></li>';
                } else {
                    echo '
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>';
    } ?>
            </ul>
        </nav>
    </div>
</header>
