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

                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="order.php">Orders History</a></li>
                    <li><a href="profile.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '
                    <li><a href="#">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>';
    } ?>
            </ul>
        </nav>
    </div>
</header>
